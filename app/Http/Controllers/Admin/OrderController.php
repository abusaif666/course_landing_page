<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PaymentSuccess;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // ১. অর্ডারের লিস্ট দেখা এবং সার্চ করার জন্য
    public function index(Request $request)
    {
        $query = Order::with('course')->latest();

        if ($request->has('search') && ! empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('transaction_id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhereHas('course', function ($c) use ($search) {
                        $c->where('title', 'LIKE', "%{$search}%");
                    });
            });
        }

        $orders = $query->paginate(15);

        // যদি Ajax রিকোয়েস্ট হয়, তবে শুধু টেবিল ডাটা রিটার্ন করবে
        if ($request->ajax()) {
            return view('admin.order.table', compact('orders'))->render();
        }

        return view('admin.order.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'payment_status' => 'required',
        ]);

        try {

            // old status
            $oldStatus = $order->payment_status;

            // update order
            $order->update([
                'payment_status' => $request->payment_status,
                'payment_method' => 'Unknown',
            ]);

            // =========================================
            // SEAT MINUS
            // =========================================

            // only first time completed/confirmed
            if (
                ! in_array($oldStatus, ['completed', 'confirmed']) &&
                in_array(strtolower($request->payment_status), ['completed', 'confirmed'])
            ) {

                $course = $order->course;

                if ($course && $course->total_seat > 0) {

                    $course->decrement('total_seat');
                }
            }

            // =========================================
            // SEND MAIL
            // =========================================

            setMailConfig('payment');

            if ($order->email) {

                Mail::to($order->email)
                    ->send(new PaymentSuccess($order));
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Order status updated successfully!',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!',
            ], 500);
        }
    }
}
