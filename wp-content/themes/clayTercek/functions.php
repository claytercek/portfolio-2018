<?php

// Theme will only work for WordPress 4.9.6 or later.
if (version_compare($GLOBALS['wp_version'], '4.9.6', '<')) {
    die('This theme only works in WordPress 4.9.6 or later. ');
}

function load_theme_assets()
{
    wp_enqueue_style('normalize', get_template_directory_uri() . '/static/css/normalize.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/static/css/main.css');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');
    wp_enqueue_script('lottie', get_template_directory_uri() . '/static/js/js_dependencies/lottie.js');
    wp_enqueue_script('menu', get_template_directory_uri() . '/static/js/menu.js');
    wp_enqueue_script('smoothState', get_template_directory_uri() . '/static/js/js_dependencies/jquery.smoothState.js');
    wp_enqueue_script('ajax', get_template_directory_uri() . '/static/js/ajax.js');
}

add_action('wp_enqueue_scripts', 'load_theme_assets');

function register_menus()
{
    register_nav_menus([
        'main' => __('Main Navigation'),
    ]);
}

add_action('init', 'register_menus');

function register_widgets()
{
    register_sidebar([
        'name'          => 'Blog Sidebar',
        'id'            => 'sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ]);
}
add_action('widgets_init', 'register_widgets');


add_theme_support('post-thumbnails');

add_image_size( 'portfolio-thumb', 576,448 );

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/static/imgs/logo.png);
		height:80px;
		width:320px;
		background-size: 80px 80px;
		background-repeat: no-repeat;
        	padding-bottom: 20px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// Include other functions in "includes" folder
require_once(__DIR__ . '/includes/experience.php'); //create custom post type
require_once(__DIR__ . '/includes/videos.php'); //create 2nd custom post type
require_once(__DIR__ . '/includes/ACF.php'); //deploy with ACF
require_once(__DIR__ . '/includes/pagination.php'); //pagination functions for search page