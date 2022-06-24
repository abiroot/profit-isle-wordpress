<?php

if (!class_exists('PROMessyData')) {
    class PROMessyData extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map([
                    'name' => __('PROMessyData', 'profit-isle'),
                    'base' => 'pro_messy_data',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Title',
                            'type' => 'textfield',
                            'param_name' => 'messy_data_title',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Paragraph',
                            'type' => 'textarea',
                            'param_name' => 'messy_data_paragraph',
                            'value' => '',
                        ],
                        [
                            'type' => 'animation_style',
                            'heading' => __('Animation Style', 'text-domain'),
                            'param_name' => 'animation_one',
                            'description' => __('Choose your animation style', 'text-domain'),
                            'group' => 'Animation Messy Data',
                            'value' => '',
                        ],
                    ],
                ],
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_messy_data-style', get_template_directory_uri() .
                "/vc-elements/elements/PROMessyData/twig-templates/pro_messy_data.css", array(), '1.0');

            wp_enqueue_script('pro_chart_js_cdn', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js',
                array('jquery'), '1.0', true);

            wp_enqueue_script('pro_messy_data-script', get_template_directory_uri() .
                "/vc-elements/elements/PROMessyData/twig-templates/pro_messy_data.js", array('jquery'), '1.0', true);
            $animation_classes_one = $this->getCSSAnimation($atts['animation_one']);

            return $this->twigObj->render("pro_messy_data.html.twig",
                [
                    "messy_data_title" => $atts['messy_data_title'],
                    "messy_data_paragraph" => $atts['messy_data_paragraph'],
                    "animation_classes_one"=>$animation_classes_one
            ]
            );
        }
    }
}
