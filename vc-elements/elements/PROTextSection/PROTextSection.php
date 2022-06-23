<?php

if (!class_exists('PROTextSection')) {
	class PROTextSection extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROTextSection', 'profit-isle'),
				'base' => 'pro_text_section',
				'description' => __('', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
					array(
						'heading' => 'Text',
						'type' => 'textfield',
						'param_name' => 'text',
					)
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('pro_text_section-style', get_template_directory_uri() .
				"/vc-elements/elements/PROTextSection/twig-templates/pro_text_section.css", array(), '1.0');

			wp_enqueue_script('pro_text_section-script', get_template_directory_uri() .
				"/vc-elements/elements/PROTextSection/twig-templates/pro_text_section.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("pro_text_section.html.twig",
                [
                    'text' => $atts['text']
                ]
            );
		}
	}
}
