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
			vc_map(array(
				'name' => __('PROContactUsInfoSection', 'profit-isle'),
				'base' => 'pro_contact_us_info_section',
				'description' => __('', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
					array(
						'heading' => 'Text',
						'type' => 'textfield',
						'param_name' => 'button',
					)
				),
			));
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
