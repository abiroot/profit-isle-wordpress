<?php

if (!class_exists('PROBeyondAverage')) {
    class PROBeyondAverage extends VC_Element_Abstract
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
                    'name' => __('PROBeyondAverage', 'profit-isle'),
                    'base' => 'pro_beyond_average',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Beyond Average Title',
                            'type' => 'textfield',
                            'param_name' => 'beyond_average_title',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Beyond Average Paragraph',
                            'type' => 'textarea_html',
                            'param_name' => 'content',

                            'value' => __("<p>I am test text block. Click edit button to change this text.</p>", "my-text-domain"),
                        ],
                        [
                            'heading' => 'Beyond Average Image',
                            'type' => 'attach_image',
                            'param_name' => 'beyond_average_image',
                            'value' => '',
                        ],
                        [
                            'type' => 'animation_style',
                            'heading' => __('Animation Style', 'text-domain'),
                            'param_name' => 'animation_one',
                            'description' => __('Choose your animation style', 'text-domain'),
                            'group' => 'Animation 1',
                            'value' => '',
                        ]
                    ],
                ]
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_beyond_average-style', get_template_directory_uri() .
                "/vc-elements/elements/PROBeyondAverage/twig-templates/pro_beyond_average.css", array(), '1.0');

            wp_enqueue_script('pro_beyond_average-script', get_template_directory_uri() .
                "/vc-elements/elements/PROBeyondAverage/twig-templates/pro_beyond_average.js", array('jquery'), '1.0', true);

            $beyondAverageImage = wp_get_attachment_image_src($atts['beyond_average_image'], 'full')[0];
            $animation_classes_one = $this->getCSSAnimation($atts['animation_one']);
            $animation_classes_two = $this->getCSSAnimation($atts['animation_two']);
            return $this->twigObj->render("pro_beyond_average.html.twig",
                [
                    'beyond_average_title' => $atts['beyond_average_title'],
                    'beyond_average_text' => $content,
                    'beyond_average_image' => $beyondAverageImage,
                    "animation_classes_one" => $animation_classes_one,
                    "animation_classes_two" => $animation_classes_two
                ]
            );
        }
    }
}
