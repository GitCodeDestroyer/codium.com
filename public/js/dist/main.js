new WOW().init();

var video = $('#video');

$('.play-icon').click(function () {
    $(this).css({'display':'none'});
    video.play();
});

$('#video').click(function () {
    $('.play-icon').css({'display':'block'});
    video.pause();
});

$(function () {
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
});

$(function() {
  $("body").prognroll({
    height: 5, // progress bar height
    color: "#A28BF1", // progress bar background color
    custom: false // if you make it true, you can add your custom div and see it's scroll progress on the page
  });
});