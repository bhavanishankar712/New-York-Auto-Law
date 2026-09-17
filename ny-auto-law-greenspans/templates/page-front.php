<?php
/*
Template Name: Front Page
*/
get_header(); ?>


<?php
while (have_posts()):
    the_post();

    $homesections = carbon_get_the_post_meta('crbh_sections');

    if ($homesections):
        foreach ($homesections as $hs):


            if ($hs['_type'] == 'home-banner'): ?>

                <section id="banner-sec">

                    <div class="container">

                        <?php if (!empty($hs['bnr_heading'])): ?>
                            <h1 class="banner-title"><?php echo wp_kses_post($hs['bnr_heading']); ?></h1>
                        <?php endif; ?>

                        <div class="banner-btm">

                            <?php if (!empty($hs['bnr_content'])): ?>
                                <div class="banner-content">
                                    <?php echo apply_filters('the_content', $hs['bnr_content']); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($hs['bnr_button']) && !empty($hs['bnr_buttton_link'])): ?>
                                <div class="banner-btn">
                                    <a class="cmn-btn" href="<?php echo esc_url($hs['bnr_buttton_link']); ?>">
                                        <?php echo esc_html($hs['bnr_button']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>

                        <?php if (!empty($hs['bnr_image'])): ?>
                            <div class="banner-img">
                                <img src="<?php echo esc_url($hs['bnr_image']); ?>" width="1920" height="863"
                                    alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </div>
                        <?php endif; ?>

                    </div>

                </section>
            <?php endif;


            if ($hs['_type'] == 'case-results'): ?>
                <section class="hmcase-sec">

                    <div class="container">

                        <?php if (!empty($hs['case_items'])): ?>

                            <div class="case-list">

                                <?php foreach ($hs['case_items'] as $item): ?>

                                    <div class="case-item">

                                        <div class="case-title">

                                            <?php if (isset($item['case_value']) && $item['case_value'] !== ''): ?>

                                                <span class="case-prefix">$</span>

                                                <span class="counter notranslate" data-value="<?php echo esc_attr($item['case_value']); ?>"
                                                    data-suffix="<?php echo esc_attr($item['case_suffix']); ?>">0</span>

                                            <?php endif; ?>

                                        </div>

                                        <?php if (!empty($item['case_title'])): ?>
                                            <p><?php echo esc_html($item['case_title']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                </section>
            <?php endif;


            if ($hs['_type'] == 'home-insurance'): ?>

                <section id="hm-insurance-sec">

                    <?php if (!empty($hs['insurance_top_heading'])): ?>
                        <div class="top-hdg"><?php echo esc_html($hs['insurance_top_heading']); ?></div>
                    <?php endif; ?>

                    <div class="container">

                        <div class="insurance-blk">

                            <div class="insurance-blk-lft">
                                <?php if (!empty($hs['insurance_heading'])): ?>
                                    <div class="text-heading">
                                        <?php echo wp_kses_post($hs['insurance_heading']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="insurance-blk-rht text-para">

                                <?php if (!empty($hs['insurance_content'])): ?>
                                    <?php echo apply_filters('the_content', $hs['insurance_content']); ?>
                                <?php endif; ?>


                                <?php if (!empty($hs['insurance_bottom_content'])): ?>
                                    <div class="insrnce-rht-btm-cnt">
                                        <?php echo wp_kses_post($hs['insurance_bottom_content']); ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </section>
            <?php endif;


            if ($hs['_type'] == 'home-guide-sec'): ?>

                <section id="hm-guide-sec" <?php if (!empty($hs['guide_bg_img'])): ?>
                    style="background-image: url('<?php echo esc_url($hs['guide_bg_img']); ?>');" <?php endif; ?>>

                    <?php if (!empty($hs['guide_top_heading'])): ?>
                        <div class="top-hdg"><?php echo esc_html($hs['guide_top_heading']); ?></div>
                    <?php endif; ?>

                    <div class="container">


                        <div class="guide-blk">

                            <?php if (!empty($hs['guide_heading'])): ?>
                                <div class="text-heading"><?php echo wp_kses_post($hs['guide_heading']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($hs['guide_content'])): ?>
                                <div class="text-para">
                                    <?php echo apply_filters('the_content', $hs['guide_content']); ?>
                                </div>
                            <?php endif; ?>


                            <?php if (!empty($hs['guide_awards'])): ?>

                                <div class="awards-blk">

                                    <?php foreach ($hs['guide_awards'] as $award): ?>
                                        <?php if (!empty($award['award_image'])): ?>

                                            <?php
                                            $award_image_url = $award['award_image'];
                                            $award_image_id = attachment_url_to_postid($award_image_url);
                                            $award_image_data = wp_get_attachment_image_src(
                                                $award_image_id,
                                                'full'
                                            );

                                            $award_width = !empty($award_image_data[1]) ? $award_image_data[1] : '';
                                            $award_height = !empty($award_image_data[2]) ? $award_image_data[2] : '';

                                            // Get WordPress Media Library Alt Text
                                            $award_alt = get_post_meta(
                                                $award_image_id,
                                                '_wp_attachment_image_alt',
                                                true
                                            );

                                            // Fallback alt text
                                            if (empty($award_alt)) {
                                                $award_alt = get_the_title($award_image_id);
                                            }

                                            ?>

                                            <div class="awards-itm <?php echo esc_attr($award['award_class']); ?>">
                                                <img src="<?php echo esc_url($award_image_url); ?>" alt="<?php echo esc_attr($award_alt); ?>"
                                                    width="<?php echo esc_attr($award_width); ?>" height="<?php echo esc_attr($award_height); ?>">
                                            </div>

                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </div>

                            <?php endif; ?>


                        </div>

                    </div>

                </section>

            <?php endif;


            if ($hs['_type'] == 'home-plan-sec'): ?>

                <section class="step-sec">

                    <div class="container">

                        <?php if (!empty($hs['plan_top_heading'])): ?>
                            <div class="top-hdg">
                                <?php echo esc_html($hs['plan_top_heading']); ?>
                            </div>
                        <?php endif; ?>


                        <div class="step-hdg-blk">

                            <?php if (!empty($hs['plan_heading'])): ?>
                                <div class="text-heading">
                                    <?php echo wp_kses_post($hs['plan_heading']); ?>
                                </div>
                            <?php endif; ?>


                            <?php if (!empty($hs['plan_content'])): ?>
                                <div class="text-para">
                                    <?php echo apply_filters('the_content', $hs['plan_content']); ?>
                                </div>
                            <?php endif; ?>

                        </div>


                        <?php if (!empty($hs['plan_steps'])): ?>

                            <div class="step-blk">

                                <?php foreach ($hs['plan_steps'] as $step): ?>

                                    <div class="step-item text-para">

                                        <?php if (!empty($step['step_number'])): ?>
                                            <div class="step-number">
                                                <?php echo esc_html($step['step_number']); ?>
                                            </div>
                                        <?php endif; ?>


                                        <?php if (!empty($step['step_title'])): ?>
                                            <div class="step-title">
                                                <?php echo wp_kses_post($step['step_title']); ?>
                                            </div>
                                        <?php endif; ?>


                                        <?php if (!empty($step['step_content'])): ?>
                                            <?php echo apply_filters('the_content', $step['step_content']); ?>
                                        <?php endif; ?>

                                    </div>

                                <?php endforeach; ?>

                            </div>

                        <?php endif; ?>

                    </div>

                </section>

            <?php endif;


            if ($hs['_type'] == 'what-we-handle'): ?>

                <section class="what-we-handle-sec">

                    <?php if (!empty($hs['wwh_top_heading'])): ?>
                        <div class="top-hdg"><?php echo esc_html($hs['wwh_top_heading']); ?></div>
                    <?php endif; ?>

                    <div class="container">

                        <div class="what-we-handle-list">

                            <div class="what-we-lft-blk">
                                <?php if (!empty($hs['wwh_left_heading'])): ?>
                                    <div class="text-heading"><?php echo wp_kses_post($hs['wwh_left_heading']); ?></div>
                                <?php endif; ?>

                                <?php if (!empty($hs['wwh_left_content'])): ?>
                                    <div class="text-para">
                                        <?php echo apply_filters('the_content', $hs['wwh_left_content']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="what-we-rgt-blk">

                                <?php if (!empty($hs['wwh_tabs'])): ?>

                                    <div class="tabs-block">

                                        <!-- Tab Buttons -->
                                        <div class="tab-btn-group">
                                            <?php foreach ($hs['wwh_tabs'] as $index => $tab): ?>
                                                <?php if (!empty($tab['tab_title'])): ?>
                                                    <div class="tab-btn cmn-btn <?php echo $index === 0 ? 'tab-btn-active' : ''; ?>">
                                                        <?php echo esc_html($tab['tab_title']); ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>

                                        <!-- Tab Content -->
                                        <div class="tab-content-area">
                                            <?php foreach ($hs['wwh_tabs'] as $index => $tab): ?>
                                                <div class="tab-pane <?php echo $index === 0 ? 'tab-pane-active' : ''; ?>">

                                                    <div class="tab-content-inner text-para">

                                                        <?php if (!empty($tab['tab_title'])): ?>
                                                            <div class="tab-cont-title"><?php echo esc_html($tab['tab_title']); ?></div>
                                                        <?php endif; ?>

                                                        <?php if (!empty($tab['tab_content'])): ?>
                                                            <div class="tab-cont-para">
                                                                <?php echo apply_filters('the_content', $tab['tab_content']); ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty($tab['tab_bottom_content'])): ?>
                                                            <div class="tab-btm-para">
                                                                <?php echo apply_filters('the_content', $tab['tab_bottom_content']); ?>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </section>
            <?php endif;



            if ($hs['_type'] == 'meet-the-team'): ?>

                <section id="hm-meet-the-team-sec">

                    <?php if (!empty($hs['meet_team_top_heading'])): ?>
                        <div class="top-hdg">
                            <?php echo esc_html($hs['meet_team_top_heading']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="container">

                        <?php if (!empty($hs['meet_team_content']) || !empty($hs['meet_team_heading'])): ?>
                            <div class="meet-the-team-cnt text-para">

                                <?php if (!empty($hs['meet_team_heading'])): ?>
                                    <div class="text-heading"><?php echo wp_kses_post($hs['meet_team_heading']); ?></div>
                                <?php endif; ?>

                                <?php if (!empty($hs['meet_team_content'])): ?>
                                    <?php echo apply_filters('the_content', $hs['meet_team_content']); ?>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>

                    </div>

                    <?php if (!empty($hs['meet_team_image']) || !empty($hs['meet_team_bg_mobile'])): ?>
                        <div class="meet-the-team-img">
                            <picture>
                                <?php if (!empty($hs['meet_team_image'])): ?>
                                    <source media="(min-width:768px)" srcset="<?php echo esc_url($hs['meet_team_image']); ?>">
                                <?php endif; ?>

                                <?php if (!empty($hs['meet_team_bg_mobile'])): ?>
                                    <img src="<?php echo esc_url($hs['meet_team_bg_mobile']); ?>" alt="Meet Team Mobile Image" width="412"
                                        height="218">
                                <?php elseif (!empty($hs['meet_team_bg_mobile'])): ?>
                                    <img src="<?php echo esc_url($hs['meet_team_bg_mobile']); ?>" alt="Meet Team Desktop Image" width="1920"
                                        height="775">
                                <?php endif; ?>
                            </picture>
                        </div>
                    <?php endif; ?>




                </section>
            <?php endif;


            if ($hs['_type'] == 'home-team-sec'): ?>

                <section id="hm-the-team-sec" class="hm-the-team-sec">

                    <div class="container">

                        <?php if (!empty($hs['team_top_heading'])): ?>
                            <div class="top-hdg"><?php echo esc_html($hs['team_top_heading']); ?></div>
                        <?php endif; ?>

                        <div class="the-team-blk">

                            <?php if (!empty($hs['team_heading'])): ?>
                                <div class="text-heading"><?php echo wp_kses_post($hs['team_heading']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($hs['team_content'])): ?>
                                <div class="text-para">
                                    <?php echo apply_filters('the_content', $hs['team_content']); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                        <!-- Team Members -->
                        <?php if (!empty($hs['team_members'])): ?>

                            <div class="the-team-main">

                                <?php foreach ($hs['team_members'] as $member): ?>

                                    <div class="the-team-itm">

                                        <?php if (!empty($member['member_image'])): ?>
                                            <div class="the-team-itm-img">
                                                <img src="<?php echo esc_url($member['member_image']); ?>"
                                                    alt="<?php echo esc_attr($member['member_name']); ?> Image" width="381" height="472">
                                            </div>
                                        <?php endif; ?>

                                        <div class="the-team-itm-txt-blk">

                                            <?php if (!empty($member['member_name'])): ?>
                                                <div class="the-team-itm-name"><?php echo esc_html($member['member_name']); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($member['member_title'])): ?>
                                                <div class="the-team-itm-title"><?php echo esc_html($member['member_title']); ?></div>
                                            <?php endif; ?>

                                            <?php if (!empty($member['member_description'])): ?>
                                                <p><?php echo esc_html($member['member_description']); ?></p>
                                            <?php endif; ?>

                                        </div>

                                        <?php if (!empty($member['member_link'])): ?>
                                            <div class="hm-team-hvr-link">
                                                <a class="the-team-link" href="<?php echo esc_url($member['member_link']); ?>">
                                                    <?php echo esc_html($member['member_name']); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </section>
            <?php endif;



            if ($hs['_type'] == 'testimonials-section'): ?>
                <section class="hm-testimonial-section">
                    <div class="container">
                        <div class="testimonials-blk">

                            <?php if (!empty($hs['testimonials_top_heading'])): ?>
                                <div class="top-hdg"><?php echo esc_html($hs['testimonials_top_heading']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($hs['testimonials_heading'])): ?>
                                <div class="text-heading"><?php echo wp_kses_post($hs['testimonials_heading']); ?></div>
                            <?php endif; ?>

                            <div class="hm-testi-blk owl-carousel">
                                <?php
                                $testimonial = new WP_Query(array(
                                    'post_type' => 'review',
                                    'posts_per_page' => -1,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                ));

                                if ($testimonial->have_posts()):
                                    while ($testimonial->have_posts()):
                                        $testimonial->the_post();
                                ?>

                                        <div class="testi-itm">

                                            <div class="star-rat">
                                                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/testi-star-img.webp'); ?>"
                                                    alt="testimonial rating" width="155" height="31">
                                            </div>

                                            <div class="testi-cont text-para">
                                                <p class="testi-para"><?php echo wp_trim_words(get_the_content(), 60); ?></p>
                                                <div class="author"><?php echo esc_html(get_the_title()); ?></div>
                                            </div>

                                        </div>

                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>
                </section>
            <?php endif;


            if ($hs['_type'] == 'not-wait'): ?>

                <section class="not-wait-sec">

                    <?php if (!empty($hs['not_wait_top_heading'])): ?>
                        <div class="top-hdg"><?php echo esc_html($hs['not_wait_top_heading']); ?></div>
                    <?php endif; ?>

                    <div class="container">

                        <div class="not-wait-blk text-para">

                            <?php if (!empty($hs['not_wait_heading'])): ?>
                                <div class="text-heading"><?php echo wp_kses_post($hs['not_wait_heading']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($hs['not_wait_content'])): ?>
                                <?php echo apply_filters('the_content', $hs['not_wait_content']); ?>
                            <?php endif; ?>

                            <?php if (!empty($hs['not_wait_button'])): ?>
                                <div class="not-wait-btn">
                                    <a href="<?php echo esc_url($hs['not_wait_button_link'] ?: '#'); ?>" class="cmn-btn">
                                        <?php echo esc_html($hs['not_wait_button']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>

                    <?php if (!empty($hs['not_wait_desktop_image']) || !empty($hs['not_wait_mobile_image'])): ?>

                        <div class="not-wait-img">

                            <picture>
                                <?php if (!empty($hs['not_wait_desktop_image'])): ?>
                                    <source media="(min-width:768px)" srcset="<?php echo esc_url($hs['not_wait_desktop_image']); ?>">
                                <?php endif; ?>

                                <?php if (!empty($hs['not_wait_mobile_image'])): ?>
                                    <img src="<?php echo esc_url($hs['not_wait_mobile_image']); ?>" alt="Not Wait Mobile Image" width="412"
                                        height="218">
                                <?php elseif (!empty($hs['not_wait_desktop_image'])): ?>
                                    <img src="<?php echo esc_url($hs['not_wait_desktop_image']); ?>" alt="Not Wait Desktop Image" width="1920"
                                        height="775">
                                <?php endif; ?>
                            </picture>

                        </div>
                    <?php endif; ?>

                </section>
<?php endif;

        endforeach;
    endif;

endwhile;
?>


<?php get_footer(); ?>