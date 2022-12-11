/*global $, alert, console, jQuery, Facebook*/

$(document).ready(function () {
    "use strict";

    /* $('body').scrollspy({ target: '#myNavbar', offset: 50 }); */

    $("html").niceScroll();

    $(".navbar .nav li a").click(function () {
        $("html, body").animate(
            {
                //scrollTop: $('#' + $(this).data('value')).offset().top
                scrollTop: $($(this).attr("href")).offset().top,
            },
            1000
        );
    });

    /* $('.navbar .nav li a').click(function () { var li_id = $(this).attr("href"); $.scrollTo(li_id, 1000); }); */

    var myImgHeight, myFixedNavbar, myScroll, lg, scrollButton, filter_wrapper;

    // Slide Show images #Home
    $("#home").backstretch(
        [
            "/frontAssets/images/home-bg-slideshow1.jpg",
            "/frontAssets/images/home-bg-slideshow2.jpg",
            "/frontAssets/images/home-bg-slideshow3.jpg",
        ],
        { duration: 2000, fade: 750 }
    );

    $(".Slide_Show").height($(window).height());

    $("#home .txt").css(
        "paddingTop",
        ($(window).height() - $("#home .txt").height()) / 2
    );

    // height of Slide Show images #Home
    $(window).resize(function () {
        $(".Slide_Show").height($(window).height());

        $("#home .txt").css(
            "paddingTop",
            ($(window).height() - $("#home .txt").height()) / 2
        );
    });

    // Navbar Fixed
    myImgHeight = $("#home");

    myFixedNavbar = $(".navbar-default");

    $(window).scroll(function () {
        myScroll = $(window).scrollTop();

        if (myScroll >= myImgHeight.outerHeight()) {
            myFixedNavbar.addClass("navbar-fixed-top");
        } else {
            myFixedNavbar.removeClass("navbar-fixed-top");
        }
    });

    // Can also be used with $(document).ready()
    $(window).on("load", function () {
        $(".flexslider").flexslider({
            animation: "slide",
        });
    });

    // FoR Youtube Plugin
    jQuery("a.demo").YouTubePopUp();

    $("[data-fancybox]").fancybox({
        loop: true,

        beforeLoad: function () {
            $(".navbar-default").css({ display: "none" });
            $(".scrollToTop").css({ display: "none" });
        },
        afterClose: function () {
            $(".navbar-default").css({ display: "block" });
            $(".scrollToTop").css({ display: "block" });
        },
    });
});

/* *********************************************************************************************** */

/* Istope Portfolio */

jQuery(document).ready(function ($) {
    "use strict";

    $("#my-Gallery .gallery-content .button").click(function () {
        var value = $(this).attr("data-filter");

        //console.log(value);

        if (value === "all") {
            $(".filter")
                .removeClass("is-animated")
                .hide()
                .promise()
                .done(function () {
                    $(".filter").addClass("is-animated").show();
                });
        } else {
            $(".filter")
                .removeClass("is-animated")
                .hide()
                .promise()
                .done(function () {
                    $(".filter")
                        .filter("." + value)
                        .addClass("is-animated")
                        .show();
                });
        }
    });
});

/* *************************************** Start loading *************************************************** */

$(window).on("load", function () {
    "use strict";

    $(".Slide_Show").height($(window).height());

    $("#home .txt").css(
        "paddingTop",
        ($(window).height() - $("#home .txt").height()) / 2
    );

    /* ********************************************************************************** */

    $(".loading-overlay .spinner").fadeOut(2000, function () {
        $(".loading-overlay .loading-overlay-content").fadeOut(1000);

        $(this)
            .parent()
            .fadeOut(1000, function () {
                // Show Scroll
                $("body").css("overflow", "auto");

                $(this).remove();
            });
    });
});

/* ******************************************************************************************** */

$(document).ready(function () {
    "use strict";

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".scrollToTop").fadeIn();
        } else {
            $(".scrollToTop").fadeOut();
        }
    });

    //Click event to scroll to top
    $(".scrollToTop").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500);

        //return false;
    });
});
