<?php

if (!class_exists('PROCapabilitiesSection')) {
    class PROCapabilitiesSection extends VC_Element_Abstract
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
                    'name' => __('PROCapabilitiesSection', 'profit-isle'),
                    'base' => 'pro_capabilities_section',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Capabilities Text',
                            'type' => 'textarea',
                            'param_name' => 'capabilities_text',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Capabilities Title',
                            'type' => 'textfield',
                            'param_name' => 'capabilities_title',
                            'value' => '',
                        ],
                        [
                            'heading' => 'First Image',
                            'type' => 'attach_image',
                            'param_name' => 'capabilities_first_image',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Second Image',
                            'type' => 'attach_image',
                            'param_name' => 'capabilities_second_image',
                            'value' => '',
                        ],
                    ],
                ]
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_capabilities_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROCapabilitiesSection/twig-templates/pro_capabilities_section.css", array(), '1.0');

            wp_enqueue_script('pro_capabilities_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROCapabilitiesSection/twig-templates/pro_capabilities_section.js", array('jquery'), '1.0', true);

            $firstImage = wp_get_attachment_image_src($atts['capabilities_first_image'], 'full')[0];
            $secondImage = wp_get_attachment_image_src($atts['capabilities_second_image'], 'full')[0];

            return $this->twigObj->render("pro_capabilities_section.html.twig",
                [
                    'capabilities_title' => $atts['capabilities_title'],
                    'capabilities_text' => $atts['capabilities_text'],
                    'capabilities_first_image' => $firstImage,
                    'capabilities_second_image' => $secondImage,
                ]
            );
        }
    }
}
