 $(document).ready(function() {


$('.slick-image-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    dots: false,
    infinite: true,
    prevArrow: $('.image_slider_arrows .left_arrow'),
    nextArrow: $('.image_slider_arrows .right_arrow'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
    ]
});


$('.video_items').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    arrows: true,
    dots: false,
    infinite: true,
    prevArrow: $('.video_slider_arrows .left_arrow'),
    nextArrow: $('.video_slider_arrows .right_arrow'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
    ]
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


        
     $('.faq-question').on('click', function(){

        let item = $(this).closest('.faq-item');

        // যদি আগে থেকে active থাকে → বন্ধ করবে
        if(item.hasClass('active')){
            item.removeClass('active');
            item.find('.faq-answer').slideUp(200);
        }
        else{
            // অন্য সব বন্ধ করবে
            $('.faq-item').removeClass('active');
            $('.faq-answer').slideUp(200);

            // current open
            item.addClass('active');
            item.find('.faq-answer').slideDown(200);
        }

    });




function enToBnNumber(number) {

    const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

    return number.toString().replace(/\d/g, digit => bn[digit]);
}


// ===================================
// MAIN COUNTDOWN FUNCTION
// ===================================

function startSmartCountdown(createdAt, offerStart, offerEnd) {

    const cycle = 24 * 60 * 60;

    let fixedEndTimestamp = null;

    // ===================================
    // OFFER MODE
    // ===================================

    if (offerStart && offerEnd) {

        // unique key
        let storageKey = "offer_end_" + offerEnd;

        // already saved
        let savedEnd = localStorage.getItem(storageKey);

        if (savedEnd) {

            fixedEndTimestamp = parseInt(savedEnd);

        } else {

            let now = new Date();

            let h = now.getHours();
            let m = now.getMinutes();
            let s = now.getSeconds();

            // end date
            let endDate = new Date(offerEnd * 1000);

            // current time set
            endDate.setHours(h);
            endDate.setMinutes(m);
            endDate.setSeconds(s);

            fixedEndTimestamp = Math.floor(endDate.getTime() / 1000);

            // save localStorage
            localStorage.setItem(storageKey, fixedEndTimestamp);
        }
    }

    // ===================================
    // UPDATE FUNCTION
    // ===================================

    function update() {

        let nowTimestamp = Math.floor(Date.now() / 1000);

        let remaining;

        // ===================================
        // OFFER COUNTDOWN
        // ===================================

        if (offerStart && offerEnd) {

            remaining = fixedEndTimestamp - nowTimestamp;

            if (remaining <= 0) {

                remaining = 0;

                $(".btn_offer")
                    .text("অফার শেষ হয়েছে")
                    .prop("disabled", true);
            }

        }

        // ===================================
        // FALLBACK 24H ROLLING
        // ===================================

        else {

            let elapsed = nowTimestamp - createdAt;

            remaining = cycle - (elapsed % cycle);
        }

        // ===================================
        // TIME CONVERT
        // ===================================

        let days = Math.floor(remaining / 86400);

        let hours = Math.floor((remaining % 86400) / 3600);

        let minutes = Math.floor((remaining % 3600) / 60);

        let seconds = remaining % 60;

        // ===================================
        // UPDATE UI (BANGLA)
        // ===================================

        $(".days").text(
            enToBnNumber(String(days).padStart(2, '0'))
        );

        $(".hours").text(
            enToBnNumber(String(hours).padStart(2, '0'))
        );

        $(".minutes").text(
            enToBnNumber(String(minutes).padStart(2, '0'))
        );

        $(".seconds").text(
            enToBnNumber(String(seconds).padStart(2, '0'))
        );
    }

    // first run
    update();

    // every second
    setInterval(update, 1000);
}


// ===================================
// INIT
// ===================================

let el = $("#countdown-data");

let createdAt = parseInt(el.attr("data-created"));

let offerStart = el.attr("data-start")
    ? parseInt(el.attr("data-start"))
    : null;

let offerEnd = el.attr("data-end")
    ? parseInt(el.attr("data-end"))
    : null;


// start
startSmartCountdown(createdAt, offerStart, offerEnd);


$(document).on('click', '.register_btn', function(e) {
    e.preventDefault();

    $('html, body').animate({
        scrollTop: $('#checkout_form').offset().top
    });
});




    });