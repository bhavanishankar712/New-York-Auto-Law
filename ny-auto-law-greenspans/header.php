<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <style>
        @font-face {
            font-display: swap;
            font-family: 'Figtree';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/figtree-v9-latin-regular.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Figtree';
            font-style: normal;
            font-weight: 500;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/figtree-v9-latin-500.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Figtree';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/figtree-v9-latin-600.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Figtree';
            font-style: normal;
            font-weight: 700;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/figtree-v9-latin-700.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Figtree';
            font-style: normal;
            font-weight: 900;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/figtree-v9-latin-900.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Oswald';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/oswald-v57-latin-regular.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Oswald';
            font-style: normal;
            font-weight: 600;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/oswald-v57-latin-600.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Golos Text';
            font-style: normal;
            font-weight: 400;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/golos-text-v7-latin-regular.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Golos Text';
            font-style: normal;
            font-weight: 500;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/golos-text-v7-latin-500.woff2') format('woff2');
        }

        @font-face {
            font-display: swap;
            font-family: 'Golos Text';
            font-style: normal;
            font-weight: 700;
            src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/golos-text-v7-latin-700.woff2') format('woff2');
        }
    </style>

    <?php wp_head(); ?>

</head>

<body <?php body_class('bg-white antialiased'); ?>>

    <?php if (is_page_template('templates/page-front.php')):
        $wrapper_class = 'homepage';
    else:
        $wrapper_class = 'internal';
    endif; ?>

    <?php // Fixed Header Options
    $fixed_header = carbon_get_theme_option('fixed_header');
    if ($fixed_header === 'yes'):
        $position = 'fixed ';
        $header_position = 'transform -translate-x-1/2 -translate-y-1/2 logo-menu-wrapper left-1/2 ';
    else:
        $position = 'relative ';
        $header_position = '';
    endif; ?>


    <div id="wrapper" class="flex flex-col <?= $wrapper_class; ?>">
        <?php // Show/Hide Utility Menu 
        $utility_menu = carbon_get_theme_option('utility_menu');
        if ($utility_menu === 'yes'):
            $show_menu = 'lg:block ';
        else:
            $show_menu = '';
        endif; ?>


        <div id="header-top" class="<?php echo $position . $show_menu ?>z-10 w-full hidden">
            <div id="utility-menu-wrapper" class="w-11/12 mx-auto max-w-screen-2xl">
                <?php // Utlity Menu
                wp_nav_menu(
                    array(
                        'container_id' => 'utility-menu',
                        'container_class' => '',
                        'menu_class' => 'lg:flex lg:justify-end',
                        'theme_location' => 'utility',
                        'li_class' => '',
                        'fallback_cb' => false,
                    )
                ); ?>
            </div>
        </div>


        <?php

        $header_top_left = carbon_get_theme_option('header_top_left');
        $header_top_right = carbon_get_theme_option('header_top_right');

        $header_logo = carbon_get_theme_option('header_logo');
        $primary_menu = carbon_get_theme_option('primary_menu');

        $header_phone = carbon_get_theme_option('header_phone_number');
        $header_phone_url = carbon_get_theme_option('header_phone_url');

        ?>


        <div class="mobinav">

            <button type="button" class="menuClose" onclick="toggleMenu();">
                &times;
            </button>

            <?php
            wp_nav_menu(
                array(
                    'container_id' => 'primary-menu',
                    'container_class' => '',
                    'menu_class' => '',
                    'theme_location' => 'primary',
                    'menu' => $primary_menu,
                    'li_class' => '',
                    'fallback_cb' => false,
                )
            );
            ?>

        </div>





        <header id="header" class="<?php echo esc_attr($position . $header_position); ?> z-10 w-full logo-menu-wrapper">

            <!-- Header Top -->
            <div class="header-top">
                <div class="container">

                    <div class="head-top-list">

                        <?php if (!empty($header_top_left)): ?>
                            <div class="head-top-left">
                                <?php foreach ($header_top_left as $item): ?>
                                    <?php if (!empty($item['text'])): ?>
                                        <a><?php echo esc_html($item['text']); ?></a>
                                        <span>/</span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="head-top-rgt">
                            <div class="lang-en">
                                <?php echo do_shortcode('[gt-link lang="en" label="English" ]'); ?>
                            </div>

                            <div class="lang-es">
                                <?php echo do_shortcode('[gt-link lang="es" label="Español" ]'); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="header-sec">
                <div class="container">

                    <div class="header-blk">

                        <div class="logo">
                            <?php if ($header_logo): ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url($header_logo); ?>"
                                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>" width="300" height="93">
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="hdr-rgt-blk">

                            <div class="top-menu">

                                <nav id="main-nav">

                                    <input class="side-menu" type="checkbox" id="side-menu" />

                                    <label class="hamb" for="side-menu">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hdr-hamburger-icon.svg"
                                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="block w-auto"
                                            width="19" height="15">
                                    </label>

                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'container_id' => 'primary-menu',
                                            'container_class' => '',
                                            'menu_class' => '',
                                            'theme_location' => 'primary',
                                            'menu' => $primary_menu,
                                            'li_class' => '',
                                            'fallback_cb' => false,
                                        )
                                    );
                                    ?>

                                </nav>
                            </div>

                            <?php if ($header_phone): ?>
                                <div class="header-btn">
                                    <a href="<?php echo esc_url(
                                                    $header_phone_url
                                                        ?: 'tel:+1' . preg_replace('/[^0-9+]/', '', $header_phone)
                                                ); ?>">
                                        <?php echo esc_html($header_phone); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </header>