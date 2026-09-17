<?php /* Template Name: About Us Page */

get_header();

get_template_part('templates/template-parts/heros/default', 'hero');

$in_about_heading = carbon_get_the_post_meta('in_about_heading');
$in_about_description = carbon_get_the_post_meta('in_about_description');
$team_members = carbon_get_the_post_meta('the_team_members');
?>

<section id="hm-the-team-sec" class="hm-the-team-sec page-content about_pg">
    <div class="container">
        <div class="page-cnt-block">
            <div class="page-left-blk full-width">

                <?php if ($in_about_heading): ?>
                    <div class="abt-heading">
                        <?php echo esc_html($in_about_heading); ?>
                    </div>
                <?php endif; ?>


                <?php if ($in_about_description): ?>
                    <div class="abt-description">
                        <?php echo apply_filters('the_content', $in_about_description); ?>
                    </div>
                <?php endif; ?>


                <?php if (!empty($team_members) && is_array($team_members)): ?>

                    <!-- Team Members -->
                    <div class="the-team-main">

                        <?php foreach ($team_members as $index => $attorney): ?>

                            <?php
                            $attorney_image = $attorney['attorney_image'] ?? '';
                            $attorney_name = $attorney['attorney_name'] ?? '';
                            $attorney_designation = $attorney['attorney_designation'] ?? '';
                            $attorney_description = $attorney['attorney_description'] ?? '';
                            $attorney_popup_button = $attorney['attorney_popup_button'] ?? '';

                            $popup_id = 'attorney-popup-' . ($index + 1);
                            ?>

                            <div class="the-team-itm">

                                <?php if ($attorney_image): ?>

                                    <div class="the-team-itm-img">

                                        <?php
                                        echo wp_get_attachment_image(
                                            $attorney_image,
                                            'full'
                                        );
                                        ?>

                                    </div>

                                <?php endif; ?>


                                <div class="the-team-itm-txt-blk">

                                    <?php if ($attorney_name): ?>
                                        <div class="the-team-itm-name">
                                            <?php echo esc_html($attorney_name); ?>
                                        </div>
                                    <?php endif; ?>


                                    <?php if ($attorney_designation): ?>
                                        <div class="the-team-itm-title">
                                            <?php echo esc_html($attorney_designation); ?>
                                        </div>
                                    <?php endif; ?>


                                    <?php if ($attorney_description): ?>
                                        <p class="the-team-itm-desc">
                                            <?php echo wp_kses_post($attorney_description); ?>
                                        </p>
                                    <?php endif; ?>

                                </div>


                                <?php if ($attorney_popup_button): ?>

                                    <button
                                        class="btn-popups"
                                        type="button"
                                        popovertarget="<?php echo esc_attr($popup_id); ?>"
                                    >
                                        <?php echo esc_html($attorney_popup_button); ?>
                                    </button>

                                <?php endif; ?>

                            </div>

                        <?php endforeach; ?>

                    </div>


                    <!-- Attorney Popups -->
                    <?php foreach ($team_members as $index => $attorney): ?>

                        <?php
                        $attorney_name = $attorney['attorney_name'] ?? '';
                        $attorney_popup_content = $attorney['attorney_popup_content'] ?? '';
                        $attorney_awards = $attorney['attorney_awards'] ?? array();
                        $practice_areas = $attorney['attorney_practice_areas'] ?? array();

                        $popup_id = 'attorney-popup-' . ($index + 1);
                        ?>

                        <div
                            id="<?php echo esc_attr($popup_id); ?>"
                            popover
                            class="popoverContainer"
                        >

                            <div class="case-modal-1">

                                <div class="case-modal-content">

                                    <button
                                        class="case-close"
                                        type="button"
                                        popovertarget="<?php echo esc_attr($popup_id); ?>"
                                        popovertargetaction="hide"
                                    >
                                        ×
                                    </button>


                                    <?php if ($attorney_name): ?>

                                        <div class="attry-pop-name">
                                            <?php echo esc_html($attorney_name); ?>
                                        </div>

                                    <?php endif; ?>


                                    <div class="attry-pop-cont">


                                        <!-- Popup Content -->
                                        <?php if ($attorney_popup_content): ?>

                                            <?php
                                            echo apply_filters(
                                                'the_content',
                                                $attorney_popup_content
                                            );
                                            ?>

                                        <?php endif; ?>


                                        <!-- Awards -->
                                        <?php if (!empty($attorney_awards) && is_array($attorney_awards)): ?>

                                            <div class="in-awards-blk">

                                                <?php foreach ($attorney_awards as $award_image): ?>

                                                    <?php if ($award_image): ?>

                                                        <div class="in-award-itm">

                                                            <?php
                                                            echo wp_get_attachment_image(
                                                                $award_image,
                                                                'full'
                                                            );
                                                            ?>

                                                        </div>

                                                    <?php endif; ?>

                                                <?php endforeach; ?>

                                            </div>

                                        <?php endif; ?>


                                        <!-- Areas of Practice -->
                                        <?php if (!empty($practice_areas) && is_array($practice_areas)): ?>

                                            <div class="attry-pop-name">
                                                Areas of Practice
                                            </div>

                                            <div class="attry-we-serve">

                                                <ul>

                                                    <?php foreach ($practice_areas as $practice): ?>

                                                        <?php
                                                        $practice_name = $practice['practice_name'] ?? '';
                                                        $practice_url = $practice['practice_url'] ?? '';
                                                        ?>

                                                        <?php if ($practice_name): ?>

                                                            <li>

                                                                <?php if ($practice_url): ?>

                                                                    <a href="<?php echo esc_url($practice_url); ?>">
                                                                        <?php echo esc_html($practice_name); ?>
                                                                    </a>

                                                                <?php else: ?>

                                                                    <?php echo esc_html($practice_name); ?>

                                                                <?php endif; ?>

                                                            </li>

                                                        <?php endif; ?>

                                                    <?php endforeach; ?>

                                                </ul>

                                            </div>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>