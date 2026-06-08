<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ১. শুধুমাত্র অর্ডারের লিস্ট দেখার জন্য
    public function index()
    {
        $orders = Order::with('course')->latest()->paginate(15);
        return view('admin.order.index', compact('orders'));
    }

    // ২. অর্ডারের স্ট্যাটাস (Approved/Paid) আপডেট করার জন্য
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed',
            'order_status' => 'required|in:pending,approved,rejected',
        ]);

        try {
            $order->update([
                'payment_status' => $request->payment_status,
                'order_status' => $request->order_status,
            ]);

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