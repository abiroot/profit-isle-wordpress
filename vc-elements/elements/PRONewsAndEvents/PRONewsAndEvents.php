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
                        'type'=> 'param_group',
                        'value'=>'',
                        'heading'=>'News & Events',
                        'param_name' =>'news_events_list',
                        'params'=>array(
                            array(
                                'heading'=>'News&Events Title',
                                'type'=>'textfield',
                                'param_name'=>'title_text',
                                'value' => '',
                            ),
                            array(
                                'heading'=>'News&Events Sub Title',
                                'type'=>'textfield',
                                'param_name'=>'sub_title_text',
                                'value' => '',
                            ),
                            array(
                                'heading'=>'News&Events Content',
                                'type'=>'textarea',
                                'param_name'=>'content_paragraph',
                                'value' => '',
                            ),
                            array(
                                'heading'=>'News&Events Image',
                                'type'=>'attach_image',
                                'param_name'=>'news_events_image',
                                'value' => '',
                            )
                        )
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

            $news_events = vc_param_group_parse_atts($atts['news_events_list']);
            foreach ($news_events as $key => $news_event) {
                $news_events[$key]['news_events_image'] = wp_get_attachment_image_src($news_event['news_events_image'], 'full')[0];
            }

            $news_events = array_slice($news_events, 0, 3);

			return $this->twigObj->render("pro_news_and_events.html.twig", array(
                "news_events_list" => $news_events
            ));
		}
	}
}
