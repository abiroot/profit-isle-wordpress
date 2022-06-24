<?php

if (!class_exists('PROProfitRoadmapSection')) {
    class PROProfitRoadmapSection extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map([
                    'name' => __('PROProfitRoadmapSection', 'profit-isle'),
                    'base' => 'pro_profit_roadmap_section',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Roadmap Image',
                            'type' => 'attach_image',
                            'param_name' => 'roadmap_image',
                            'value' => '',
                            'group' => 'General',
                        ],
                        [
                            'heading' => 'Roadmap Title',
                            'type' => 'textfield',
                            'param_name' => 'roadmap_title',
                            'value' => '',
                            'group' => 'General',
                        ],
                        [
                            'heading' => 'Roadmap Text',
                            'type' => 'textarea',
                            'param_name' => 'roadmap_text',
                            'value' => '',
                            'group' => 'General',
                        ],
                        [
                            'heading' => 'First Title',
                            'type' => 'textfield',
                            'param_name' => 'roadmap_first_title',
                            'value' => '',
                            'group' => 'Roadmap',
                        ],
                        [
                            'heading' => 'First Text',
                            'type' => 'textarea',
                            'param_name' => 'roadmap_first_text',
                            'value' => '',
                            'group' => 'Roadmap',
                        ],
                        [
                            'heading' => 'Second Title',
                            'type' => 'textfield',
                            'param_name' => 'roadmap_second_title',
                            'value' => '',
                            'group' => 'Roadmap',
                        ],
                        [
                            'heading' => 'Second Text',
                            'type' => 'textarea',
                            'param_name' => 'roadmap_second_text',
                            'value' => '',
                            'group' => 'Roadmap',
                        ],
                        [
                            'heading' => 'Third Title',
                            'type' => 'textfield',
                            'param_name' => 'roadmap_third_title',
                            'value' => '',
                            'group' => 'Roadmap',
                        ],
                        [
                            'heading' => 'Third Text',
                            'type' => 'textarea',
                            'param_name' => 'roadmap_third_text',
                            'value' => '',
                            'group' => 'Roadmap',
                        ],
                        [
                            'heading' => 'Fourth Text',
                            'type' => 'textarea',
                            'param_name' => 'roadmap_fourth_text',
                            'value' => '',
                            'group' => 'Roadmap',
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

            wp_enqueue_style('pro_profit_roadmap_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROProfitRoadmapSection/twig-templates/pro_profit_roadmap_section.css", array(), '1.0');

            wp_enqueue_script('pro_profit_roadmap_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROProfitRoadmapSection/twig-templates/pro_profit_roadmap_section.js", array('jquery'), '1.0', true);

            $firstImage = wp_get_attachment_image_src($atts['roadmap_image'], 'full')[0];
            $animation_classes = $this->getCSSAnimation($atts['animation']);

            return $this->twigObj->render("pro_profit_roadmap_section.html.twig",
                [
                    'roadmap_image' => $firstImage,
                    'roadmap_title' => $atts['roadmap_title'],
                    'roadmap_text' => $atts['roadmap_text'],
                    'roadmap_first_title' => $atts['roadmap_first_title'],
                    'roadmap_first_text' => $atts['roadmap_first_text'],
                    'roadmap_second_title' => $atts['roadmap_second_title'],
                    'roadmap_second_text' => $atts['roadmap_second_text'],
                    'roadmap_third_title' => $atts['roadmap_third_title'],
                    'roadmap_third_text' => $atts['roadmap_third_text'],
                    'roadmap_fourth_text' => $atts['roadmap_fourth_text'],
                    "animation" => $animation_classes,

                ]
            );
        }
    }
}
