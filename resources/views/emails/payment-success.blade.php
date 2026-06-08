<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
</head>
<body>


    @if($order->payment_status == 'COMPLETED')

    <h2>Payment Successful</h2>
    <p>Dear {{ $order->name }}, আপনার পেমেন্ট সফলভাবে সম্পন্ন হয়েছে।</p>


    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>

    <p><strong>Course:</strong> {{ $order->course->title ?? 'N/A' }}</p>
    <p><strong>Amount:</strong> {{ $order->course_price }}</p>

    <p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>
    <p><strong>Order Status:</strong> {{ $order->order_status }}</p>

    <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
    <p><strong>Transaction ID:</strong> {{ $order->transaction_id }}</p>
    {{-- <p><strong>Invoice ID:</strong> {{ $order->invoice_id }}</p> --}}

    <p><strong>Date:</strong> {{ $order->created_at }}</p>

@else

    <h2>Payment Pending</h2>

    <p>Dear {{ $order->name }}, আপনার পেমেন্ট এখনো যাচাই করা হয়নি।</p>

    <p>অনুগ্রহ করে কিছুক্ষণ অপেক্ষা করুন।</p>

@endif


</body>
</html>