<?php

if (!class_exists('PROPodcastSignUp')) {
	class PROPodcastSignUp extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROPodcastSignUp', 'profit-isle'),
				'base' => 'pro_podcast_sign_up',
				'description' => __('', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
					array(
						'heading' => 'Podcast Title',
						'type' => 'textarea',
						'param_name' => 'podcast_title',
                        'value' => '',
					),
                    array(
                        'heading'=>'Podcast Button Content',
                        'type'=>'textfield',
                        'param_name'=>'podcast_button',
                        'value' => ''
                    )
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('pro_podcast_sign_up-style', get_template_directory_uri() .
				"/vc-elements/elements/PROPodcastSignUp/twig-templates/pro_podcast_sign_up.css", array(), '1.0');

			wp_enqueue_script('pro_podcast_sign_up-script', get_template_directory_uri() .
				"/vc-elements/elements/PROPodcastSignUp/twig-templates/pro_podcast_sign_up.js", array('jquery'), '1.0', true);

			return $this->twigObj->render("pro_podcast_sign_up.html.twig", array(
                "podcast_title"=>$atts['podcast_title'],
                "podcast_button"=>$atts['podcast_button']
            ));
		}
	}
}
