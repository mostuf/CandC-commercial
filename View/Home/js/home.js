
$(document).ready(function(){
    $(".anim-block").width("90%").css("marginLeft","5%").animate({opacity:1,width:"100%","marginLeft":"0%"},1000);
    /*scrollHeight = $("body").height();
    $(".scroll-content").scroll(function(){
        if ($(this).scrollTop() == 0) {
            $(".navbar").stop().animate({height:"90px"},200);
            
            $(".scroll-content").stop().animate({"margin-top":"90px","height":scrollHeight},200);
        } else {
            $(".navbar").stop().animate({height:"50px"},200);
            $(".scroll-content").stop().animate({"margin-top":"50px","height":scrollHeight + 40},200);
        }
    });
    $(window).resize(function(){
        scrollHeight = $("body").height();
        $(".scroll-content").scroll();
    })*/
});