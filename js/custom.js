(function ($) {
    "use strict"; // Start of use strict

    if ($('.trigger').length > 0) {
        (new IntersectionObserver(function (e, o) {
            if (e[0].intersectionRatio > 0) {
                document.documentElement.removeAttribute('class');
            } else {
                document.documentElement.setAttribute('class', 'stuck');
            }
        })).observe(document.querySelector('.trigger'));
    }

})(jQuery); // End of use strict

