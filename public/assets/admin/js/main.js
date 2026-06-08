$(document).ready(function () {

    function isMobile() {
        return $(window).width() < 992;
    }

    // =========================
    // Sidebar Toggle
    // =========================
    $('.menu-toggle').click(function () {

        if (isMobile()) {

            $('.sidebar').toggleClass('active');
            $('.sidebar_overlay').toggleClass('active');

        } else {

            $('.sidebar').toggleClass('hide');
            $('.main').toggleClass('shifted');
            $('.header').toggleClass('shifted');

        }

    });

    // =========================
    // Overlay Click
    // =========================
    $('.sidebar_overlay').click(function () {

        $('.sidebar').removeClass('active');
        $('.sidebar_overlay').removeClass('active');

    });

    // =========================
    // Submenu Toggle
    // =========================
    $('.sidebar .has-submenu > a').click(function () {

        let parent = $(this).parent();

        // Active থাকলে Close হবে
        if (parent.hasClass('active')) {

            parent.removeClass('active');

            parent.find('.submenu')
                .first()
                .stop()
                .slideUp();

            parent.find('.arrow')
                .css('transform', 'rotate(0deg)');

        } else {

            // Sibling Close
            parent.siblings('.has-submenu')
                .removeClass('active');

            parent.siblings('.has-submenu')
                .find('.submenu')
                .slideUp();

            parent.siblings('.has-submenu')
                .find('.arrow')
                .css('transform', 'rotate(0deg)');

            // Current Open
            parent.addClass('active');

            parent.find('.submenu')
                .first()
                .stop()
                .slideDown();

            parent.find('.arrow')
                .css('transform', 'rotate(90deg)');

        }

    });

    // =========================
    // Page Load Active Menu
    // =========================
    $('.sidebar .has-submenu.active').each(function () {

        $(this)
            .find('.submenu')
            .show();

        $(this)
            .find('.arrow')
            .css('transform', 'rotate(90deg)');

    });

    // =========================
    // Window Resize Fix
    // =========================
    $(window).resize(function () {

        if (!isMobile()) {

            $('.sidebar_overlay').removeClass('active');
            $('.sidebar').removeClass('active');

        }

    });

    // =========================
    // Dropify
    // =========================
    $('.dropify').dropify();

    // =========================
    // Lucide Icons
    // =========================
    lucide.createIcons();

    // =========================
    // User Menu Toggle
    // =========================
    $('.header .user-info').on('click', function (e) {

        e.stopPropagation();

        $(this)
            .find('.user_menu_box')
            .toggleClass('active');

    });

    // Menu Box Click Stop
    $('.header .user-info .user_menu_box').on('click', function (e) {

        e.stopPropagation();

    });

    // Outside Click Hide
    $(document).on('click', function () {

        $('.header .user-info .user_menu_box')
            .removeClass('active');

    });

    // =========================
    // Copy Text
    // =========================
    $('.copy-btn').on('click', function () {

        let TableCypyText = $(this)
            .closest('td')
            .find('.copy-text')
            .text()
            .trim();

        let tempInput = $('<input>');

        $('body').append(tempInput);

        tempInput
            .val(TableCypyText)
            .select();

        document.execCommand('copy');

        tempInput.remove();

        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: 'Copyed',
            text: TableCypyText,
            background: '#198754',
            color: '#ffffff',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true
        });

    });

});
