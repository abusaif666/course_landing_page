<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/slick.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
</head>
<body>


  <div>
    <!-- Course Details -->
    <div class="course_details">
        <div class="container">
            <div class="course_title">{{ $course->title }}</div>
            <div class="course_description">{{ $course->description }}</div>
        </div>
    </div>

    <!-- Top Video -->
    <div class="top_video">
        <div class="container">
            <div class="top_video_wrapper">
                <iframe src="https://www.youtube.com/embed/{{ $course->video }}?autoplay=0&mute=0"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </div>


    <!-- Offer Area -->
    <div class="offer_area">
        <div class="container">
            <div class="offer_wrapper">
                <div class="offer_box">
                    <div class="regular_price">রেগুলার প্রাইস <span>{{ $course->price }}/-</span></div>
                    <div class="offer_price">অফার প্রাইস <span>{{ $course->discount_price }}/-</span></div>
                    <div class="title">অফারটি চলবেঃ</div>
                    <div class="offer_count_box" data-created-at="{{ $course->created_at }}">
                        <div class="count_box">
                            <div class="number">00</div>
                            <div class="text">Days</div>
                        </div>
                        <div class="count_box">
                            <div class="number">00</div>
                            <div class="text">Hours</div>
                        </div>
                        <div class="count_box">
                            <div class="number">00</div>
                            <div class="text">Minutes</div>
                        </div>
                        <div class="count_box">
                            <div class="number">00</div>
                            <div class="text">Seconds</div>
                        </div>
                    </div>

                    <div class="mt-2">
                        {{-- <a class="whatsapp_btn" href="#enrollNowArea"> Enroll Now</a> --}}
                        <a class="whatsapp_btn" href="{{ route('checkout.page',$course->slug) }}"> Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Why Take Course -->
    @if ($benefits->count() > 0)
        <div class="why_take_course">
            <div class="container">
                <div class="why_take_course_wrapper">
                    <div class="title">কোর্সটা কেন করবেন ?</div>
                    <div class="why_take_course_content">
                        <div class="row">
                            @foreach ($benefits as $item)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="box">{{ $item->benefit }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- Course Outline -->
    @if ($outlines->count() > 0)
        <div class="course_outline">
            <div class="container">
                <div class="course_outline_wrapper">
                    <div class="title">নতুন কোর্স <span>আউটলাইন</span></div>
                    <div class="subtitle">এক নজরে দেখে নিই কি কি থাকছে এই কোর্সে</div>
                    <div class="course_outline_list">
                        <ul>
                            @foreach ($outlines as $outline)
                                <li><i class="fa-solid fa-circle-check"></i>{{ $outline->outline }}</li>
                            @endforeach

                        </ul>
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
                        <div class="title">স্টুডেন্ট <span>রিভিউ ক্লাস</span></div>
                        <div class="video_slider_arrows">
                            <button class="arrow left_arrow"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="arrow right_arrow"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>

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
                </div>
            </div>
        </div>
    @endif

    @if ($result->count() > 0)
        <div class="image_slider_wrapper">
            <div class="container">
                <div class="slider_header">
                    <div class="title">স্টুডেন্ট রেজাল্ট</div>
                    <div class="image_slider_arrows">
                        <button class="arrow left_arrow"><i class="fa-solid fa-arrow-left"></i></button>
                        <button class="arrow right_arrow"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="image_slider_wrapper">
                    <div class="slick-image-slider">
                        @foreach ($result as $data)
                            <div class="slide">
                                <img src="{{ asset('storage/student_result/' . $data->photo) }}" width="80">
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- FAQs -->
    @if ($faqs->count() > 0)
        <div class="accordion">
            <div class="container">
                <div id="question_answer_accordion" class="accordion_wrapper">
                    <div class="title">আপনার <span>প্রশ্নের উত্তর</span></div>

                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <h3>{{ $faq->question }}</h3>
                                <span class="icon">+</span>
                            </div>
                            <div class="accordion-body">
                                <span class="arrow">➔</span> {{ $faq->answer }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- <div class="course_join">
        <div class="container">
            <div class="course_join_wrapper">
                <div class="title">কোর্স আজকে জয়েন হলে পাবেন {{ $course->price - $course->discount_price }} টাকা ছাড়!
                </div>
                <div class="course_join_count_box offer_count_box" data-created-at="{{ $course->created_at }}">
                    <div class="count_box">
                        <div class="number"></div>
                        <div class="text">Days</div>
                    </div>
                    <div class="count_box">
                        <div class="number"></div>
                        <div class="text">Hours</div>
                    </div>
                    <div class="count_box">
                        <div class="number"></div>
                        <div class="text">Minutes</div>
                    </div>
                    <div class="count_box">
                        <div class="number"></div>
                        <div class="text">Seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="enrol_form_wrapper" id="enrollNowArea">
        <div class="container ">
            <div class="enroll_form_title">নিচের ফর্মটি পুরন করে এখনি এনরোল করুন</div>
            <form id="enrollForm" action="{{ route('payment.initiate',$course->id) }}" method="POST">
                @csrf

                <div class="row wrapper">
                    <div class="preloader_enroll">
                        <div class="preloader_wrapper">
                            <span class="loader"></span>
                        </div>
                    </div>

                    <!-- Billing Details -->
                    <div class="col-md-6">
                        <div class="form_area">
                            <div class="form_header">
                                <div class="title">Billing Details</div>
                            </div>
                            <div class="form_body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form_controll">
                                            <label>সম্পূর্ন নাম</label>
                                            <input type="text" name="name" value="" placeholder="সম্পূর্ন নাম">
                                            <small class="error-message text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_controll">
                                            <label>আপনার ইমেইল</label>
                                            <input type="email" name="email" value="" placeholder="আপনার ইমেইল">
                                            <small class="error-message text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form_controll">
                                            <label>আপনার (WhatsApp) নাম্বার</label>
                                            <input type="text" name="phone" value="" placeholder="আপনার (WhatsApp) নাম্বার">
                                            <small class="error-message text-danger"></small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-6">
                        <div class="enroll_area">
                            <div class="details_table_header">
                                <div class="title">Your Order</div>
                            </div>
                            <div class="details_table_body">
                                <table class="enrol_table">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $course->title }} x 1</td>
                                            <td class="text-right">{{ $course->discount_price }}৳</td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td class="text-right">{{ $course->discount_price }}৳</td>
                                        </tr>
                                        <tr>
                                            <td><b>Total</b></td>
                                            <td class="text-right"><b>{{ $course->discount_price }}৳</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="enroll_table_payment_method_box">
                                    <div class="title">পেমেন্ট করুন</div>
                                    <div class="payment_method">বিকাশ, নগদ, রকেট, ব্যাংক</div>
                                </div>
                            </div>
                            <div class="table_footer mt-3">
                                <button type="submit" class="enroll_btn">
                                    <i class="fa-solid fa-lock"></i> Enroll Now {{ $course->discount_price }}৳
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}


</div>
</body>
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</html>