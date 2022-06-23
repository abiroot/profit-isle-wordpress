<?php

if (!class_exists('PROBooksSection')) {
    class PROBooksSection extends VC_Element_Abstract
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
                    'name' => __('PROBooksSection', 'profit-isle'),
                    'base' => 'pro_books_section',
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
                            'heading' => 'Title',
                            'type' => 'textfield',
                            'param_name' => 'section_title',
                            'group' => 'General Info',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Title',
                            'type' => 'textfield',
                            'param_name' => 'section_title',
                            'group' => 'General Info',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Title',
                            'type' => 'textfield',
                            'param_name' => 'section_title',
                            'group' => 'General Info',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Testimonial Image',
                            'type' => 'attach_image',
                            'param_name' => 'testimonial_image',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Testimonial Image',
                            'type' => 'attach_image',
                            'param_name' => 'testimonial_image',
                            'value' => '',
                        ],
                    ],
                ]
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_books_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROBooksSection/twig-templates/pro_books_section.css", array(), '1.0');

            wp_enqueue_script('pro_books_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROBooksSection/twig-templates/pro_books_section.js", array('jquery'), '1.0', true);


            return $this->twigObj->render("pro_books_section.html.twig", array());
        }
    }
}
