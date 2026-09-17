

<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'register_community_block');

function register_community_block() {

    Block::make(__( 'Community Page Block', 'crb' ))

    ->where('post_template', '=', 'templates/community-page.php')

    ->set_category('community', __( 'Community', 'crb' ))

    ->add_fields( array(

        Field::make('text', 'event_title', __( 'Title', 'crb' )),

        Field::make('rich_text', 'event_content', __( 'Content', 'crb' )),

        Field::make('complex', 'event_images', __( 'Event Images', 'crb' ))

        ->set_layout('tabbed-horizontal')

        ->add_fields( array(

            Field::make('image', 'image', __( 'Image', 'crb' ))->set_value_type( 'url' ),

        ) )


    ) )

    ->set_render_callback(
        function ( $fields ) {
            ?>

            <section class="community-event">

                <?php if ( ! empty( $fields['event_title'] ) ) : ?>
                    <h2><?php echo esc_html($fields['event_title']); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $fields['event_content'] ) ) : ?>
                        <?php echo wp_kses_post(
                            $fields['event_content']
                        ); ?>
                <?php endif; ?>

                <?php
                $event_images = $fields['event_images'] ?? array();
                $image_count  = is_array( $event_images ) ? count( $event_images ) : 0;
                ?>

                <?php if ( $image_count > 0 ) : ?>
                    <div class="cmty-imgs-blk <?php echo $image_count > 1 ? 'owl-carousel' : ''; ?>">
                        <?php foreach ( $event_images as $image ) : ?>
                            <?php if ( ! empty( $image['image'] ) ) : ?>
                                <div class="cmty-img-item">
                                    <img
                                        src="<?php echo esc_url( $image['image'] ); ?>"
                                        alt="<?php echo esc_attr( $fields['event_title'] ?? '' ); ?>"
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