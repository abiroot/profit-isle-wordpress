<?php

if (!class_exists('PROWideImageSection')) {
    class PROWideImageSection extends VC_Element_Abstract
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
                    'name' => __('PROWideImageSection', 'profit-isle'),
                    'base' => 'pro_wide_image_section',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Wide Image',
                            'type' => 'attach_image',
                            'param_name' => 'wide_image',
                            'value' => '',
                        ],
                        [
                            'type' => 'animation_style',
                            'heading' => __('Animation Style', 'text-domain'),
                            'param_name' => 'animation_one',
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

            wp_enqueue_style('pro_wide_image_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROWideImageSection/twig-templates/pro_wide_image_section.css", array(), '1.0');

            wp_enqueue_script('pro_wide_image_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROWideImageSection/twig-templates/pro_wide_image_section.js", array('jquery'), '1.0', true);

            $animation_one = $this->getCSSAnimation($atts['animation_one']);


            return $this->twigObj->render("pro_wide_image_section.html.twig",
                [
                    'wide_image' => wp_get_attachment_image_src($atts['wide_image'], 'full')[0],
                    'animation_one' => $animation_one
                ]
            );
        }
    }
}
