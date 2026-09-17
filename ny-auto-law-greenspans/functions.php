<?php
require_once(TEMPLATEPATH . '/inc/menus.php');
require_once(TEMPLATEPATH . '/inc/overrides.php');
require_once(TEMPLATEPATH . '/inc/styles_scripts.php');
require_once(TEMPLATEPATH . '/inc/blocks.php');
require_once(TEMPLATEPATH . '/inc/carbon-fields.php');
require_once(TEMPLATEPATH . '/inc/shortcodes.php');
require_once(TEMPLATEPATH . '/inc/comments.php');
require_once(TEMPLATEPATH . '/inc/login.php');

function remove_cssjs_ver($src)
{
    if (strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

add_action('init', 'reviews_init');
function reviews_init()
{
    $labels = array(
        'name' => 'Reviews',
        'singular_name' => 'Review',
        'add_new' => 'Add New',
        'mythings',
        'add_new_item' => 'Add New Review',
        'edit_item' => 'Edit Review',
        'new_item' => 'New Review',
        'view_item' => 'View Review',
        'search_items' => 'Search Review',
        'not_found' => 'No Reviews found',
        'not_found_in_trash' => 'No Reviews found in Trash',
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'has_archive' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'review'),
        'menu_position' => null,
        'show_in_rest' => true,
        'rest_base' => 'review',
        'supports' => array(
            'title',
            'editor',
            //'thumbnail'
        ),
    );
    register_post_type('review', $args);
    flush_rewrite_rules();
}


/*
 * Gravity form email validation text change
 */
add_filter('gform_field_validation', function ($result, $value, $form, $field) {

    if ($field->type == 'email' && !$result['is_valid']) {
        $result['message'] = 'Please enter a valid email address.';
    }

    return $result;

}, 10, 4);



function inner_cta_box($atts)
{

    $atts = shortcode_atts(array(
        'content' => 'Building a business takes courage, long hours, and real risk. Having steady guidance can help you make smart decisions, protect what you’ve built, and move forward with confidence and peace of mind.',
        'button_text' => 'Get Help Here',
        'button_link' => '/contact-us/',
    ), $atts);

    ob_start(); ?>

    <div class="in-cmn-blk">
        <div class="in-cmn-cnt">
            <?php echo wp_kses_post($atts['content']); ?>
        </div>
        <div class="in-cmn-blk-btn">
            <a href="<?php echo esc_url($atts['button_link']); ?>"
                class="cmn-btn"><?php echo esc_html($atts['button_text']); ?></a>
        </div>
    </div>


    <?php
    return ob_get_clean();
}

add_shortcode('inner_cta_box', 'inner_cta_box');





/**
 * Use Gutenberg only for the "In the Community" page.
 * Keep Classic Editor for all other pages.
 */
add_filter( 'use_block_editor_for_post', function( $use_block_editor, $post ) {

    if ( ! $post ) {
        return $use_block_editor;
    }

    // Enable Gutenberg only for this page.
    if (
        $post->post_type === 'page' &&
        $post->post_name === 'in-the-community'
    ) {
        return true;
    }

    // Keep Classic Editor for everything else.
    return false;

}, 10, 2 );



