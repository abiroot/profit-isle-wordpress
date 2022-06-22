<?php

if (!class_exists('PROTestimonials')) {
    class PROTestimonials extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(
                [
                    'name' => __('PROTestimonials', 'profit-isle'),
                    'base' => 'pro_testimonials',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Title',
                            'type' => 'textfield',
                            'param_name' => 'section_title',
                            'group' => 'General Info',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Sub-Title',
                            'type' => 'textfield',
                            'param_name' => 'section_sub_title',
                            'group' => 'General Info',
                            'value' => '',
                        ],
                        [
                            'group' => 'Testimonials',
                            'description' => 'Add up to 3 testimonials',
                            'type' => 'param_group',
                            'value' => '',
                            'heading' => 'Testimonial List',
                            'param_name' => 'testimonial_list',
                            "max" => 3,
                            'params' => [
                                [
                                    'heading' => 'Testimonial Text',
                                    'type' => 'textarea',
                                    'param_name' => 'testimonial_text',
                                    'value' => '',
                                ],
                                [
                                    'heading' => 'Testimonial Image',
                                    'type' => 'attach_image',
                                    'param_name' => 'testimonial_image',
                                    'value' => '',
                                ],
                                [
                                    'heading' => 'Testimonial Author',
                                    'type' => 'textfield',
                                    'param_name' => 'testimonial_author',
                                    'value' => '',
                                ],
                                [
                                    'heading' => 'Testimonial Job Position',
                                    'type' => 'textfield',
                                    'param_name' => 'testimonial_job_position',
                                    'value' => '',
                                ],
                            ]
                        ],
                        [
                            'type' => 'animation_style',
                            'heading' => __('Animation Style', 'text-domain'),
                            'param_name' => 'animation',
                            'description' => __('Choose your animation style', 'text-domain'),
                            'group' => 'Animation',
                            'value' => '',
                        ],
                    ],
                ]
            );
        }


        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_testimonials-style', get_template_directory_uri() .
                "/vc-elements/elements/PROTestimonials/twig-templates/pro_testimonials.css", array(), '1.0');

            wp_enqueue_script('pro_testimonials-script', get_template_directory_uri() .
                "/vc-elements/elements/PROTestimonials/twig-templates/pro_testimonials.js", array('jquery'), '1.0', true);

            $animation_classes = $this->getCSSAnimation($atts['animation']);
            $testimonials = vc_param_group_parse_atts($atts['testimonial_list']);
            foreach ($testimonials as $key => $testimonial) {
                $testimonials[$key]['testimonial_image'] = wp_get_attachment_image_src($testimonial['testimonial_image'], 'full')[0];
            }

            $testimonials = array_slice($testimonials, 0, 3);


            return $this->twigObj->render("pro_testimonials.html.twig", array(
                "section_title" => $atts['section_title'],
                "section_sub_title" => $atts['section_sub_title'],
                "animation_classes" => $animation_classes,
                "testimonials" => $testimonials
            ));
        }
    }
}
