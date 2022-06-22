<?php

if (!class_exists('PRONewsAndEvents')) {
	class PRONewsAndEvents extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PRONewsAndEvents', 'profit-isle'),
				'base' => 'pro_news_and_events',
				'description' => __('', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
					array(
                        'type'
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('pro_news_and_events-style', get_template_directory_uri() .
				"/vc-elements/elements/PRONewsAndEvents/twig-templates/pro_news_and_events.css", array(), '1.0');

			wp_enqueue_script('pro_news_and_events-script', get_template_directory_uri() .
				"/vc-elements/elements/PRONewsAndEvents/twig-templates/pro_news_and_events.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("pro_news_and_events.html.twig", array());
		}
	}
}
