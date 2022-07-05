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
                        'heading' => 'How It Works',
                        'type' => 'attach_image',
                        'param_name' => 'how_it_works',
                        'value' => '',
                    ],
                    array(
                        'group' => 'Slider Text',
                        'heading' => 'Slides',
                        'type' => 'param_group',
                        'param_name' => 'text_slides',
                        'params' => array(
                            [
                                'heading' => 'Title',
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'value' => '',
                            ],
                            [
                                'heading' => 'Paragraph',
                                'type' => 'textarea',
                                'param_name' => 'paragraph',
                                'value' => '',
                            ],
                        )
                    ),
                    [
                        'type' => 'animation_style',
                        'heading' => __('Animation Style', 'text-domain'),
                        'param_name' => 'animation_one',
                        'description' => __('Choose your animation style', 'text-domain'),
                        'group' => 'Animation Messy Data',
                        'value' => '',
                    ],
                    [
                        'type' => 'animation_style',
                        'heading' => __('Heading Image Animation Style', 'text-domain'),
                        'param_name' => 'heading_image_animation',
                        'description' => __('Choose your animation style', 'text-domain'),
                        'group' => 'Heading Image',
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
            wp_enqueue_style('slick-plugin',
                "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css", array(), '1.8.1');
            wp_enqueue_style('slick-theme-plugin',
                "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css", array(), '1.8.1');


            wp_enqueue_script('pro_chart_js_cdn', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js',
                array('jquery'), '1.0', true);
            wp_enqueue_script('slick-plugin',
                "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array('jquery'), '1.8.1');


            wp_enqueue_script('pro_messy_data-script', get_template_directory_uri() .
                "/vc-elements/elements/PROMessyData/twig-templates/pro_messy_data.js", array('jquery'), '1.0', true);
            $animation_classes_one = $this->getCSSAnimation($atts['animation_one']);
            $heading_image_animation = $this->getCSSAnimation($atts['heading_image_animation']);
            $howItWorks = wp_get_attachment_image_src($atts['how_it_works'], 'full')[0];

            $text_slides = vc_param_group_parse_atts($atts['text_slides']);

            return $this->twigObj->render("pro_messy_data.html.twig",
                [
                    "heading_image_url" => $howItWorks,
                    "text_slides" => $text_slides,
                    "animation_classes_one" => $animation_classes_one,
                    "heading_image_animation" => $heading_image_animation
                ]
            );
        }
    }
}
