<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PaymentSuccess;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // ১. শুধুমাত্র অর্ডারের লিস্ট দেখার জন্য
    public function index()
    {
        $orders = Order::with('course')->latest()->paginate(15);

        return view('admin.order.index', compact('orders'));
    }


    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'payment_status' => 'required',
        ]);

        try {
            $order->update([
                'payment_status' => $request->payment_status,
                'payment_method' => 'Unknown',
                'order_status' => 'approved',
            ]);

            setMailConfig('payment');
            Mail::to($order->email)->send(new PaymentSuccess($order));

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
