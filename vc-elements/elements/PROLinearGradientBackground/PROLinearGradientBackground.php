<?php

if (!class_exists('PROLinearGradientBackground')) {
	class PROLinearGradientBackground extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROLinearGradientBackground', 'profit-isle'),
				'base' => 'pro_linear_gradient_background',
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

			wp_enqueue_style('pro_linear_gradient_background-style', get_template_directory_uri() .
				"/vc-elements/elements/PROLinearGradientBackground/twig-templates/pro_linear_gradient_background.css", array(), '1.0');

			wp_enqueue_script('pro_linear_gradient_background-script', get_template_directory_uri() .
				"/vc-elements/elements/PROLinearGradientBackground/twig-templates/pro_linear_gradient_background.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("pro_linear_gradient_background.html.twig", array());
		}
	}
}
