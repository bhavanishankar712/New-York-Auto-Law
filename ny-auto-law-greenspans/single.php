<?php get_header() ?>

<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>

<section class="page-content sing_blog_pg">
	<div class="container">
		<div class="page-cnt-block">

			<?php get_sidebar('blog'); ?>

			<div class="page-left-blk">
				<div class="sg-post-blk">
					<div class="sg-post-img">
							<?php
							$img_url = has_post_thumbnail()
								? get_the_post_thumbnail_url(get_the_ID(), 'full_blog_img')
								: get_stylesheet_directory_uri() . '/assets/images/sing-post-default-img.webp';
							?>

							<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
								width="1070" height="460">
					</div>
				</div>

				<?php while (have_posts()):
					the_post();
					the_content();
				endwhile; ?>

				<div class="page-navi">
					<div class="page-navi-block page-navi-pre">
						<?php
						$prev = get_previous_post();
						if (!empty($prev)): ?>
							<a href="<?php echo get_permalink($prev->ID); ?>">
								<div class="page-navi-img"><img
										src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/single-blog-pag-arrow.svg"
										alt="Pagination Arrow" width="24" height="24"></div>
								<strong>Prev Post</strong>
							</a>
						<?php endif; ?>
					</div>

					<div class="page-navi-block page-navi-nxt">
						<?php
						$next = get_next_post();
						if (!empty($next)): ?>
							<a href="<?php echo get_permalink($next->ID); ?>">
								<strong>Next Post</strong>
								<div class="page-navi-img"><img
										src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/single-blog-pag-arrow.svg"
										alt="Pagination Arrow" width="24" height="24"></div>
							</a>
						<?php endif; ?>
					</div>

				</div>

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
get_footer();