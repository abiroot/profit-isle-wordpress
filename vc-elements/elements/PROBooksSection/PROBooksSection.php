<?php

if (!class_exists('PROBooksSection')) {
    class PROBooksSection extends VC_Element_Abstract
    {

        public function create_shortcode()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }

            // Map blockquote with vc_map()
            vc_map(
                [
                    'name' => __('PROBooksSection', 'profit-isle'),
                    'base' => 'pro_books_section',
                    'description' => __('', 'profit-isle'),
                    'category' => __('Profit-isle Elements', 'profit-isle'),
                    'params' => [
                        [
                            'heading' => 'Book Title',
                            'type' => 'textfield',
                            'param_name' => 'first_book_title',
                            'group' => 'First Download',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Book Title',
                            'type' => 'textfield',
                            'param_name' => 'second_book_title',
                            'group' => 'Second Download',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Link',
                            'type' => 'textfield',
                            'param_name' => 'first_book_link',
                            'group' => 'First Download',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Link',
                            'type' => 'textfield',
                            'param_name' => 'second_book_link',
                            'group' => 'Second Download',
                            'value' => '',
                        ],
                        [
                            'heading' => 'Book Image',
                            'type' => 'attach_image',
                            'param_name' => 'first_book_image',
                            'value' => '',
                            'group' => 'First Download',
                        ],
                        [
                            'heading' => 'Book Image',
                            'type' => 'attach_image',
                            'param_name' => 'second_book_image',
                            'value' => '',
                            'group' => 'Second Download',
                        ],
                    ],
                ]
            );
        }

        public function render_shortcode($atts, $content, $tag)
        {
            $this->initializeTwigTemplate();

            wp_enqueue_style('pro_books_section-style', get_template_directory_uri() .
                "/vc-elements/elements/PROBooksSection/twig-templates/pro_books_section.css", array(), '1.0');

            wp_enqueue_script('pro_books_section-script', get_template_directory_uri() .
                "/vc-elements/elements/PROBooksSection/twig-templates/pro_books_section.js", array('jquery'), '1.0', true);

            $firstBookImage = wp_get_attachment_image_src($atts['first_book_image'], 'full')[0];
            $secondBookImage = wp_get_attachment_image_src($atts['second_book_image'], 'full')[0];
            return $this->twigObj->render("pro_books_section.html.twig",
                [
                    'first_book_title' => $atts['first_book_title'],
                    'second_book_title' => $atts['second_book_title'],
                    'first_book_link' => $atts['first_book_link'],
                    'second_book_link' => $atts['second_book_link'],
                    'first_book_image' => $firstBookImage,
                    'second_book_image' => $secondBookImage,
                ]
            );
        }
    }
}
