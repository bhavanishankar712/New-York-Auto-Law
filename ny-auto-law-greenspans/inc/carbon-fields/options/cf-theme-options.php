<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/***
 *** Theme Options Page ***
 *** Usage: https://carbonfields.net/docs/fields-usage-2/ ***
 ***/

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');


function crb_attach_theme_options()
{

    // Gravity Forms list collect cheyyadam

    $gravity_forms = array('' => '— Select Gravity Form —');

    if (class_exists('GFAPI')) {
        $forms = GFAPI::get_forms();

        foreach ($forms as $form) {
            $gravity_forms[$form['id']] = $form['title'];
        }
    }

    $menus = array('' => '— Select Menu —');

    $nav_menus = wp_get_nav_menus();

    if (!empty($nav_menus)) {
        foreach ($nav_menus as $menu) {
            $menus[$menu->term_id] = $menu->name;
        }
    }


    Container::make('theme_options', __('Theme Options', 'crb'))

        ->add_tab(__('Site Header'), array(

            Field::make('complex', 'header_top_left', 'Top Header left')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'text', 'Text'),
                )),

            Field::make('complex', 'header_top_right', 'Top Header Right')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'text', 'Text'),
                )),

            Field::make('image', 'header_logo', 'Header Logo')->set_value_type('url'),
            Field::make('select', 'primary_menu', 'Primary Menu')
                ->set_options($menus),
            Field::make('text', 'header_phone_number', 'Phone Number'),

        ))

        ->add_tab(__('Footer Section'), array(

            Field::make('image', 'footer_logo', 'Footer Logo')
                ->set_value_type('url'),

            Field::make('text', 'ftr_menu_hdg', 'Footer Menu Heading'),

            Field::make('text', 'ftr_contact_hdg', 'Footer Contact Heading'),

            Field::make('image', 'ftr_cont_address_icon', 'Address Icon')
                ->set_value_type('url'),
            Field::make('text', 'ftr_cont_address_text', 'Address Text'),
            Field::make('text', 'ftr_cont_address_link', 'Address Link'),

            Field::make('image', 'ftr_cont_call_icon', 'Call Icon')
                ->set_value_type('url'),
            Field::make('text', 'ftr_cont_call_text', 'Call Text'),
            Field::make('text', 'ftr_cont_call_consu_txt', 'Call Consultation Text'),

            Field::make('image', 'ftr_cont_serv_img', 'Service Icon')
                ->set_value_type('url'),
            Field::make('text', 'ftr_cont_serv_text', 'Service Text'),
            Field::make('text', 'ftr_cont_serv_subtxt', 'Service Sub Text'),

            Field::make('text', 'ftr_social_hdg', 'Social Heading'),
            Field::make('complex', 'footer_social_icons', 'Footer Social Icons')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('image', 'social_icon', 'Social Icon')
                        ->set_value_type('url'),
                    Field::make('text', 'social_icon_alt', 'Social Icon Alt'),
                    Field::make('text', 'social_link', 'Social Link'),
                )),

            // No Fee
            Field::make('rich_text', 'ftr_no_fee_text', 'No Fee Text'),
            // Disclaimer
            Field::make('rich_text', 'ftr_disclaimer_text', 'Footer Disclaimer'),
        ))


        ->add_tab(__('Sidebars'), array(
            Field::make('text', 'sb_practice_title', 'Sidebar Practice Title'),
            Field::make('text', 'sb_form_title', 'Sidebar Form Title'),
            Field::make('text', 'sb_form_sub_title', 'Sidebar Form Sub Title'),
            Field::make('gravity_form', 'sb_gravity_form', 'Select a Form'),
            Field::make('text', 'sdb_cont_title', 'Sidebar Contact Title'),
            Field::make('text', 'sdb_cont_content', 'Sidebar Contact Content'),
            Field::make('text', 'sb_cont_phn_num', 'Sidebar Phone Number'),
            Field::make('image', 'sb_cont_call_icon', 'Sidebar Phone Icon')
                ->set_value_type('url'),
            Field::make('text', 'sdb_posts_title', 'Blog Sidebar Title'),
        ))

        ->add_tab(__('Blog Author Block'), array(
            Field::make('image', 'author_image', 'Author Image')
                ->set_value_type('id'),
            Field::make('text', 'author_name', 'Author Name'),
            Field::make('rich_text', 'author_description', 'Author Description'),
        ));
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once(__DIR__ . '../../../../vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}
