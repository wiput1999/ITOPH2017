$(document).ready(function () {
    //  if (window.matchMedia('(max-width: 767px)').matches) {
    //     alert("adasdasd");
    //     }
    var underline_w = "<div class='under-line white-bg-color'></div>";
    var underline_o = "<div class='under-line org-bg-color'></div>";
    $('#e-sport').hover(function () {
        $('.bg-esport').css("opacity", "0.2");
        $('.retext h1').html("E-SPORT" + underline_o).fadeIn('slow');
        $(".bg-black").css("opacity","1");
    }, function () {
        $('.bg-esport').css("opacity", "0");
        $('.retext h1').html("การแข่งขัน" + underline_w).fadeIn('slow');
        $(".bg-black").css("opacity","0");
    });

    $('#project-it').hover(function () {
        $('.bg-project-it').css("opacity", "0.2");
        $('.retext h1').html("การแข่งขันโครงงาน" + underline_o).fadeIn('slow');
        $(".bg-black").css("opacity","1");
    }, function () {
        $('.bg-project-it').css("opacity", "0");
        $('#section4').css("background-color", "#fdc82c");
        $('.retext h1').html("การแข่งขัน" + underline_w).fadeIn('slow');
        $(".bg-black").css("opacity","0");
    });

    $('#network-it').hover(function () {
        $('.bg-network').css("opacity", "0.2");
        $('.retext h1').html("ความปลอดภัยระบบ" + underline_o).fadeIn('slow');
        $(".bg-black").css("opacity","1");
    }, function () {
        $('.bg-network').css("opacity", "0");
        $('#section4').css("background-color", "#fdc82c");
        $('.retext h1').html("การแข่งขัน" + underline_w).fadeIn('slow');
        $(".bg-black").css("opacity","0");
    });


    $('#website-it').hover(function () {
        $('.bg-website').css("opacity", "0.2");
        $('.retext h1').html("การแข่งขันพัฒนาเว็บไซต์" + underline_o).fadeIn('slow');
        $(".bg-black").css("opacity","1");
    }, function () {
        $('.bg-website').css("opacity", "0");
        $('#section4').css("background-color", "#fdc82c");
        $('.retext h1').html("การแข่งขัน" + underline_w).fadeIn('slow');
        $(".bg-black").css("opacity","0");
    });

    $('#quiz-it').hover(function () {
        $('.bg-quiz').css("opacity", "0.2");
        $('.retext h1').html("แก้ปัญหาเชิงวิเคราะห์" + underline_o).fadeIn('slow');
        $(".bg-black").css("opacity","1");
    }, function () {
        $('.bg-quiz').css("opacity", "0");
        $('#section4').css("background-color", "#fdc82c");
        $('.retext h1').html("การแข่งขัน" + underline_w).fadeIn('slow');
        $(".bg-black").css("opacity","0");
    });


    var ui_card = $(".ui-card");
    var section = $(".section");
    var hilight_img = $(".hilight-img");
    $(window).scroll(function () {
        var ScrollTop = parseInt($(window).scrollTop());
        console.log(ScrollTop);

        var sec2 = $("#section2").offset().top;
        var sec3 = $("#section3").offset().top;
        var sec4 = $("#section4").offset().top;
        var sec5 = $("#section5").offset().top;
        var sec7 = $("#section7").offset().top;


        if (ScrollTop > 0) {
            $(".fac-name").css("left", "-1000px");
        } else {
            $(".fac-name").css("left", "25px");
        }


        if (ScrollTop > sec2) {
            $(".intro-word").addClass("bounceInUp").css("opacity", "1");
            for (i = 1; i <= 4; i++) {
                $(".hilight-" + i).addClass("bounceInUp").css("opacity", "1");
            }
        }

        // if (ScrollTop > sec3 && ScrollTop < sec5) {
        //     $("#navbar ul li a").css("color","#fff");
        // }else{
        //     $("#navbar ul li a").css("color","#464646");
        }

        // if (ScrollTop >  sec7 ) {
        //     $("#navbar ul li a").css("color","#fff");
        // }else{
        //     $("#navbar ul li a").css("color","#464646");
        // }
        

    });


    $(window).mousemove(function (event) {
        $(".box1 img").css({
            "left": 36 - event.pageX / 200 + "%",
            "top": 70 + event.pageY / 200 + "%"
        });
        $(".box2 img").css({
            "right": 70 - event.pageX / 200 + "%",
            "top": 30 + event.pageY / 200 + "%"
        });
        $(".box3 img").css({
            "right": 20 - event.pageX / 200 + "%",
            "top": 50 + event.pageY / 200 + "%"
        });

        $("#section1").css({
            "background-position-y": 20 - event.pageY / 100 + "%",
            "background-position-x": 20 - event.pageX / 100 + "%",
        });
    });

    $("#scrolldown").click(function () {
        $("#logo").css("top", "-9900px", "position", "absolute");
    });



    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });
});