<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">

    <div style="max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); text-align: center;">
        
        <div style="font-size: 60px; color: #2ecc71; margin-bottom: 20px;">✔</div>
        
        <h1 style="color: #27ae60; margin-bottom: 10px;">🎉 পেমেন্ট সফল হয়েছে!</h1>
        <p style="color: #555; font-size: 16px; margin-bottom: 30px;">অভিনন্দন! আপনার কোর্সের পেমেন্টটি আমরা সফলভাবে পেয়েছি। নিচে আপনার অর্ডারের বিবরণ দেওয়া হলো:</p>
        
        <div style="background-color: #f2f9f4; border: 1px solid #d4eedd; border-radius: 6px; padding: 20px; text-align: left; margin-bottom: 30px;">
            <h3 style="margin-top: 0; color: #2c3e50; border-bottom: 1px solid #d4eedd; padding-bottom: 10px;">অর্ডার সামারি</h3>
            <p style="margin: 8px 0;"><strong>স্টুডেন্টের নাম:</strong> {{ $order->name }}</p>
            <p style="margin: 8px 0;"><strong>কোর্সের নাম:</strong> {{ $order->course->title ?? 'N/A' }}</p>
            <p style="margin: 8px 0;"><strong>পরিশোধিত টাকা:</strong> {{ number_format($order->course_price, 2) }} TK</p>
            <p style="margin: 8px 0;"><strong>টাকার মাধ্যম:</strong> {{ $order->payment_method }}</p>
            <p style="margin: 8px 0;"><strong>Transaction ID:</strong> <code style="background: #eef7f1; padding: 2px 6px; border-radius: 4px; color: #e74c3c;">{{ $order->transaction_id }}</code></p>
        </div>

        <a href="/" style="display: inline-block; padding: 12px 25px; background-color: #27ae60; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; transition: 0.3s;">
            হোম পেজে ফিরে যান
        </a>
    </div>

</body>
</html>