<?php

if (!class_exists('PROContactUsInfoSection')) {
    class PROContactUsInfoSection extends VC_Element_Abstract
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
                    'name' => __('PROContactUsInfoSection', 'profit-isle'),
                    'base' => 'pro_contact_us_info_section',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Address',
                            'type' => 'textfield',
                            'param_name' => 'address',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Phone Number',
                            'type' => 'textfield',
                            'param_name' => 'phone_number',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Email',
                            'type' => 'textfield',
                            'param_name' => 'email',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Facebook',
                            'type' => 'textfield',
                            'param_name' => 'facebook',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Linked In',
                            'type' => 'textfield',
                            'param_name' => 'linkedin',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Twitter',
                            'type' => 'textfield',
                            'param_name' => 'twitter',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Youtube',
                            'type' => 'textfield',
                            'param_name' => 'youtube',
                            'value' => '',
                        ],
                    ],
                ]
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_contact_us_info_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROContactUsInfoSection/twig-templates/pro_contact_us_info_section.css", array(), '1.0');

            wp_enqueue_script('pro_contact_us_info_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROContactUsInfoSection/twig-templates/pro_contact_us_info_section.js", array('jquery'), '1.0', true);


            return $this->twigObj->render("pro_contact_us_info_section.html.twig",
                [
                    'address' => $atts['address'],
                    'phone_number' => $atts['phone_number'],
                    'email' => $atts['email'],
                    'facebook' => $atts['facebook'],
                    'linkedin' => $atts['linkedin'],
                    'twitter' => $atts['twitter'],
                    'youtube' => $atts['youtube'],
                ]
            );
        }
    }
}
