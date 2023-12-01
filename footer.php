

<script>   
    var ticking = false;
    var isFirefox = (/Firefox/i.test(navigator.userAgent));
    var isIe = (/MSIE/i.test(navigator.userAgent)) || (/Trident.*rv\:11\./i.test(navigator.userAgent));
    var scrollSensitivitySetting = 30; 
    var slideDurationSetting = 600; 
    var currentSlideNumber = 0;
    var totalSlideNumber = $(".background").length;

  
    function parallaxScroll(evt) {
        if (isFirefox) {
            //Set delta for Firefox
            delta = evt.detail * (-120);
        } else if (isIe) {
            //Set delta for IE
            delta = -evt.deltaY;
        } else {
            //Set delta for all other browsers
            delta = evt.wheelDelta;
        }

        if (ticking != true) {
            if (delta <= -scrollSensitivitySetting) {
                //Down scroll
                ticking = true;
                if (currentSlideNumber !== totalSlideNumber - 1) {
                    currentSlideNumber++;
                    nextItem();
                }
                slideDurationTimeout(slideDurationSetting);
            }
            if (delta >= scrollSensitivitySetting) {
                //Up scroll
                ticking = true;
                if (currentSlideNumber !== 0) {
                    currentSlideNumber--;
                }
                previousItem();
                slideDurationTimeout(slideDurationSetting);
            }
        }
    }

   
    function slideDurationTimeout(slideDuration) {
        setTimeout(function() {
            ticking = false;
        }, slideDuration);
    }

    
    var mousewheelEvent = isFirefox ? "DOMMouseScroll" : "wheel";
    window.addEventListener(mousewheelEvent, _.throttle(parallaxScroll, 60), false);

  
    function nextItem() {
        var $previousSlide = $(".background").eq(currentSlideNumber - 1);
        console.log(currentSlideNumber);
        var $newCurrSlide = $(".background").eq(currentSlideNumber);

        

        if(currentSlideNumber == 14 ){
             setTimeout(function(){
            $('.background').removeClass("after_sometime"); 
            $newCurrSlide.addClass("after_sometime");
             }, 1000);

             
        }else{
            $('.background').removeClass("after_sometime");
        }

        $('.background').removeClass("third_animation");
         $newCurrSlide.addClass("third_animation");                   
        $previousSlide.removeClass("up-scroll").addClass("down-scroll");
        

    }

    function previousItem() {
        var $currentSlide = $(".background").eq(currentSlideNumber);
        $('.background').removeClass("third_animation");        
        $currentSlide.removeClass("down-scroll").addClass("up-scroll");
        $currentSlide.addClass("third_animation");

         if(currentSlideNumber == 2 ){
            setTimeout(function(){
             $('.background').removeClass("after_sometime"); 
            $currentSlide.addClass("after_sometime");
             }, 3000);
        }else{
            $('.background').removeClass("after_sometime");
        }

        if(currentSlideNumber == 14){
            setTimeout(function(){
             $('.background').removeClass("after_sometime"); 
            $currentSlide.addClass("after_sometime");
             }, 1000);
        }else{
            $('.background').removeClass("after_sometime");
        }

        
    }
</script>


<script>

    window.onload = function() {
         setTimeout(function(){
            $('header').addClass('header_animated');
        $('.banner_section').addClass('expand');
    }, 0);
}

jQuery(document).ready(function(){

    $('#hover_change1').hover (

        function(){
         $(".choices_make_diffrence").addClass("green_choice");
    },
    function(){
         $(".choices_make_diffrence").removeClass("green_choice");
    });

});

jQuery(document).ready(function(){

    $('#hover_change1').hover (

        function(){
         $("header").addClass("green_choice");
    },
    function(){
         $("header").removeClass("green_choice");
    });

});

</script>













<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/ScrollTrigger.min.js"></script>

</body>
</html>