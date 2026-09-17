<?php

/***
*** Enqueue theme assets ***
***/

function theme_name_enqueue_scripts()
{
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/styles_scripts/src/css/owl.carousel.min.css', [], '2.3.4');
  wp_enqueue_style('newyorklaw', get_template_directory_uri() . '/styles_scripts/dist/_site.css');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/styles_scripts/src/js/jquery.min.js');
  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/styles_scripts/src/js/owl.carousel.min.js', array('jquery'), '2.3.4');
  wp_enqueue_script('newyorklaw', get_template_directory_uri() . '/styles_scripts/src/js/scripts.js');
  wp_localize_script('newyorklaw', 'newyorklaw', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('nonce_name')
  ));
}
add_action('wp_enqueue_scripts', 'theme_name_enqueue_scripts');

/***
*** Enqueue Custom Admin JS/CSS ***
***/

function admin_scripts() {
  wp_enqueue_script('admin-scripts', get_template_directory_uri().'/inc/admin-settings/admin.js', array(), null);
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/inc/admin-settings/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_scripts');