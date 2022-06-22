<?php

if (!class_exists('PROTimeline')) {
    class PROTimeline extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(array(
                'name' => __('PROTimeline', 'profit-isle'),
                'base' => 'pro_timeline',
                'description' => __('', 'profit-isle'),
                'category' => __('Profit-isle Elements', 'profit-isle'),
                'params' => array(
                    array(
                        'heading' => 'Timeline Main Description',
                        'type' => 'textarea',
                        'param_name' => 'timeline_main_description',
                    ),
                    array(
                        'group' => 'Timeline',
                        'heading' => 'Timeline',
                        'type' => 'param_group',
                        'param_name' => 'timelines',
                        'value' => '',
                        'params' => array(
                            array(
                                'heading' => 'Section Date',
                                'type' => 'textfield',
                                'param_name' => 'section_date',
                                'value' => '',
                            ),
                            array(
                                'type' => 'param_group',
                                'heading' => 'Multiple Section Timeline',
                                'param_name' => 'multiple_section_timeline',
                                'params' => [
                                    [
                                        'heading' => 'Section Title',
                                        'type' => 'textfield',
                                        'param_name' => 'section_title',
                                        'value' => '',
                                    ],
                                    [
                                        'heading' => 'Section content',
                                        'type' => 'textarea',
                                        'param_name' => 'section_content',
                                        'value' => '',
                                    ]
                                ]
                            )
                        )
                    )
                ),
            ));
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_timeline-style', get_template_directory_uri() .
                "/vc-elements/elements/PROTimeline/twig-templates/pro_timeline.css", array(), '1.0');

            wp_enqueue_script('pro_timeline-script', get_template_directory_uri() .
                "/vc-elements/elements/PROTimeline/twig-templates/pro_timeline.js", array('jquery'), '1.0', true);

            $timelines = vc_param_group_parse_atts($atts['timelines']);

            foreach ($timelines as $key => $timeline) {
                $timelines[$key]['multiple_section_timeline'] = vc_param_group_parse_atts($timeline['multiple_section_timeline']);
            }

            return $this->twigObj->render("pro_timeline.html.twig", array(
                "timeline_main_title" => $atts['timeline_main_description'],
                "timelines" => $timelines

            ));
        }
    }
}
