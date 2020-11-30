var menu = true;
$(document).ready(function () {
    new WOW().init();
    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
    // $('#fade')[0].innerHTML = '';
    setTimeout(function() {
        $('.intro-loader').css('display', 'none');
    }, 200);
    $('.account img').click(function () {
        $('.account-popup').toggle();
        $('.account-overlay').toggle();
    });
    $('.account-overlay').click(function () {
        $('.account-popup').toggle();
        $('.account-overlay').toggle();
    });
    $('.menu-btn').click(function () {
        if (menu) {
            $('.menu.responsive').attr({'style':'display: block !important'});
            $('.menu.responsive a:last-child').attr({'style':'display: block'});
            menu = false;
        }else {
            $('.menu.responsive').attr({'style':'display: none !important'});
            $('.menu.responsive a:last-child').attr({'style':'display: none'});
            menu = true;
        }
    });
});
