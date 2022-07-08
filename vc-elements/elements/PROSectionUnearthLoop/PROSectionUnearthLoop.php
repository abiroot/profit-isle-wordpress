<?php

if (!class_exists('PROSectionUnearthLoop')) {
    class PROSectionUnearthLoop extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(array(
                'name' => __('PROSectionUnearthLoop', 'profit-isle'),
                'base' => 'pro_section_unearth_loop',
                'description' => __('', 'profit-isle'),
                'category' => __('Profit-isle Elements', 'profit-isle'),
                'params' => array(
                    array(
                        'heading' => 'Loop Content',
                        'type' => 'param_group',
                        'param_name' => 'loop_content',
                        'value' => '',
                        'params' => [
                            [
                                'heading' => 'Loop Title',
                                'type' => 'textfield',
                                'param_name' => 'loop_title',
                                'value' => ''
                            ],
                            [
                                'heading' => 'Loop Description',
                                'type' => 'textarea',
                                'param_name' => 'loop_description',
                                'value' => ''
                            ]
                        ]
                    )
                ),
            ));
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();
            wp_enqueue_style('pro_section_unearth_loop-style', get_template_directory_uri() .
                "/vc-elements/elements/PROSectionUnearthLoop/twig-templates/pro_section_unearth_loop.css", array(), '1.1');

            wp_enqueue_script('pro_section_unearth_loop-script', get_template_directory_uri() .
                "/vc-elements/elements/PROSectionUnearthLoop/twig-templates/pro_section_unearth_loop.js", array('jquery'), '1.0', true);

            $loops = vc_param_group_parse_atts($atts['loop_content']);


            return $this->twigObj->render("pro_section_unearth_loop.html.twig", array(
                "loop_content" => $loops
            ));
        }
    }
}
