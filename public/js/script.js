$( document ).ready(function() {
    //  if (window.matchMedia('(max-width: 767px)').matches) {
    //     alert("adasdasd");
    //     }


    var ui_card = $(".ui-card");
    var section = $(".section");

    $(window).scroll(function(){
        var ScrollTop = parseInt($(window).scrollTop());
        console.log(ScrollTop);
        
        var img4 = $("#section2").offset().top;
        $('.img-parallax-4').css("bottom",(ScrollTop-img4)/10);



        if(ScrollTop > 0){
            $(".fac-name").css("left","-1000px");
        }else{
            $(".fac-name").css("left","25px");
        }
    });


    $(window).mousemove(function(event) {
        $(".box1 img").css({"left" : 36-event.pageX/200+"%", "top" : 70+event.pageY /200+"%"});
        $(".box2 img").css({"right" : 70-event.pageX/200+"%", "top" : 30+event.pageY /200+"%"});
        $(".box3 img").css({"right" : 20-event.pageX/200+"%", "top" : 50+event.pageY /200+"%"});
    });

    $("#scrolldown").click(function(){
        $("#logo").css("top","-9900px","position","absolute");
    });
});