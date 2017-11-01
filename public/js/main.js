$(document).ready(function () {
    'use strict';
    var NavY = $('.naw').offset().top;
    var stickyNav;
    stickyNav = function () {
        var ScrollY = $(window).scrollTop();
        if (ScrollY > NavY) {
            $('.naw').addClass('sticky').css('text-shadow','none');

        } else {
            $('.naw').removeClass('sticky').css('text-shadow',' 2px 2px 3px black');
        }
    };
    stickyNav();
    var throttle = function (callback, limit) {
        var wait = false;
        return function () {
            if (!wait) {
                callback();
                wait = true;
                setTimeout(function () {
                    wait = false;
                }, limit);
            }
        };
    };
    $(window).on('scroll', throttle(stickyNav, 100));
});