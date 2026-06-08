<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/checkout.css') }}">
</head>

<body>

    <div class="checkout-wrapper">

        <h1 class="checkout-title">কমপ্লিট পেমেন্ট</h1>

        <div class="top-border"></div>

        <div class="checkout-grid">

            <!-- LEFT SIDE -->

            <div class="left-card">

                <div class="course-top">
                    <img src="{{ asset('storage/course/' . $course->thumbnail) }}" alt="{{ $course->title ?? '' }}">
                    <div>
                        <h2 class="course-title"> {{ $course->title ?? '' }} </h2>
                    </div>
                </div>

                <div class="payment-details">
                    <h3 class="section-title"> পেমেন্ট ডিটেইলস </h3>

                    <div class="price-row">
                        <span>কোর্স মূল্য</span>
                        <span>৳ {{ $course->discount_price ?? '' }}</span>
                    </div>


                    <hr>

                    <div class="total">
                        <span>টোটাল পেমেন্ট:</span>
                        <span>৳ {{ $course->discount_price ?? '' }}</span>
                    </div>

                </div>

                <div class="support">
                    📞 প্রয়োজনে
                    <span>কল করুন +880 1343-914432</span>
                </div>

            </div>

            <!-- RIGHT SIDE -->

            <div class="right-card">

                <div class="right-inner">

                    <h3 class="payment-title">
                        আপনার তথ্য দিন
                    </h3>

                    <form class="user_details_form" data-course-id="{{ $course->id }}">

                        <div class="form_controll_wrapper">
                            <label for="name">আপনার নাম</label>

                            <input type="text" id="name" name="name" placeholder="আপনার নাম লিখুন">

                            <small class="error_message"></small>
                        </div>

                        <div class="form_controll_wrapper">
                            <label for="email">ইমেইল অ্যাড্রেস</label>

                            <input type="email" id="email" name="email" placeholder="আপনার ইমেইল লিখুন">

                            <small class="error_message"></small>
                        </div>

                        <div class="form_controll_wrapper">
                            <label for="phone">ফোন নাম্বার</label>

                            <input type="text" id="phone" name="phone" placeholder="আপনার ফোন নাম্বার লিখুন">

                            <small class="error_message"></small>
                        </div>

                        <div class="form_controll_btn_wrapper">
                            <button type="submit" class="submit_btn">
                                পেমেন্ট সম্পন্ন করুন →
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            // Show Error
            function showError(input, message) {
                let parent = input.closest('.form_controll_wrapper');
                parent.addClass('error');
                parent.removeClass('success');
                parent.find('.error_message').text(message);
            }

            // Show Success
            function showSuccess(input) {
                let parent = input.closest('.form_controll_wrapper');
                parent.removeClass('error');
                parent.addClass('success');
                parent.find('.error_message').text('');

            }

            // Name Validation
            function validateName() {
                let input = $('#name');
                let value = input.val().trim();
                if (value == '') {
                    showError(input, 'অনুগ্রহ করে আপনার নাম লিখুন।');
                    return false;
                }

                if (value.length < 3) {
                    showError(input, 'নাম সর্বনিম্ন ৩ অক্ষরের হতে হবে।');
                    return false;
                }

                showSuccess(input);
                return true;
            }

            // Email Validation
            function validateEmail() {

                let input = $('#email');
                let value = input.val().trim();

                if (value == '') {
                    showError(input, 'অনুগ্রহ করে আপনার ইমেইল অ্যাড্রেস লিখুন।');
                    return false;
                }

                let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailPattern.test(value)) {
                    showError(input, 'অনুগ্রহ করে সঠিক ইমেইল অ্যাড্রেস লিখুন।');
                    return false;
                }

                showSuccess(input);
                return true;
            }

            // Phone Validation
            function validatePhone() {

                let input = $('#phone');
                let value = input.val().trim();

                if (value == '') {
                    showError(input, 'অনুগ্রহ করে আপনার ফোন নাম্বার লিখুন।');
                    return false;
                }

                let phonePattern = /^(01[3-9]\d{8})$/;

                if (!phonePattern.test(value)) {
                    showError(input, 'ফোন নাম্বার অবশ্যই ১১ সংখ্যার হতে হবে।');
                    return false;
                }

                showSuccess(input);
                return true;
            }

            // Live Validation
            $('#name').on('blur input', function() {
                validateName();
            });

            $('#email').on('blur input', function() {
                validateEmail();
            });

            $('#phone').on('blur input', function() {
                validatePhone();
            });


            // Final Form Submit with AJAX
            $('.user_details_form').submit(function(e) {
                e.preventDefault();

                let url = `{{ route('payment.initiate', $course->id) }}`

                let isNameValid = validateName();
                let isEmailValid = validateEmail();
                let isPhoneValid = validatePhone();

                if (!isNameValid || !isEmailValid || !isPhoneValid) {
                    return;
                }

                let form = $(this);
                let button = $('.submit_btn');

                button.addClass('loading');
                button.text('অপেক্ষা করুন...');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        name: $('#name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                    },
                    success: function(response) {

                        if (response.payment_url) {
                            window.location.href = response.payment_url;
                        }

                    },

                    error: function(xhr) {
                        button.removeClass('loading');
                        button.text('পেমেন্ট সম্পন্ন করুন →');

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, value) {
                                let input = $('#' + key);
                                showError(input, value[0]);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'দুঃখিত, একটি সমস্যা হয়েছে!',
                                confirmButtonText: 'আবার চেষ্টা করুন',
                                confirmButtonColor: '#e04f5f',
                                footer: '<span style="color: #777;">সমস্যা সমাধান না হলে আমাদের সাপোর্টে যোগাযোগ করুন</span>'
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>