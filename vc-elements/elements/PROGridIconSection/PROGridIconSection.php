<?php

if (!class_exists('PROGridIconSection')) {
    class PROGridIconSection extends VC_Element_Abstract
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
                    'name' => __('PROGridIconSection', 'profit-isle'),
                    'base' => 'pro_grid_icon_section',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Primary Image',
                            'type' => 'attach_image',
                            'param_name' => 'primary_image',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Primary Svg',
                            'type' => 'attach_image',
                            'param_name' => 'primary_svg',
                            'value' => '',
                        ],
                        [
                            'group' => 'Secondary Images',
                            'description' => 'Add up to 4 images',
                            'type' => 'param_group',
                            'value' => '',
                            'heading' => 'Images List',
                            'param_name' => 'images',
                            "max" => 4,
                            'params' => [
                                [
                                    'heading' => 'Primary Image',
                                    'type' => 'attach_image',
                                    'param_name' => 'secondary_image',
                                    'value' => '',
                                ],
                                [
                                    'heading' => 'Primary Svg',
                                    'type' => 'attach_image',
                                    'param_name' => 'secondary_svg',
                                    'value' => '',
                                ],
                                [
                                    'heading' => 'Title',
                                    'type' => 'textfield',
                                    'param_name' => 'title',
                                    'value' => '',
                                ],
                            ],
                        ],
                    ],
                ]
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_grid_icon_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROGridIconSection/twig-templates/pro_grid_icon_section.css", array(), '1.0');

            wp_enqueue_script('pro_grid_icon_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROGridIconSection/twig-templates/pro_grid_icon_section.js", array('jquery'), '1.0', true);

            $images = vc_param_group_parse_atts($atts['images']);

            foreach ($images as $key => $image){
                $images[$key]['secondary_image'] = wp_get_attachment_image_src($image['secondary_image'], 'full')[0];
                $images[$key]['secondary_svg'] = wp_get_attachment_image_src($image['secondary_svg'], 'full')[0];
            }
            $images = array_slice($images, 0, 4);
            print_r($images);

            return $this->twigObj->render("pro_grid_icon_section.html.twig",
                [
                    'images' => $images,
                    'primary_image' => wp_get_attachment_image_src($atts['primary_image'], 'full')[0],
                    'primary_svg' => wp_get_attachment_image_src($atts['primary_svg'], 'full')[0],
                ]
            );
        }
    }
}
