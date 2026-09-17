<?php // Default Template 


get_header() ?>


<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>

<section class="page-content">
    <div class="container">
        <div class="page-cnt-block">

            <?php get_sidebar(); ?>

            <div class="page-left-blk">

                <?php if (has_post_thumbnail()): ?>
                    <div class="single-page-thumbnail">
                        <?php the_post_thumbnail('full_blog_img'); ?>
                    </div>
                <?php endif; ?>

                <?php while (have_posts()):
                    the_post();
                    the_content();
                endwhile; ?>


                <?php
				$author_image = carbon_get_theme_option('author_image');
				$author_name = carbon_get_theme_option('author_name');
				$author_description = carbon_get_theme_option('author_description');
				?>

				<div class="sg-author-blk">

					<?php if ($author_image): ?>
						<div class="sg-author-img">
							<?php
							echo wp_get_attachment_image(
								$author_image,
								'full'
							);
							?>
						</div>
					<?php endif; ?>


					<div class="sg-suthor-cont">

						<?php if ($author_name): ?>
							<div class="author-hdg">
								<?php echo esc_html($author_name); ?>
							</div>
						<?php endif; ?>


						<?php if ($author_description): ?>
							<?php echo apply_filters('the_content', $author_description); ?>
						<?php endif; ?>

					</div>

				</div>

                

            </div>

        </div>
    </div>
</section>

<?php
get_sidebar();
get_footer();