jQuery(window).scroll(function(){
    setTimeout(function(){
        var scrollTop     = jQuery(window).scrollTop(),
            elementOffset = jQuery('.section-unearth-loop').offset().top,
            distance      = (elementOffset - (scrollTop + 95));

        if(distance < 50){
            jQuery('.section-unearth-loop .scrollable-section').addClass('start-scroll');
        }else{
            jQuery('.section-unearth-loop .scrollable-section').removeClass('start-scroll');

        }
        // console.log("scrollTop", scrollTop)
        // console.log("elementOffset", elementOffset)
        // console.log("distance", distance)
    }, 500);
    // if(jQuery(window).scrollTop() > jQuery("#div1").offset().top
    //     && jQuery(window).scrollTop() < jQuery("#div2").offset().top)
    // {
    //     doSomething();
    // }
});