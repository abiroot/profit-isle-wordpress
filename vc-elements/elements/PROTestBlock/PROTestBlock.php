<?php

if (!class_exists('PROTestBlock')) {
	class PROTestBlock extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROTestBlock', 'profit-isle'),
				'base' => 'pro_test_block',
				'description' => __('This is a cool block', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
                    array(
                        'heading' => 'Text',
                        'type' => 'textfield',
                        'param_name' => 'button',
                    ),
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('pro_test_block-style', get_template_directory_uri() .
				"/vc-elements/elements/PROTestBlock/twig-templates/pro_test_block.css", array(), '1.0');

			wp_enqueue_script('pro_test_block-script', get_template_directory_uri() .
				"/vc-elements/elements/PROTestBlock/twig-templates/pro_test_block.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("pro_test_block.html.twig", array(
                "button_text" => $atts['button'] ?? ""
            ));
		}
	}
}
