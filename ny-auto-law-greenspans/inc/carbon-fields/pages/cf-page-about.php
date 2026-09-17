<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'about_page');

function about_page()
{
    Container::make('post_meta', __('About Page', 'crb'))
        ->where('post_template', '=', 'templates/about-us-page.php')
        ->add_fields(array(

            Field::make('text', 'in_about_heading', 'Inner About Heading'),

            Field::make('rich_text', 'in_about_description', 'Inner About Description'),

            Field::make('complex', 'the_team_members', 'Team Members')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(

                    Field::make('image', 'attorney_image', 'Attorney Image')
                        ->set_value_type('id'),

                    Field::make('text', 'attorney_name', 'Attorney Name'),

                    Field::make('text', 'attorney_designation', 'Attorney Designation'),

                    Field::make('text', 'attorney_description', 'Attorney Description'),

                    Field::make('text', 'attorney_popup_button', 'Attorney Popup Text'),

                    Field::make('rich_text', 'attorney_popup_content', 'Attorney Popup Content'),


                    Field::make('media_gallery', 'attorney_awards', 'Awards')
                        ->set_type(array('image'))
                        ->set_duplicates_allowed(false),




                    Field::make('complex', 'attorney_practice_areas', 'Areas of Practice')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(
                            Field::make('text', 'practice_name', 'Practice Areas Name'),

                            Field::make('text', 'practice_url', 'Practice Areas URL'),
                        )),

                )),

        ));
}