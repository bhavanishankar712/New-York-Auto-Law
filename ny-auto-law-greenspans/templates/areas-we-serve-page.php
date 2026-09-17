<?php /* Template Name: Areas We Serve Page */


get_header() ?>

<?php get_template_part('templates/template-parts/heros/default', 'hero'); ?>

<section class="page-content areas-we-serve">
    <div class="container">
        <div class="page-cnt-block">

            <?php get_sidebar(); ?>

            <div class="page-left-blk">
                <?php

                $areas = carbon_get_the_post_meta('inr_areas');

                ?>

                <?php if ($areas): ?>

                    <div class="in-areas-list">

                        <?php foreach ($areas as $area): ?>

                            <div class="areas-item">

                                <?php if (!empty($area['areas_title'])): ?>
                                    <div class="areas-title"><?php echo esc_html($area['areas_title']); ?></div>
                                <?php endif; ?>

                                <?php if (!empty($area['areas_links'])): ?>
                                    <ul>
                                        <?php foreach ($area['areas_links'] as $link): ?>
                                            <li>
                                                <?php if (!empty($link['link_url'])): ?>
                                                    <a href="<?php echo esc_url($link['link_url']); ?>">
                                                        <?php echo esc_html($link['link_title']); ?>
                                                        <?php if (!empty($link['sub_links'])): ?>
                                                            <ul>
                                                                <?php foreach ($link['sub_links'] as $sub_link): ?>
                                                                    <li>
                                                                        <?php if (!empty($sub_link['sub_link_url'])): ?>
                                                                            <a href="<?php echo esc_url($sub_link['sub_link_url']); ?>"><?php echo esc_html($sub_link['sub_link_title']); ?></a>
                                                                        <?php else: ?>
                                                                            <?php echo esc_html($sub_link['sub_link_title']); ?>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </a>

                                                <?php else: ?>
                                                    <?php echo esc_html($link['link_title']); ?>
                                                <?php endif; ?>

                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<?php
get_sidebar();
get_footer();
