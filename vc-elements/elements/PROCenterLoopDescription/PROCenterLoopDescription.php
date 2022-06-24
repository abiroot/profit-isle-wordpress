<?php

if (!class_exists('PROCenterLoopDescription')) {
	class PROCenterLoopDescription extends VC_Element_Abstract
	{

		public function create_shortcode()
		{
			// Stop all if VC is not enabled
			if (!defined('WPB_VC_VERSION')) {
				return;
			}

			// Map blockquote with vc_map()
			vc_map(array(
				'name' => __('PROCenterLoopDescription', 'profit-isle'),
				'base' => 'pro_center_loop_description',
				'description' => __('', 'profit-isle'),
				'category' => __('Profit-isle Elements', 'profit-isle'),
				'params' => array(
					array(
                        'heading'=>'Loop Content',
                        'type'=>'textarea_html',
                        'param_name'=>'content',
                        'value'=>''
                    ),
                    array(
                        'heading'=>'Title',
                        'type'=>'textarea',
                        'param_name'=>'center_loop_title',
                        'value'=>''
                    ),
                    array(
                        'heading'=>'Sub Title Content',
                        'type'=>'textfield',
                        'param_name'=>'center_loop_content',
                        'value'=>''
                    ),
                    array(
                        'heading'=>'Button Content',
                        'type'=>'textarea',
                        'param_name'=>'center_loop_button',
                        'value'=>''
                    ),
                    [
                        'type' => 'animation_style',
                        'heading' => __('Animation Style', 'text-domain'),
                        'param_name' => 'animation_loop',
                        'description' => __('Choose your animation style', 'text-domain'),
                        'group' => 'Animation Loop',
                        'value' => '',
                    ],
                    [
                        'type' => 'animation_style',
                        'heading' => __('Animation Style', 'text-domain'),
                        'param_name' => 'animation_content',
                        'description' => __('Choose your animation style', 'text-domain'),
                        'group' => 'Animation Content',
                        'value' => '',
                    ],
				),
			));
		}
		public function render_shortcode($atts, $content, $tag)
		{
			$this->initializeTwigTemplate();

			wp_enqueue_style('pro_center_loop_description-style', get_template_directory_uri() .
				"/vc-elements/elements/PROCenterLoopDescription/twig-templates/pro_center_loop_description.css", array(), '1.0');

			wp_enqueue_script('pro_center_loop_description-script', get_template_directory_uri() .
				"/vc-elements/elements/PROCenterLoopDescription/twig-templates/pro_center_loop_description.js", array('jquery'), '1.0', true);

            $animation_loop = $this->getCSSAnimation($atts['animation_loop']);
            $animation_content = $this->getCSSAnimation($atts['animation_content']);



            return $this->twigObj->render("pro_center_loop_description.html.twig", array(
                "loop_content"=>$content,
                "center_loop_title"=>$atts['center_loop_title'],
                "center_loop_content"=>$atts['center_loop_content'],
                "center_loop_button"=>$atts['center_loop_button'],
                "animation_loop"=>$animation_loop,
                "animation_content"=>$animation_content
            ));
		}
	}
}
