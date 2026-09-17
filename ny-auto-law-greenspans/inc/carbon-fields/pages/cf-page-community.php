<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;


/**
 * Register Community Gutenberg Block
 */

add_action( 'carbon_fields_register_fields', 'register_community_block' );

function register_community_block() {

    Block::make(__( 'Community Page Block', 'crb' ))

    ->set_category('community', __( 'Community', 'crb' ))

    ->add_fields( array(

        Field::make('text', 'event_title', __( 'Title', 'crb' )),

        Field::make('rich_text', 'event_content', __( 'Content', 'crb' )),

        Field::make('complex', 'event_images', __( 'Event Images', 'crb' ))

        ->set_layout( 'tabbed-horizontal' )

        ->add_fields( array(
            Field::make('image', 'image', __( 'Image', 'crb' ))->set_value_type( 'url' ),
        ) ),

    ) )

    ->set_render_callback(
        function ( $fields ) {
            ?>

            <section class="community-event">

                <?php if ( ! empty( $fields['event_title'] ) ) : ?>
                    <h2><?php echo esc_html( $fields['event_title'] ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $fields['event_content'] ) ) : ?>
                    <div class="community-event-content">
                        <?php echo wp_kses_post( $fields['event_content'] ); ?>
                    </div>
                <?php endif; ?>

                <?php
                $event_images = $fields['event_images'] ?? array();
                $image_count = is_array( $event_images ) ? count( $event_images ) : 0;?>

                <?php if ( $image_count > 0 ) : ?>
                    <div class="cmty-imgs-blk <?php echo $image_count > 1 ? 'owl-carousel' : ''; ?>">
                        <?php foreach ( $event_images as $image ) : ?>
                            <?php if ( ! empty( $image['image'] ) ) : ?>
                                <div class="cmty-img-item">
                                    <img
                                        src="<?php echo esc_url( $image['image'] ); ?>"
                                        alt="<?php echo esc_attr(
                                            $fields['event_title'] ?? ''
                                        ); ?>"
                                        width="1069" height="500"
                                    >
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </section>

            <?php
        }
    );
}


add_filter(
'allowed_block_types_all', 'community_page_allowed_blocks', 10, 2);

function community_page_allowed_blocks( $allowed_blocks, $editor_context ) {

    if ( empty( $editor_context->post ) ) {
        return $allowed_blocks;
    }

    $post_id = $editor_context->post->ID;

    // Only Community Page template
    if ( 'templates/community-page.php' !== get_page_template_slug( $post_id ) ) {
        return $allowed_blocks;
    }

    // Community Page: allow only your Community block
    return array(
        'carbon-fields/community-page-block',
    );
}