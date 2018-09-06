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
    wp_enqueue_script('menu', get_template_directory_uri() . '/static/js/menu.js');
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

function my_custom_post_experience() {
  $labels = array(
    'name'               => _x( 'Experiences', 'post type general name' ),
    'singular_name'      => _x( 'Experience', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New experience' ),
    'edit_item'          => __( 'Edit experience' ),
    'new_item'           => __( 'New experience' ),
    'all_items'          => __( 'All experiences' ),
    'view_item'          => __( 'View experience' ),
    'search_items'       => __( 'Search experiences' ),
    'not_found'          => __( 'No experiences found' ),
    'not_found_in_trash' => __( 'No experiences found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Experiences'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our experiences and experience specific data',
    'public'        => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-hammer',
    'supports'      => array( 'title', 'editor' ),
    'has_archive'   => true,
  );
  register_post_type( 'experience', $args ); 
}
add_action( 'init', 'my_custom_post_experience' );