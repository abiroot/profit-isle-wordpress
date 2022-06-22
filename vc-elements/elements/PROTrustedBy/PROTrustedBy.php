<?php

if (!class_exists('PROTrustedBy')) {
	class PROTrustedBy extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROTrustedBy', 'profit-isle'),
				'base' => 'pro_trusted_by',
				'description' => __('', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
                    array(
                        'description' => 'Add up to 8 images',
                        'group' => 'Trustees',
                        'type' => 'param_group',
                        'heading' => 'Trusted By Images',
                        'param_name' => 'trusted_by_images',
                        'params' => array(
                            array(
                                'heading' => 'TrustedBy Image',
                                'type' => 'attach_image',
                                'param_name' => 'trusted_by_image',
                            ),
                            array(
                                'heading' => 'TrustedBy Link',
                                'type' => 'textfield',
                                'param_name' => 'trusted_by_link',
                                'value' => '#'
                            ),
                        )
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('pro_trusted_by-style', get_template_directory_uri() .
				"/vc-elements/elements/PROTrustedBy/twig-templates/pro_trusted_by.css", array(), '1.0');

			wp_enqueue_script('pro_trusted_by-script', get_template_directory_uri() .
				"/vc-elements/elements/PROTrustedBy/twig-templates/pro_trusted_by.js", array('jquery'), '1.0', true);

            $trustedByList = vc_param_group_parse_atts($atts['trusted_by_images']);
            foreach ($trustedByList as $key => $trustedBy) {
                $trustedByList[$key]['trusted_by_image'] = wp_get_attachment_image_src($trustedBy['trusted_by_image'], 'full')[0];
            }

            $trustedByList = array_slice($trustedByList, 0, 8);

            return $this->twigObj->render("pro_trusted_by.html.twig", array(
                "trusted_by_list" => $trustedByList
            ));
		}
	}
}
