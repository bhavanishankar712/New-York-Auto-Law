<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'areas_page');

function areas_page()
{
    Container::make('post_meta', __('Areas Page', 'crb'))
        ->where('post_template', '=', 'templates/areas-we-serve-page.php')
        ->add_fields(array(

            Field::make('complex', 'inr_areas', 'Areas')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(

                    Field::make('text', 'areas_title', 'Area Title'),

                    Field::make('complex', 'areas_links', 'Area Links')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(

                            Field::make('text', 'link_title', 'Link Title'),

                            Field::make('text', 'link_url', 'Link URL'),

                            Field::make('complex', 'sub_links', 'Sub Links')
                                ->set_layout('tabbed-horizontal')
                                ->add_fields(array(

                                    Field::make('text', 'sub_link_title', 'Sub Link Title'),

                                    Field::make('text', 'sub_link_url', 'Sub Link URL'),

                                )),

                        )),

                )),

        ));
}