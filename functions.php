<?php

function my_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
}
add_action('after_setup_theme', 'my_setup');

function my_script_init() {
    wp_enqueue_style('my_reset', get_template_directory_uri().'/css/reset.css', array(), '1.0.0', 'all');
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
    wp_enqueue_style('my', get_template_directory_uri().'/css/style.css', array(), '1.0.0', 'all');
    wp_enqueue_script('my', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');

function my_menu_init() {
    
    register_nav_menus(
        array(
            'global' => 'ヘッダーメニュー',
            'global_sns' => 'ヘッダーsnsメニュー',
            'login' => 'ログインメニュー',
            'footer_1' => 'フッターメニュー1',
            'footer_2' => 'フッターメニュー2',
        )
    );
}
add_action('init', 'my_menu_init');

function my_widget_init() {
    
    register_sidebar( array('name' => 'Twiterタイムライン',
        'id' => 'widget_twitter_timeline',
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action('init', 'my_widget_init');

function add_click_button( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->title ) && $args->container_class == 'footer_nav-2' ) {
        $item_output = '<span>'.$item->title.'</span><a href="'.$item->url.'">click</a>';
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'add_click_button', 10, 4 );

function post_has_archive( $args, $post_type ) {

	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'blogs';
	}
	return $args;

}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

function my_archive_title($title){
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    }  elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_author()) {
        $title = get_the_author();
    } elseif (is_date()) {
        $title = '';
        if (get_query_var('year')) {
            $title .= get_query_var('year') . '年';
        }
        if (get_query_var('mouthnum')) {
            $title .= get_query_var('mouthnum') . '月';
        }
        if (get_query_var('day')) {
            $title .= get_query_var('day') . '日';
        }
    }
    return $title;
}
add_filter('get_the_archive_title', 'my_archive_title');
