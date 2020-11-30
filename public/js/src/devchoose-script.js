var dev = 1,
    slide = 1;

function thumbClick(el1, el2, el3) {
    dev = el1;
    $('.thumb').removeClass('hover');
    $('.thumb-' + el2).animate({
        "margin-top": "-100%"
    }, 1000);
    $('.thumb-' + el3).animate({
        "margin-top": "-100%"
    }, 1000);
    setTimeout(function () {
        $('.thumb').css({
            "position": "fixed"
        });
        $('.thumb-' + el1).animate({
            "width": "25%",
            "top": "0",
            "margin-left": "0",
            "left": "37.5%",
            "border-bottom-left-radius": "50%",
            "border-bottom-right-radius": "50%"
        }, 1000);
        $('.thumb-' + el1).animate({
            "margin-top": "-20px"
        }, 600);
        $('.thumb-' + el1).animate({
            "margin-top": "-100%"
        }, 2000);
    }, 300);
    setTimeout(function () {
        $('.part-' + el1).animate({
            opacity: 1,
            "z-index": "100000"
        }, 1700);
        $('.part-' + el1 + ' .wow').css({'vsibility':'visible'});
        setTimeout(function () {
            $('.thumb-1').css({
                "display": "none"
            });
            $('.thumb-2').css({
                "display": "none"
            });
            $('.thumb-3').css({
                "display": "none"
            });
        }, 1500);
    }, 1500);
}

$('.thumb-1').click(function () {
    thumbClick(1, 2, 3);
});
$('.thumb-2').click(function () {
    thumbClick(2, 1, 3);
});
$('.thumb-3').click(function () {
    thumbClick(3, 1, 2);
});