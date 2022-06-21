jQuery(document).ready(function() {
    jQuery(".section-testimonials [data-section]").on("click", function(el) {

        let sectionID = jQuery(this).attr('data-section');
        jQuery(".section-testimonials .col-md-2 [data-section]").each(function() {
            jQuery(this).addClass('opacity-75');
        });
        jQuery(this).removeClass("opacity-75");

        jQuery(".section-testimonials .testimonial").each(function(e) {
            jQuery(this).removeClass("active-section");
        })
        jQuery(".section-testimonials .testimonial[data-section=" + sectionID + "]").addClass("active-section");
    })
});
