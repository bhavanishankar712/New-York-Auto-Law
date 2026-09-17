<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme_Name
 */

?>


<?php

$sdb_posts_title = carbon_get_theme_option('sdb_posts_title');

$sb_form_title = carbon_get_theme_option('sb_form_title');
$sb_form_sub_title = carbon_get_theme_option('sb_form_sub_title');
$sb_gravity_form = carbon_get_theme_option('sb_gravity_form');

$sdb_cont_title = carbon_get_theme_option('sdb_cont_title');
$sdb_cont_content = carbon_get_theme_option('sdb_cont_content');
$sb_cont_phn_num = carbon_get_theme_option('sb_cont_phn_num');
$sb_cont_call_icon = carbon_get_theme_option('sb_cont_call_icon');

?>

<div class="page-sidebar">

    <div class="widget widget-nav-menu categories-menu">

        <?php if (!empty($sdb_posts_title)): ?>
            <div class="widget-title">
                <?php echo $sdb_posts_title; ?>
            </div>
        <?php endif; ?>

        <ul>
            <?php $categories = get_categories();
            foreach ($categories as $category) {
                echo '<li class="">
                            <a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>
                        </li>';
            } ?>
        </ul>

    </div>

    <script defer async src='https://cdn.trustindex.io/loader.js?51b2d79812614291ff96e77f5f6'></script>

    <!-- Sidebar Form -->

    <div class="in-sb-form-main">

        <div class="widget in-sb-form">
            <?php if (!empty($sb_form_title)): ?>
                <div class="widget-title">
                    <?php echo wp_kses_post($sb_form_title); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($sb_form_sub_title)): ?>
                <div class="in-sb-form-subtitl">
                    <?php echo wp_kses_post($sb_form_sub_title); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($sb_gravity_form)): ?>
                <?php echo do_shortcode('[gravityform id="' . $sb_gravity_form . '" title="false" description="false" ajax="true"]'); ?>
            <?php endif; ?>

        </div>


        <!-- Sidebar Contact Block -->

        <div class="widget sdb-cont-blk">

            <?php if ($sdb_cont_title): ?>
                <div class="widget-title">
                    <?php echo wp_kses_post($sdb_cont_title); ?>
                </div>
            <?php endif; ?>

            <?php if ($sdb_cont_content): ?>
                <div class="in-sb-cont-content">
                    <?php echo apply_filters('the_content', $sdb_cont_content); ?>
                </div>
            <?php endif; ?>

            <?php if ($sb_cont_phn_num): ?>
                <div class="sb-cont-call">
                    <a href="tel:+1<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $sb_cont_phn_num)); ?>">
                        <img src="<?php echo esc_url($sb_cont_call_icon); ?>"
                            alt="<?php echo wp_kses_post($sdb_cont_title); ?>" width="40" height="40">
                        <?php echo esc_html($sb_cont_phn_num); ?>
                    </a>
                </div>

            <?php endif; ?>

        </div>

    </div>


</div>