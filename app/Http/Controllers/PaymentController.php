<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\Course;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\PaymentApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    private function paymentGateway()
    {
        return PaymentApi::where('provider_slug', 'sandbox')
            ->where('status', 'active')
            ->firstOrFail();
    }

    public function initiatePayment(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|digits:11',
                'email' => 'required|email',
            ],
            [
                'name.required' => 'অনুগ্রহ করে আপনার নাম লিখুন।',
                'phone.required' => 'অনুগ্রহ করে আপনার ফোন নাম্বার লিখুন।',
                'phone.digits' => 'ফোন নাম্বার অবশ্যই ১১ সংখ্যার হতে হবে।',
                'email.email' => 'অনুগ্রহ করে সঠিক ইমেইল অ্যাড্রেস লিখুন।',
            ]
        );

        $paymentGateway = $this->paymentGateway();
        $apiKey = $paymentGateway->api_key;
        $apiUrl = $paymentGateway->secret_key;

        do {
            $transactionId = strtoupper(Str::random(10));
        } while (Order::where('transaction_id', $transactionId)->exists());

        try {
            $order = Order::create([
                'course_id' => $course->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'course_price' => $course->discount_price,
                'transaction_id'  => $transactionId,
                'payment_method' => 'UddoktaPay',
                'payment_status' => 'pending',
            ]);

            $paymentData = [
                'full_name' => $request->name,
                'email' => $request->email,
                'amount' => $course->discount_price,
                'metadata' => [
                    'order_id' => $order->id,
                    'course_id' => $course->id,
                    'phone' => $request->phone,
                ],
                'redirect_url' => route('payment.success', ['order_id' => $order->id]),
                'cancel_url' => route('payment.cancel'),
                'webhook_url' => route('payment.webhook'),
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($paymentData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'RT-UDDOKTAPAY-API-KEY: '.$apiKey,
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response, true);

            if (isset($result['payment_url'])) {
                if (isset($result['invoice_id'])) {
                    $order->update([
                        'invoice_id' => $result['invoice_id'],
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'payment_url' => $result['payment_url'],
                ]);
            }

            $order->delete();

            return response()->json([
                'success' => false,
                'message' => 'Could not initiate payment.',
            ], 400);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function successPayment(Request $request)
    {
        $order = null;

        if ($request->has('order_id')) {
            $order = Order::find($request->order_id);
        }

        setMailConfig('payment');
        Mail::to($order->email)->send(new PaymentSuccess($order));

        return view('frontend.payment-success', compact('order'));
    }

    public function cancelPayment()
    {
        return view('frontend.payment-cancel');
    }

    public function webhookPayment(Request $request)
    {
        $metadata = $request->input('metadata');

        $orderId = $metadata['order_id'] ?? null;

        if (! $orderId) {
            return response()->json([
                'status' => false,
                'message' => 'Order ID missing',
            ], 400);
        }

        $order = Order::find($orderId);

        if (! $order) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found',
            ], 404);
        }

        if (! in_array($request->status, ['COMPLETED', 'CONFIRMED'])) {
            return response()->json([
                'status' => false,
                'message' => 'Payment not completed',
            ]);
        }

        $order->update([
            'payment_status' => strtolower($request->status),
            'payment_method' => $request->payment_method,
        ]);

        setMailConfig('payment');
        Mail::to($request->email)->send(new PaymentSuccess($order));

        return response()->json([
            'status' => true,
            'message' => 'Payment verified successfully',
        ]);

    }
}
