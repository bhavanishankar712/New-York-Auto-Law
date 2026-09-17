<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');

function crb_attach_post_options()
{

    Container::make('post_meta', __('Home Page Sections', 'crbh'))
        ->where('post_template', '=', 'templates/page-front.php')

        ->add_fields(array(

            Field::make('complex', 'crbh_sections', 'Sections')
                ->set_collapsed(true)

                ->add_fields('home-banner', 'Home Banner Section', array(
                    Field::make('text', 'bnr_heading', 'Banner Heading'),
                    Field::make('rich_text', 'bnr_content', 'Banner Content'),
                    Field::make('text', 'bnr_button', 'Button Text'),
                    Field::make('text', 'bnr_buttton_link', 'Button Link'),
                    Field::make('image', 'bnr_image', 'Banner Image')
                        ->set_value_type('url'),
                ))

                ->add_fields('case-results', 'Home Case Section', array(

                    Field::make('complex', 'case_items', 'Case Statistics')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(
                            Field::make('text', 'case_value', 'Counter Value'),
                            Field::make('text', 'case_suffix', 'Suffix'),
                            Field::make('text', 'case_title', 'Title'),
                        )),

                ))

                ->add_fields('home-insurance', 'Home Insurance Section', array(

                    Field::make('text', 'insurance_top_heading', 'Top Heading'),
                    Field::make('text', 'insurance_heading', 'Main Heading'),
                    Field::make('rich_text', 'insurance_content', 'Content'),
                    Field::make('text', 'insurance_bottom_content', 'Bottom Content'),

                ))


                ->add_fields('home-guide-sec', 'The Guide Section', array(

                    Field::make('image', 'guide_bg_img', 'Award Image')
                        ->set_value_type('url'),
                    Field::make('text', 'guide_top_heading', 'Top Heading'),
                    Field::make('text', 'guide_heading', 'Main Heading'),
                    Field::make('rich_text', 'guide_content', 'Content'),

                    Field::make('complex', 'guide_awards', 'Awards')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(
                            Field::make('image', 'award_image', 'Award Image')
                                ->set_value_type('url'),
                            Field::make('text', 'award_class', 'CSS Class'),
                        )),

                ))


                ->add_fields('home-plan-sec', 'The Plan Section', array(

                    Field::make('text', 'plan_top_heading', 'Top Heading'),
                    Field::make('text', 'plan_heading', 'Main Heading'),
                    Field::make('rich_text', 'plan_content', 'Section Content'),

                    Field::make('complex', 'plan_steps', 'Plan Steps')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(

                            Field::make('text', 'step_number', 'Step Number'),
                            Field::make('text', 'step_title', 'Step Title'),
                            Field::make('rich_text', 'step_content', 'Step Content'),

                        )),

                ))

                ->add_fields('what-we-handle', 'What We Handle Section', array(

                    Field::make('text', 'wwh_top_heading', 'Top Heading'),
                    Field::make('text', 'wwh_left_heading', 'Left Heading'),
                    Field::make('rich_text', 'wwh_left_content', 'Left Content'),
                    Field::make('complex', 'wwh_tabs', 'Practice Area Tabs')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(
                            Field::make('text', 'tab_title', 'Tab Title'),
                            Field::make('rich_text', 'tab_content', 'Tab Content'),
                            Field::make('rich_text', 'tab_bottom_content', 'Bottom Content'),

                        )),

                ))


                ->add_fields('meet-the-team', 'Meet The Team Section', array(

                    Field::make('text', 'meet_team_top_heading', 'Top Heading'),
                    Field::make('text', 'meet_team_heading', 'Main Heading'),
                    Field::make('rich_text', 'meet_team_content', 'Content'),
                    Field::make('image', 'meet_team_image', 'Desktop Background Image')
                        ->set_value_type('url'),
                    Field::make('image', 'meet_team_bg_mobile', 'Mobile Background Image')
                        ->set_value_type('url'),


                ))


                ->add_fields('home-team-sec', 'The Team Section', array(

                    Field::make('text', 'team_top_heading', 'Top Heading'),
                    Field::make('text', 'team_heading', 'Main Heading'),
                    Field::make('rich_text', 'team_content', 'Team Content'),

                    Field::make('complex', 'team_members', 'Team Members')
                        ->set_layout('tabbed-horizontal')
                        ->add_fields(array(
                            Field::make('text', 'member_name', 'Name'),
                            Field::make('text', 'member_title', 'Title'),
                            Field::make('text', 'member_description', 'Description'),
                            Field::make('image', 'member_image', 'Image')
                                ->set_value_type('url'),
                            Field::make('text', 'member_link', 'Profile Link'),
                        )),

                ))

                ->add_fields('testimonials-section', 'Testimonials Section', array(

                    Field::make('text', 'testimonials_top_heading', 'Testimonials Top Heading'),
                    Field::make('text', 'testimonials_heading', 'Testimonials Main Heading'),
                ))

                ->add_fields('not-wait', 'Do Not Wait Section', array(

                    Field::make('text', 'not_wait_top_heading', 'Top Heading'),
                    Field::make('text', 'not_wait_heading', 'Main Heading'),
                    Field::make('rich_text', 'not_wait_content', 'Content'),
                    Field::make('text', 'not_wait_button', 'Button Text'),
                    Field::make('text', 'not_wait_button_link', 'Button Link'),
                    Field::make('image', 'not_wait_desktop_image', 'Desktop Image')
                        ->set_value_type('url'),
                    Field::make('image', 'not_wait_mobile_image', 'Mobile Image')
                        ->set_value_type('url'),

                ))


        ));
}
