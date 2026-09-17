<?php /* Template Name: Faqs Page */


get_header() ?>


<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>

<?php

$faq_heading = carbon_get_the_post_meta('inr_faq_heading');
$faq_items = carbon_get_the_post_meta('inr_faq_items');

?>

<section class="page-content">
    <div class="container">
        <div class="page-cnt-block">
            <div class="page-left-blk full-width">

                <div class="in-faqs-blk">

                    <?php if ($faq_heading): ?>
                        <div class="in-faqs-hdg"><?php echo esc_html($faq_heading); ?></div>
                    <?php endif; ?>

                    <?php if ($faq_items): ?>

                        <div class="accordion">

                            <?php foreach ($faq_items as $index => $faq): ?>

                                <div class="accordion-section <?php echo ($index === 0) ? 'accordien-active' : ''; ?>">

                                    <?php if (!empty($faq['faq_question'])): ?>
                                        <div class="accordion-heading">
                                            <?php echo esc_html($faq['faq_question']); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($faq['faq_answer'])): ?>
                                        <div class="accordion-section-content">
                                            <?php echo apply_filters('the_content', $faq['faq_answer']); ?>
                                        </div>
                                    <?php endif; ?>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>


<?php
get_footer(); ?>

<script>


    jQuery('.accordion-heading').on('click', function () {
        let parent = jQuery(this).parent();
        parent.children('.accordion-section-content').slideToggle(300);
        parent.siblings('.accordion-section').children('.accordion-section-content').slideUp(300);
        parent.toggleClass('accordien-active');
        parent.siblings('.accordion-section').removeClass('accordien-active');
    });


</script>