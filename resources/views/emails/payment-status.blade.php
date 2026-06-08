<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
</head>

<body style="margin:0;padding:0;background:#f4f7fb;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f4f7fb;padding:30px 15px;">

        <tr>
            <td align="center">

                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                    style="max-width:650px;background:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 5px 25px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td
                            style="background:linear-gradient(135deg,#2563eb,#1e40af);padding:35px 20px;text-align:center;color:#fff;">

                            @if ($order->payment_status == 'completed')
                                <h1 style="margin:0;font-size:30px;">
                                    ✅ Payment Successful
                                </h1>

                                <p style="margin-top:10px;font-size:15px;opacity:.9;">
                                    আপনার পেমেন্ট সফলভাবে সম্পন্ন হয়েছে
                                </p>
                            @else
                                <h1 style="margin:0;font-size:30px;">
                                    ⏳ Payment Pending
                                </h1>

                                <p style="margin-top:10px;font-size:15px;opacity:.9;">
                                    আপনার পেমেন্ট এখনো যাচাই করা হয়নি
                                </p>
                            @endif

                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:35px 30px;">

                            <p style="font-size:16px;color:#333;">
                                Dear <strong>{{ $order->name }}</strong>,
                            </p>

                            @if ($order->payment_status == 'completed')
                                <p style="color:#555;line-height:1.8;font-size:15px;">
                                    অভিনন্দন 🎉 আপনার কোর্স অর্ডার সফলভাবে সম্পন্ন হয়েছে।
                                    নিচে আপনার অর্ডারের বিস্তারিত তথ্য দেওয়া হলো।
                                </p>

                                <!-- Info Box -->
                                <table width="100%" cellpadding="0" cellspacing="0"
                                    style="margin-top:25px;border-collapse:collapse;">

                                    <tr>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;font-weight:bold;color:#333;">
                                            Name
                                        </td>
                                        <td style="padding:14px;border-bottom:1px solid #eee;color:#555;">
                                            {{ $order->name }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;font-weight:bold;color:#333;">
                                            Email
                                        </td>
                                        <td style="padding:14px;border-bottom:1px solid #eee;color:#555;">
                                            {{ $order->email }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;font-weight:bold;color:#333;">
                                            Phone
                                        </td>
                                        <td style="padding:14px;border-bottom:1px solid #eee;color:#555;">
                                            {{ $order->phone }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;font-weight:bold;color:#333;">
                                            Course
                                        </td>
                                        <td style="padding:14px;border-bottom:1px solid #eee;color:#555;">
                                            {{ $order->course->title ?? 'N/A' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;font-weight:bold;color:#333;">
                                            Amount
                                        </td>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;color:#16a34a;font-weight:bold;">
                                            ৳ {{ $order->course_price }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;font-weight:bold;color:#333;">
                                            Payment Status
                                        </td>
                                        <td style="padding:14px;border-bottom:1px solid #eee;">
                                            <span
                                                style="background:#dcfce7;color:#15803d;padding:6px 12px;border-radius:30px;font-size:13px;font-weight:bold;">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style="padding:14px;border-bottom:1px solid #eee;font-weight:bold;color:#333;">
                                            Transaction ID
                                        </td>
                                        <td style="padding:14px;border-bottom:1px solid #eee;color:#555;">
                                            {{ $order->transaction_id }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding:14px;font-weight:bold;color:#333;">
                                            Date
                                        </td>
                                        <td style="padding:14px;color:#555;">
                                            {{ $order->created_at->format('d F Y / h:i A') }}
                                        </td>
                                    </tr>

                                </table>

                                <!-- Buttons -->
                                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                    style="margin-top:35px;">

                                    <tr>

                                        <td align="center">

                                            @if (!empty($order->course->whatsapp))
                                                <a href="{{ $order->course->whatsapp }}"
                                                    style="display:inline-block;background:#25D366;color:#fff;text-decoration:none;padding:14px 28px;border-radius:10px;font-weight:bold;margin:5px;">
                                                    WhatsApp Support
                                                </a>
                                            @endif

                                            @if (!empty($order->course->drive))
                                                <a href="{{ $order->course->drive }}"
                                                    style="display:inline-block;background:#2563eb;color:#fff;text-decoration:none;padding:14px 28px;border-radius:10px;font-weight:bold;margin:5px;">
                                                    Course Drive Link
                                                </a>
                                            @endif

                                        </td>

                                    </tr>

                                </table>
                            @else
                                <p style="color:#555;line-height:1.8;font-size:15px;">
                                    আপনার পেমেন্ট বর্তমানে যাচাই করা হচ্ছে।
                                    অনুগ্রহ করে কিছুক্ষণ অপেক্ষা করুন।
                                </p>

                                <div
                                    style="margin-top:25px;background:#fff7ed;padding:18px;border-radius:12px;color:#9a3412;border:1px solid #fdba74;">
                                    ⏳ Payment verification is currently in progress.
                                </div>
                            @endif

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc;padding:25px;text-align:center;font-size:13px;color:#666;">

                            © {{ date('Y') }} Your Company Name <br>
                            All Rights Reserved.

                        </td>
                    </tr>

                </table>

            </td>
        </tr>

    </table>

</body>

</html>
