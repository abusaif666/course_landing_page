<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
  </head>

  <body>
    <div class="landing_page_top">
      <header class="site_header">
        <div class="container">
          <div class="site_header_wrapper">
            <div class="header_left">
              <div class="logo_area">
                <a href="">
                  <img width="180" src="assets/img/logo.png" alt="" />
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
                <h2>বাংলাদেশে ই-কমার্স বিজনেস থেকে</h2>
                <h3>কোটি টাকা সেলস করার ফর্মুলা</h3>
                <p>
                  একটি সফল ই-কমার্স ব্যবসার সম্পূর্ণ রোডম্যাপ শূন্য থেকে শুরু
                  করে প্রোডাক্ট, অর্ডার, ডেলিভারি, মার্কেটিং ও স্কেলিং পর্যন্ত
                  শেয়ার করবো এই মাস্টারক্লাসে ।
                </p>
              </div>
            </div>
            <div class="center_area">
              <div class="video_player_wrapper">
                <video class="video player" playsinline controls>
                  <source
                    src="assets/video/1475633_People_Family_1280x720.mp4"
                    type="video/mp4"
                  />
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
      $(function () {
        // open first smoothly
        $(".faq-item.active .faq-answer").slideDown(0);

        $(".faq-question").on("click", function () {
          let item = $(this).parent();

          if (item.hasClass("active")) {
            item.removeClass("active");
            item.find(".faq-answer").slideUp(250);
          } else {
            $(".faq-item")
              .removeClass("active")
              .find(".faq-answer")
              .slideUp(250);

            item.addClass("active");
            item.find(".faq-answer").slideDown(250);
          }
        });
      });
    </script>
    <script>
      const player = new Plyr(".player");
    </script>
  </body>
</html>
