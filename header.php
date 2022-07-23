<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="depression-worker1">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://lorem-co-ltd.com/">
	<meta property="og:image" content="./img/no_image.jpg">
	<meta property="og:site_name" content="depression-worker">
	<meta property="og:description" content="">
	<meta name="twitter:card" content="summary_large_image">

    <?php wp_head(); ?>
</head>
<body>
    <header class="header" id="header">
        <input type="checkbox" id="menu_toggle" class="menu_checkbox">
        <label for="menu_toggle" class="menu_hamburger">
            <div class="hamburger_box">
                <span class="bar"></span>
            </div>
        </label>
        <div class="header_top">
            <div class="header_inner">
                <h1 class="header_title"><a href="<?php echo esc_url(home_url('/'));?>"><?php bloginfo('name');?></a></h1>
            </div>
            <?php get_search_form(); ?>
        </div>
        <div class="header_bottom">
            <?php
                if (has_nav_menu('global') || has_nav_menu('global_sns') || has_nav_menu('login')) :
            ?>
                <div class="header_inner">
                    <nav class="header_nav">
                        <?php
                        if (has_nav_menu('global')) {
                            wp_nav_menu(
                                array(
                                    'depth' => 1,
                                    'theme_location' => 'global',
                                    'container' => false,
                                    'menu_class' => 'header_nav-1',
                                )
                            );
                        } else {
                            echo '<ul></ul>';
                        }
                        if (has_nav_menu('global_sns')) {
                            wp_nav_menu(
                                array(
                                    'depth' => 1,
                                    'theme_location' => 'global_sns',
                                    'container' => false,
                                    'menu_class' => 'header_nav-2',
                                )
                            );
                        } else {
                            echo '<ul></ul>';
                        }
                        ?>
                    </nav>
                </div>
            <?php 
                endif; 
                if (has_nav_menu('login')) {
                    wp_nav_menu(
                        array(
                            'depth' => 1,
                            'theme_location' => 'login',
                            'container' => 'div',
                            'container_class' => 'header_nav-3',
                            'menu_class' => '',
                        )
                    );
                }
            ?>
        </div>
    </header>
