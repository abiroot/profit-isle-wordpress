<?php

if (!class_exists('PROLinearGradient')) {
    class PROLinearGradient extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(array(
                'name' => __('PROLinearGradient', 'profit-isle'),
                'base' => 'pro_linear_gradient',
                'description' => __('', 'profit-isle'),
                'category' => __('Profit-isle Elements', 'profit-isle'),
                'params' => [
                    [
                        'heading' => 'Title Text',
                        'type' => 'textfield',
                        'param_name' => 'title_text',
                        'value' => '',
                    ],
                    [
                        'heading' => 'Text',
                        'type' => 'textarea',
                        'param_name' => 'text',
                        'value' => '',
                    ],
                ],
            ));
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_linear_gradient-style', get_template_directory_uri() .
                "/vc-elements/elements/PROLinearGradient/twig-templates/pro_linear_gradient.css", array(), '1.0');

            wp_enqueue_script('pro_linear_gradient-script', get_template_directory_uri() .
                "/vc-elements/elements/PROLinearGradient/twig-templates/pro_linear_gradient.js", array('jquery'), '1.0', true);


            return $this->twigObj->render("pro_linear_gradient.html.twig",
                [
                    "title_text" => $atts['title_text'],
                    "text" => $atts['text'],
                ]
            );
        }
    }
}
