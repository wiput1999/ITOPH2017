$(document).ready(function () {
            //  if (window.matchMedia('(max-width: 767px)').matches) {
            //     alert("adasdasd");
            //     }
            var underline_w = "<div class='under-line white-bg-color'></div>";
            var underline_o = "<div class='under-line org-bg-color'></div>";
            $('#e-sport').hover(function () {
                $('.bg-esport').css("opacity", "0.2");
                $('#section4').css("background-color", "#20201f");
                $('.retext h1').html("E-SPORT" + underline_o).fadeIn('slow');
            }, function () {
                $('.bg-esport').css("opacity", "0");
                $('#section4').css("background-color", "#fdc82c");
                $('.retext h1').html("การแข่งขัน" + underline_w).fadeIn('slow');
            });

            $('#project-it').hover(function () {
                $('.bg-project-it').css("opacity", "0.2");
                $('#section4').css("background-color", "#20201f");
                $('.retext h1').html("การแข่งขันโครงงาน" + underline_o).fadeIn('slow');
            }, function () {
                $('.bg-project-it').css("opacity", "0");
                $('#section4').css("background-color", "#fdc82c");
                $('.retext h1').html("การแข่งขัน" + underline_w).fadeIn('slow');
            });


            var ui_card = $(".ui-card");
            var section = $(".section");
            var hilight_img = $(".hilight-img");
            $(window).scroll(function () {
                    var ScrollTop = parseInt($(window).scrollTop());
                    console.log(ScrollTop);

                    var sec2 = $("#section2").offset().top;



                    if (ScrollTop > 0) {
                        $(".fac-name").css("left", "-1000px");
                    } else {
                        $(".fac-name").css("left", "25px");
                    }


                    if (ScrollTop > sec2) {
                            $(".intro-word").addClass("bounceInUp").css("opacity", "1");
                            for(i=1;i<=4;i++){
                                $(".hilight-"+i).addClass("bounceInUp").css("opacity", "1");
                            }
                        }
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
            });