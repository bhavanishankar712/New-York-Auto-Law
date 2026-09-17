<?php get_header(); ?>

<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>

<section class="page-content blog_pg">
	<div class="container">
		<div class="page-cnt-block">

			<?php get_sidebar('blog'); ?>

			<div class="page-left-blk">

				<div id="post-block-wrapper">
					<div id="articles-wrapper" class="articles-list">
						<?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
						<?php if (have_posts()):
							while (have_posts()):
								the_post(); ?>
								<?php get_template_part('templates/template-parts/blog/blog', 'content'); ?>
							<?php endwhile; ?>

							<?php get_template_part('templates/template-parts/blog/blog', 'pagination'); ?>
						<?php else: ?>
							<h2>Page not Found</h2>
							<p>We're sorry, but the page you're looking for isn't here.</p>
							<p>Try searching for the page you are looking for or using the navigation in the header or
								sidebar</p>
						<?php endif; ?>
					</div>
				</div>

			</div>

		</div>
</section>

<?php get_footer() ?>

<script>
	var body = document.querySelector('body');
	var show_categories = document.querySelector('.blog-topics');

	body.addEventListener("click", function () {
		show_categories.classList.remove('active');
	}, false);
	show_categories.addEventListener("click", function (ev) {
		show_categories.classList.add('active');
		ev.stopPropagation(); //this is important! If removed, both click events will occur
	}, false);
</script>