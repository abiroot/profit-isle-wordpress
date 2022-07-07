<?php

if (!class_exists('PROPodcastSection')) {
	class PROPodcastSection extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROPodcastSection', 'profit-isle'),
				'base' => 'pro_podcast_section',
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

			wp_enqueue_style('pro_podcast_section-style', get_template_directory_uri() .
				"/vc-elements/elements/PROPodcastSection/twig-templates/pro_podcast_section.css", array(), '1.0');

			wp_enqueue_script('pro_podcast_section-script', get_template_directory_uri() .
				"/vc-elements/elements/PROPodcastSection/twig-templates/pro_podcast_section.js", array('jquery'), '1.0', true);


			return $this->twigObj->render("pro_podcast_section.html.twig", array());
		}
	}
}
