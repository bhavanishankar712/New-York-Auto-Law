<?php /* Template Name: Community Page */


get_header() ?>


<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>


<section class="page-content community-page">
    <div class="container">
        <div class="page-cnt-block">

            <?php get_sidebar(); ?>

            <div class="page-left-blk">
                
                <?php
                while ( have_posts() ) :
                    the_post();

                    the_content();

                endwhile;
                ?>

            </div>
        </div>
    </div>
</section>


<?php
get_footer(); ?>

<script>

jQuery(document).ready(function ($) {
  jQuery(".cmty-imgs-blk.owl-carousel").owlCarousel({
    loop: true,
    touchDrag: true,
    mouseDrag: true,
    autoplayTimeout: 3e3,
    autoplayHoverPause: true,
    nav: true,
    dots: false,
    items: 1,
    margin: 30,
    autoplay: false,
  });
});

</script>
