<?php

if (!class_exists('PRONewsLetter')) {
	class PRONewsLetter extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PRONewsLetter', 'profit-isle'),
				'base' => 'pro_news_letter',
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

			wp_enqueue_style('pro_news_letter-style', get_template_directory_uri() .
				"/vc-elements/elements/PRONewsLetter/twig-templates/pro_news_letter.css", array(), '1.0');

			wp_enqueue_script('pro_news_letter-script', get_template_directory_uri() .
				"/vc-elements/elements/PRONewsLetter/twig-templates/pro_news_letter.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("pro_news_letter.html.twig", array());
		}
	}
}
