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
						'heading' => 'Title',
						'type' => 'textfield',
						'param_name' => 'title',
					),

                    array(
                        'heading' => 'Sub Title',
                        'type' => 'textfield',
                        'param_name' => 'sub_title',
                    ),

                    array(
                        'heading' => 'Author',
                        'type' => 'textfield',
                        'param_name' => 'author',
                    ),
                    [
                        'heading'=>'Series Title',
                        'value'=>'',
                        'param_name'=>'serie_title',
                        'group'=>'Series',
                        'type'=>'textfield'
                    ],
                    array(
                        'type'=> 'param_group',
                        'value'=>'',
                        'group'=>'Series',
                        'heading'=>'Podcast Series',
                        'param_name' =>'series',
                        'params'=>array(
                            array(
                                'heading'=>'Series Name',
                                'type'=>'textfield',
                                'param_name'=>'serie',
                                'value' => '',
                            ),
                        )
                    ),
                    [
                        'heading'=>'Episode Title',
                        'value'=>'',
                        'param_name'=>'episode_title',
                        'group'=>'Episodes',
                        'type'=>'textfield'
                    ],
                    array(
                        'type'=> 'param_group',
                        'value'=>'',
                        'group'=>'Episodes',
                        'heading'=>'Episodes',
                        'param_name' =>'episodes',
                        'params'=>array(
                            array(
                                'heading'=>'Episode Name',
                                'type'=>'textfield',
                                'param_name'=>'episode',
                                'value' => '',
                            ),
                        )
                    ),
                    [
                        'heading'=>'description',
                        'param_name'=>'description',
                        'type'=>'textarea'
                    ]
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
            $episodes = vc_param_group_parse_atts($atts['episodes']);
            $series = vc_param_group_parse_atts($atts['series']);


			return $this->twigObj->render("pro_podcast_section.html.twig", array(
                'episodes'=>$episodes,
                'series'=>$series,
                'description'=>$atts['description'],
                'episode_title'=>$atts['episode_title'],
                'serie_title'=>$atts['serie_title'],
                'title'=>$atts['title'],
                'sub_title'=>$atts['sub_title'],
                'author'=>$atts['author']
            ));
		}
	}
}
