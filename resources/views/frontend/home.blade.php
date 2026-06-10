<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                            <a href="" class="register_btn">রেজিস্ট্রেশন করুন এখনই</a>
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
                            <p> {{ $course->description ?? ''  }} </p>
                        </div>
                    </div>
                    <div class="center_area">
                        <div class="video_player_wrapper">
                            <video class="video player" playsinline controls>
                                <source src="assets/video/1475633_People_Family_1280x720.mp4" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                    <div class="bottom_area">
                        <div class="button_or_total_seat_area">
                            <div class="button_area">
                                <a class="registation_btn" href="">রেজিস্ট্রেশন করুন এখনই</a>
                                <img class="arrow_image" src="assets/img/arrow.png" alt="">
                            </div>
                            <div class="total_seat">আর মাত্র <span>৩৭ সিট বাকি</span></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="seat_book">
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
                                <h4> {{ en_to_bn($course->discount_price ?? '') }}  টাকা</h4>
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
                            <a class="reg_btn" href="">
                                <span>রেজিস্ট্রেশন করুন এখনই</span><span class="line"></span>
                                <span> {{ en_to_bn($course->discount_price ?? '') }}  টাকা <i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                        <div class="total_seat">আর মাত্র <span>৩৭ সিট বাকি</span></div>
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



    <div class="learn_this_course">
        <div class="container">
            <div class="learn_this_course_wrapper">
                <div class="title_area">
                    <div class="title">এই সেশনে আপনি শিখবেন</div>
                </div>
                <div class="learn_this_course_boxex">
                    <div class="box box_one">
                        <div class="header">বিজনেস মডেল ও প্রোডাক্ট রিসার্চ</div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                        </ul>
                    </div>
                    <div class="box box_two">
                        <div class="header">বিজনেস মডেল ও প্রোডাক্ট রিসার্চ</div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                        </ul>
                    </div>
                    <div class="box box_three">
                        <div class="header">বিজনেস মডেল ও প্রোডাক্ট রিসার্চ</div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>
                                <p>ব্র্যান্ড বানাবেন নাকি উইনিং প্রোডাক্ট</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bottom_area">
                    <div class="button_area">
                        <a class="reg_btn" href="">
                            <span>রেজিস্ট্রেশন করুন এখনই</span><span class="line"></span>
                            <span> {{ en_to_bn($course->discount_price ?? '') }}  টাকা <i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                    <div class="total_seat">আর মাত্র <span>৩৭ সিট বাকি</span></div>
                </div>
            </div>
        </div>
    </div>

    @if ($faqs->count() > 0)
        <div class="accordian">
            <div class="container">
                <div class="faq-section">
                    <h2 class="faq-title">কিছু সাধারণ প্রশ্নের উত্তর</h2>
                    @foreach ($faqs as $faq)
                        <div class="faq-item active">
                            <div class="faq-question">
                                লাইভ ক্লাস কিভাবে যুক্ত হবে?
                                <span class="accordian_icon"></span>
                            </div>
                            <div class="faq-answer">
                                আপনি পেমেন্ট করার পর আপনাকে আমাদের একটি প্রাইভেট গ্রুপে যুক্ত করা
                                হবে, এবং যেদিন লাইভ ক্লাস হবে সেদিন আপনাকে জুমের লিংক শেয়ার করা হবে।
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="accordian_bottom_area">
                    <div class="button_area">
                        <a class="reg_btn" href="">
                            <span>রেজিস্ট্রেশন করুন এখনই</span><span class="line"></span>
                            <span> {{ en_to_bn($course->discount_price ?? '') }}  টাকা <i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                    <div class="total_seat">আর মাত্র <span>৩৭ সিট বাকি</span></div>
                </div>
            </div>
        </div>
    @endif



    <footer class="footer">
        <div class="container">
            <div class="footer_wrapper">
                <div class="left">
                    <p>© 2025 | Business Academy | All rights reserved.</p>
                </div>
                <div class="right">
                    <ul class="social">
                        <li><a href=""><i class="fab fa-facebook"></i></a></li>
                        <li><a href=""><i class="fab fa-youtube"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>




</body>
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</html>
