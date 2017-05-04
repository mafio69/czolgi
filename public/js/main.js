'use strict';
$(document).ready(function () {
    var NavY = $('.naw').offset().top;
    var stickyNav;
    stickyNav = function () {
        var ScrollY = $(window).scrollTop();
        if (ScrollY > NavY) {
            $('.naw').addClass('sticky');
            //$('.naw ul li a').css('color', '#ffffff');

        } else {
            $('.naw').removeClass('sticky');
           // $('.naw ul li a').css('color', '#ffffff');

        }
    };
    stickyNav();
    $(window).scroll(function () {
        stickyNav();
    });
});