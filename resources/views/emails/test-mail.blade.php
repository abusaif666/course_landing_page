<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body style="margin:0; padding:0; background:#f4f6fb; font-family:Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6fb; padding:30px 0;">
    <tr>
        <td align="center">

            <!-- Container -->
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 5px 20px rgba(0,0,0,0.08);">

                <!-- Header -->
                <tr>
                    <td style="background:linear-gradient(135deg,#6a11cb,#2575fc); padding:25px; text-align:center; color:#fff;">
                        <h2 style="margin:0; font-size:24px;">Welcome to {{ config('app.name') }}</h2>
                        <p style="margin:5px 0 0; font-size:14px;">Professional & Modern Email Template</p>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:30px; color:#333;">

                        <h3 style="margin-top:0;">Hello {{ $name ?? 'User' }}, 👋</h3>

                        <p style="font-size:15px; line-height:1.6;">
                            This is a beautiful responsive email template built with Laravel Blade.
                            It works perfectly on mobile and desktop devices.
                        </p>

                        <!-- Info Box -->
                        <table width="100%" style="margin-top:20px;">
                            <tr>
                                <td style="background:#f0f4ff; padding:15px; border-radius:8px;">
                                    <p style="margin:0; font-size:14px;">
                                        ✔ Clean Design<br>
                                        ✔ Mobile Responsive<br>
                                        ✔ Fast Loading<br>
                                        ✔ Laravel Ready
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- Button -->
                        <div style="text-align:center; margin:30px 0;">
                            <a href="#"
                               style="background:#2575fc; color:#fff; padding:12px 25px;
                               text-decoration:none; border-radius:6px; display:inline-block;">
                                Visit Dashboard
                            </a>
                        </div>

                        <p style="font-size:14px; color:#666;">
                            If you have any questions, feel free to contact us anytime.
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f9fafc; text-align:center; padding:15px; font-size:12px; color:#999;">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
