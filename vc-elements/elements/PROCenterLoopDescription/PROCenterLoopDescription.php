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
						'heading' => 'Text',
						'type' => 'textfield',
						'param_name' => 'button',
                        'value'=>''
					)
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


			return $this->twigObj->render("pro_center_loop_description.html.twig", array());
		}
	}
}
