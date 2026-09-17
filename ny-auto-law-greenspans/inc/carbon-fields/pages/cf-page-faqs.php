<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'faq_page');

function faq_page()
{
    Container::make('post_meta', __('FAQ Page', 'crb'))
        ->where('post_template', '=', 'templates/faqs-page.php')
        ->add_fields(array(
            Field::make('text', 'inr_faq_heading', 'Inner FAQ Heading'),
            Field::make('complex', 'inr_faq_items', 'FAQ Items')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'faq_question', 'Question'),
                    Field::make('rich_text', 'faq_answer', 'Answer'),
                )),
        ));
}