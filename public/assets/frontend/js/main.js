 $(document).ready(function() {


        $('.slick-image-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            dots: false,
            infinite: true,
            prevArrow: $('.image_slider_arrows .left_arrow'),
            nextArrow: $('.image_slider_arrows .right_arrow'),
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });

        $('.video_items').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            dots: false,
            infinite: true,
            prevArrow: $('.video_slider_arrows .left_arrow'),
            nextArrow: $('.video_slider_arrows .right_arrow'),
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });

        $('.accordion-body').hide();
        $('.accordion-header').click(function() {
            var $header = $(this);
            var $body = $header.next('.accordion-body');
            if ($body.is(':visible')) {
                $body.slideUp(300);
                $header.removeClass('active');
                $header.find('.icon').text('+');
            } else {
                $('.accordion-body').slideUp(300);
                $('.accordion-header').removeClass('active').find('.icon').text('+');
                $body.slideDown(300);
                $header.addClass('active');
                $header.find('.icon').text('-');
            }
        });
       

        function startCountdown() {
            $('.offer_count_box').each(function() {
                var $this = $(this);
                var createdAt = $this.data('created-at');
                var createdTime = new Date(createdAt).getTime();
                setInterval(function() {
                    var now = new Date().getTime();
                    var diff = now - createdTime;
                    var totalSeconds = 24 * 60 * 60 - (Math.floor(diff / 1000) % (24 * 60 *
                    60));
                    var days = Math.floor(totalSeconds / (24 * 60 * 60));
                    var hours = Math.floor((totalSeconds % (24 * 60 * 60)) / 3600);
                    var minutes = Math.floor((totalSeconds % 3600) / 60);
                    var seconds = totalSeconds % 60;
                    var boxes = $this.find('.count_box');
                    $(boxes[0]).find('.number').text(days.toString().padStart(2, '0'));
                    $(boxes[1]).find('.number').text(hours.toString().padStart(2, '0'));
                    $(boxes[2]).find('.number').text(minutes.toString().padStart(2, '0'));
                    $(boxes[3]).find('.number').text(seconds.toString().padStart(2, '0'));

                }, 1000);
            });
        }

        startCountdown();



    });