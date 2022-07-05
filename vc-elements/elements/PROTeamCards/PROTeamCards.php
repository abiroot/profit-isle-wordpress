<?php

if (!class_exists('PROTeamCards')) {
    class PROTeamCards extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(array(
                'name' => __('PROTeamCards', 'profit-isle'),
                'base' => 'pro_team_cards',
                'description' => __('', 'profit-isle'),
                'category' => __('Profit-isle Elements', 'profit-isle'),
                'params' => array(
                    array(
                        'heading' => 'Main Card Title',
                        'type' => 'textfield',
                        'param_name' => 'main_card_title',
                    ), [
                        'heading' => 'Blue text CheckBox',
                        'type' => 'checkbox',
                        'param_name' => 'blue_text_checkbox'
                    ],
                    array(
                        'group' => 'Card Content',
                        'heading' => 'Team Cards',
                        'type' => 'param_group',
                        'param_name' => 'team_cards',
                        'params' => array(
                            array(
                                'heading' => 'Card Title',
                                'type' => 'textfield',
                                'param_name' => 'card_title'
                            ),
                            array(
                                'heading' => 'Card Sub Title',
                                'type' => 'textfield',
                                'param_name' => 'card_sub_title'
                            ),
                            array(
                                'heading' => 'Card Content',
                                'type' => 'textarea',
                                'param_name' => 'card_content'
                            ),
                            array(
                                'heading' => 'Card Image',
                                'type' => 'attach_image',
                                'param_name' => 'card_image'
                            ),
                            array(
                                'heading' => 'Green Card',
                                'type' => 'checkbox',
                                'param_name' => 'green_card_checkbox'
                            )

                        )
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

            wp_enqueue_style('pro_team_cards-style', get_template_directory_uri() .
                "/vc-elements/elements/PROTeamCards/twig-templates/pro_team_cards.css", array(), '1.0');

            wp_enqueue_script('pro_team_cards-script', get_template_directory_uri() .
                "/vc-elements/elements/PROTeamCards/twig-templates/pro_team_cards.js", array('jquery'), '1.0', true);

            $cards = vc_param_group_parse_atts($atts['team_cards']);
            foreach ($cards as $key => $card) {
                $cards[$key]['card_image'] = wp_get_attachment_image_src($card['card_image'], 'full')[0];
            }

//            $cards = array_slice($cards, 0, 3);
            $animation_classes = $this->getCSSAnimation($atts['animation']);


            return $this->twigObj->render("pro_team_cards.html.twig", array(
                "cards" => $cards,
                "main_card_title" => $atts['main_card_title'],
                "blue_text_checkbox" => $atts['blue_text_checkbox'],
                "animation" => $animation_classes,

            ));
        }
    }
}
