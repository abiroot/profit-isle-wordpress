<?php

if (!class_exists('PROWroteTheBook')) {
	class PROWroteTheBook extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROWroteTheBook', 'profit-isle'),
				'base' => 'pro_wrote_the_book',
				'description' => __('', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
					array(
						'heading' => 'Title',
						'type' => 'textfield',
						'param_name' => 'wrote_the_book_title',
					),
                    array(
                        'heading' => 'Green Sub Title',
                        'type' => 'textfield',
                        'param_name' => 'wrote_the_book_sub_title',
                    ),
                    array(
                        'heading' => 'Content One',
                        'type' => 'textfield',
                        'param_name' => 'wrote_the_book_content_one',
                        ),
                    array(
                        'heading' => 'Author Name',
                        'type' => 'textarea',
                        'param_name' => 'wrote_the_book_author',
                    ),
                    array(
                        'heading' => 'Content Two',
                        'type' => 'textarea',
                        'param_name' => 'wrote_the_book_content_two',
                    ),
                    array(
                        'heading' => 'Content Button',
                        'type' => 'textarea',
                        'param_name' => 'wrote_the_book_content_button',
                    ),
                    [
                        'type' => 'animation_style',
                        'heading' => __('Animation Style', 'text-domain'),
                        'param_name' => 'animation',
                        'description' => __('Choose your animation style', 'text-domain'),
                        'group' => 'Animation',
                        'value' => '',
                    ],
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('pro_wrote_the_book-style', get_template_directory_uri() .
				"/vc-elements/elements/PROWroteTheBook/twig-templates/pro_wrote_the_book.css", array(), '1.0');

			wp_enqueue_script('pro_wrote_the_book-script', get_template_directory_uri() .
				"/vc-elements/elements/PROWroteTheBook/twig-templates/pro_wrote_the_book.js", array('jquery'), '1.0', true);
            $animation_classes = $this->getCSSAnimation($atts['animation']);


			return $this->twigObj->render("pro_wrote_the_book.html.twig", array(
                "wrote_the_book_title"=>$atts['wrote_the_book_title'],
                "wrote_the_book_sub_title"=>$atts['wrote_the_book_sub_title'],
                "wrote_the_book_content_one"=>$atts['wrote_the_book_content_one'],
                "wrote_the_book_author"=>$atts['wrote_the_book_author'],
                "wrote_the_book_content_two"=>$atts['wrote_the_book_content_two'],
                "wrote_the_book_content_button"=>$atts['wrote_the_book_content_button'],
                "animation_classes" => $animation_classes,

            ));
		}
	}
}
