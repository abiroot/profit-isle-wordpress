jQuery('.parallax-section-unearth').scroll(function () {
    // var scrollTop = jQuery(this).scrollTop(),
    //     height = jQuery(this).height() * 0.2;
    //
    // jQuery('.parallax-section-unearth').css('background-position-y', (height - (scrollTop * 0.2)) + 'px');

    var jQueryel = jQuery('.parallax-section-unearth');
    jQueryel.on('scroll', function () {
        var scroll = jQueryel.scrollTop();
        jQueryel.css({
            'background-position': '100% ' + (-0.2 * scroll) + 'px'
        });
    });
});
//
// // set height of the svg path as constant
// const svg = document.getElementById("svgPath");
// const length = svg.getTotalLength();
//
// // start positioning of svg drawing
// svg.style.strokeDasharray = length;
// // hide svg before scrolling starts
// svg.style.strokeDashoffset = length;
// window.addEventListener("scroll", function () {
//     const scrollpercent = (document.body.scrollTop + document.documentElement.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);
//
//     const draw = length * scrollpercent;
//
//     // Reverse the drawing when scroll upwards
//     svg.style.strokeDashoffset = length - draw;
// });