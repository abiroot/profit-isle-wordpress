<?php

if (!class_exists('PROTextMapSection')) {
    class PROTextMapSection extends VC_Element_Abstract
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
                    'name' => __('PROTextMapSection', 'profit-isle'),
                    'base' => 'pro_text_map_section',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Text',
                            'type' => 'textarea',
                            'param_name' => 'text',
                        ],
                        [
                            'heading' => 'Image',
                            'type' => 'attach_image',
                            'param_name' => 'image',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Cursor Image',
                            'type' => 'attach_image',
                            'param_name' => 'cursor_image',
                            'value' => '',
                        ],
                    ],
                ],
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_text_map_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROTextMapSection/twig-templates/pro_text_map_section.css", array(), '1.0');

            wp_enqueue_script('pro_text_map_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROTextMapSection/twig-templates/pro_text_map_section.js", array('jquery'), '1.0', true);


            return $this->twigObj->render("pro_text_map_section.html.twig",
                [
                    'text' => $atts['text'],
                    'image' => wp_get_attachment_image_src($atts['image'], 'full')[0],
                    'cursor_image' => wp_get_attachment_image_src($atts['cursor_image'], 'full')[0],
                ]
            );
        }
    }
}
