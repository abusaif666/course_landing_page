<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
</head>

<body>

    <div class="landing_page_top">
        <header class="site_header">
            <div class="container">
                <div class="site_header_wrapper">
                    <div class="header_left">
                        <div class="logo_area">
                            <a href="">
                                <img src="assets/img/logo.png" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="header_right">
                        <div class="button_area">
                            <a href="javascript:void(0)" class="register_btn ">রেজিস্ট্রেশন করুন এখনই</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="landing_page_video_area">
            <div class="container">
                <div class="landing_page_video_area_wrapper">
                    <div class="top_area">
                        <div class="landing_page_video_content">
                            <h2> {{ $course->title ?? '' }} </h2>
                            <p> {{ $course->description ?? '' }} </p>
                        </div>
                    </div>
                    <div class="center_area">
                        <div class="video_player_wrapper">
                            <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/{{ $course->video ?? '' }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="bottom_area">
                        <div class="button_or_total_seat_area">
                            <div class="button_area">
                                <a class="registation_btn register_btn" href="javascript:void(0)">রেজিস্ট্রেশন করুন
                                    এখনই</a>
                                <img class="arrow_image" src="assets/img/arrow.png" alt="">
                            </div>
                            <div class="total_seat">আর মাত্র <span>{{ en_to_bn($course->total_seat) }} সিট বাকি</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="seat_book">
        <div class="container">
            <div class="seat_book_wrapper">
                <div class="top_area">
                    <div class="title">এখনই সিট বুক করুন</div>
                </div>
                <div class="center_area">
                    <div class="seat_book_box">
                        <div class="box">
                            <div class="icon_area">
                                <div class="icon"><i class="fa fa-home"></i></div>
                            </div>
                            <div class="content_area">
                                <h3>২৫ জানুয়ারী রাত ৮ টা</h3>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon_area">
                                <div class="icon"><i class="fa fa-home"></i></div>
                            </div>
                            <div class="content_area">
                                <p>সময়</p>
                                <h3>২৫ জানুয়ারী রাত ৮ টা</h3>
                            </div>
                        </div>
                        <div class="footer_box">
                            <div class="icon_area">
                                <div class="icon"><i class="fa-solid fa-circle"></i></div>
                            </div>
                            <div class="content_area">
                                <h3>২৫ জানুয়ারী রাত ৮ টা</h3>
                                <h4> {{ en_to_bn($course->discount_price ?? '') }} টাকা</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom_area">
                    <div class="content">
                        <div class="left">পরবর্তী সিট</div>
                        <div class="right">১০০০ টাকা</div>
                    </div>
                    <div>
                        <div class="button_area">
                            <a class="reg_btn register_btn" href="javascript:void(0)">
                                <span>রেজিস্ট্রেশন করুন এখনই</span><span class="line"></span>
                                <span> {{ en_to_bn($course->discount_price ?? '') }} টাকা <i
                                        class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                        <div class="total_seat">আর মাত্র <span>{{ en_to_bn($course->total_seat) }} সিট বাকি</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="countdown-data" data-created="{{ $course->created_at->timestamp }}"
        data-start="{{ $course->offer_start ? strtotime($course->offer_start) : '' }}"
        data-end="{{ $course->offer_end ? strtotime($course->offer_end) : '' }}">
    </div>

    <div class="countdown_section">
        <div class="container">
            <div class="countdown_card">
                <h2 class="title">রেগুলার প্রাইস <del>{{ en_to_bn($course->price ?? '') }}/-</del></h2>
                <h1 class="price">অফার প্রাইস {{ en_to_bn($course->discount_price ?? '') }}/-</h1>

                <p class="sub_title">অফারটি চলবে:</p>

                <div class="countdown_box">

                    <div class="time_box">
                        <span class="days"></span>
                        <small>দিন</small>
                    </div>

                    <div class="time_box">
                        <span class="hours"></span>
                        <small>ঘন্টা</small>
                    </div>

                    <div class="time_box">
                        <span class="minutes"></span>
                        <small>মিনিট</small>
                    </div>

                    <div class="time_box">
                        <span class="seconds"></span>
                        <small>সেকেন্ড</small>
                    </div>
                </div>

                <button class="btn_offer register_btn">এখনই এনরোল করুন</button>
            </div>
        </div>
    </div>

    <div class="lp_box">
        <div class="container">
            <div class="lp-wrapper">
                <div class="lp-box">

                    <div class="lp-badge">
                        🎁 যারা join করবেন তাদের জন্য special gift
                    </div>

                    <h1 class="lp-title">২০০০ টাকা মূল্যের ‘THE PROJECT 30K’ (৩০,০০০+ ভিডিও) বান্ডিলটি আজ কোর্সের সাথে
                        পাচ্ছেন একদম ফ্রি!</h1>

                    <div class="lp-price">
                        <del> {{ en_to_bn('2,000') }} </del>
                        <div class="lp-free">FREE</div>
                    </div>

                    {{-- <div class="lp-info">
                এই master class-এ যারা join করবেন, তারা আমার ৮০,০০০ টাকার Ecom Dropshipping Mastery Course টি free তে
                করার সুযোগ পাবেন।
                <br><br>
                মার্কেটপ্লেস এই বিষয়ে বিস্তারিত আলোচনা করা হবে।
            </div>

            <div class="lp-small">
                এই কোর্সে আপনি Facebook Ads, Google Ads, niche selection, scaling strategy সব কিছু শিখতে পারবেন।
            </div> --}}

                    <a href="javascript:void(0)" class="lp-btn register_btn">সিট কনফার্ম করুন →</a>

                    <div class="lp-seats">
                        ● বাকি আছে মাত্র {{ en_to_bn($course->total_seat) }} টা seat
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if ($benefits->count() > 0)
        <div class="who_join_this_class">
            <div class="container">
                <div class="who_join_class_wrapper">
                    <div class="title">কোর্সটা কেন করবেন ?</div>
                    <div class="who_join_class_box">
                        @foreach ($benefits as $benefit)
                            <div class="box">
                                <div class="box_icon"><i class="fa fa-check"></i></div>
                                <div class="box_content">
                                    {{ $benefit->benefit ?? '' }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($outlines->count() > 0)
        <div class="learn_this_course">
            <div class="container">
                <div class="learn_this_course_wrapper">
                    <div class="title_area">
                        <div class="title">এই কোর্সে আপনি যা শিখবেন</div>
                    </div>
                    <div class="learn_this_course_boxex">
                        <div class="box">
                            <ul>
                                @foreach ($outlines as $key => $outline)
                                    <li>
                                        <div class="icon">
                                            {{-- <i class="fa-solid fa-caret-right"></i> --}}
                                            {{ $key + 1 }}
                                        </div>
                                        <p> {{ $outline->outline ?? '' }} </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="bottom_area">
                        <div class="button_area">
                            <a class="reg_btn register_btn" href="javascript:void(0)">
                                <span>রেজিস্ট্রেশন করুন এখনই</span><span class="line"></span>
                                <span> {{ en_to_bn($course->discount_price ?? '') }} টাকা <i
                                        class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                        <div class="total_seat">আর মাত্র <span>{{ en_to_bn($course->total_seat) }} সিট বাকি</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($testimonial->count() > 0)
        <div class="video_slider_wrapper">
            <div class="container">
                <div class="videos_wrapper">
                    <div class="slider_header">
                        <div class="title">স্টুডেন্ট রিভিউ ক্লাস</div>
                    </div>
                    <div class="video_slider_arrow_wrapper">
                        <div class="video_items">
                            @foreach ($testimonial as $video)
                                <div class="slide">
                                    <div class="video_box">
                                        <iframe src="https://www.youtube.com/embed/{{ $video->video }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="video_slider_arrows">
                            <button class="arrow left_arrow"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="arrow right_arrow"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($result->count() > 0)
        <div class="image_slider_wrapper">
            <div class="container">
                <div class="slider_header">
                    <div class="title">স্টুডেন্ট রেজাল্ট</div>
                </div>
                <div class="image_slider_box">
                    <div class="slick-image-slider">
                        @foreach ($result as $data)
                            <div class="slide">
                                <img src="{{ asset('storage/student_result/' . $data->photo) }}" width="80">
                            </div>
                        @endforeach
                    </div>
                    <div class="image_slider_arrows">
                        <button class="arrow left_arrow"><i class="fa-solid fa-arrow-left"></i></button>
                        <button class="arrow right_arrow"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($faqs->count() > 0)
        <div class="accordian">
            <div class="container">
                <div class="faq-section">
                    <h2 class="faq-title">কিছু সাধারণ প্রশ্নের উত্তর</h2>
                    @foreach ($faqs as $faq)
                        <div class="faq-item">
                            <div class="faq-question">
                                {{ $faq->question }}
                                <span class="accordian_icon"><i class="fa-solid fa-sort-up"></i></span>
                            </div>

                            <div class="faq-answer">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="accordian_bottom_area">
                    <div class="button_area">
                        <a class="reg_btn register_btn" href="javascript:void(0)">
                            <span>রেজিস্ট্রেশন করুন এখনই</span><span class="line"></span>
                            <span> {{ en_to_bn($course->discount_price ?? '') }} টাকা <i
                                    class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                    <div class="total_seat">আর মাত্র <span>{{ en_to_bn($course->total_seat) }} সিট বাকি</span></div>
                </div>
            </div>
        </div>
    @endif


    <div class="countdown_bar_wrapper">
        <div class="container">
            <div class="countdown_bar">
                <div class="text">
                    কোর্স আজকে জয়েন হলে পাবেন <span>{{ en_to_bn($course->price - $course->discount_price) }} টাকা
                        ছাড়!</span>
                </div>

                <div class="timer">

                    <div class="box">
                        <span class="days">00</span>
                        <small>দিন</small>
                    </div>

                    <div class="box">
                        <span class="hours">00</span>
                        <small>ঘন্টা</small>
                    </div>

                    <div class="box">
                        <span class="minutes">00</span>
                        <small>মিনিট</small>
                    </div>

                    <div class="box">
                        <span class="seconds">00</span>
                        <small>সেকেন্ড</small>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="checkout">
        <div class="container">
            <h1 class="checkout_title_area">
                <div class="title"> কোর্সে জয়েন করতে নিচের </div>
                <div class="title"> ফর্মটি পূরণ করুন </div>
            </h1>
            <div class="checkout_wrapper">
                <div class="checkout_box">
                    <div class="top_title">সঠিক তথ্য দিন</div>
                    <div class="checkout_box_preloader_wrapper">
                        <div class="preloader_box">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <form class="user_details_form" id="checkout_form" data-course-id="{{ $course->id }}">
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
                            <input type="text" id="phone" name="phone"
                                placeholder="আপনার ফোন নাম্বার লিখুন">
                            <small class="error_message"></small>
                        </div>
                        <div class="form_course_details_area">
                            <div class="title">আপনার অর্ডার</div>
                            <div class="course_box">
                                <div class="image_area">
                                    <img src="{{ asset('storage/course/' . $course->thumbnail) }}" alt="">
                                </div>
                                <div class="course_details_area">
                                    <div class="course_name"> {{ $course->title ?? '' }} </div>
                                    <div class="course_price"> <b>{{ en_to_bn($course->discount_price) }}৳</b> </div>
                                </div>
                            </div>
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



    <footer class="footer">
        <div class="container">
            <div class="footer_wrapper">
                <p>© {{ date('Y') }} | BD Online Services | All rights reserved.</p>
            </div>
        </div>
    </footer>


</body>
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
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

            if (!/^\d{11}$/.test(value)) {
                showError(input, 'ফোন নাম্বার অবশ্যই ১১ সংখ্যার হতে হবে।');
                return false;
            }

            let phonePattern = /^01[3-9]\d{8}$/;

            if (!phonePattern.test(value)) {
                showError(input, 'দয়া করে আপনার সঠিক ফোন নাম্বার লিখুন।');
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

            let button = $('.submit_btn');

            button.addClass('loading');
            button.text('অপেক্ষা করুন...');

            // PRELOADER SHOW
            $('.checkout_box_preloader_wrapper').show();

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

                    // PRELOADER HIDE
                    $('.checkout_box_preloader_wrapper').hide();

                    if (response.payment_url) {
                        window.location.href = response.payment_url;
                    }
                },

                error: function(xhr) {

                    // PRELOADER HIDE
                    $('.checkout_box_preloader_wrapper').hide();

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
                            confirmButtonColor: '#e04f5f'
                        });
                    }
                }
            });
        });
    });
</script>

</html>
