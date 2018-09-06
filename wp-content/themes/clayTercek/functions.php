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



//ACF Stuff

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    $path = get_stylesheet_directory() . '/plugins/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/plugins/acf/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/plugins/acf/acf.php' );

//5. Register Fields
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_experiences',
		'title' => 'Experiences',
		'fields' => array (
			array (
				'key' => 'field_5b9140156d339',
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Ex: Intern',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b9140576d33a',
				'label' => 'Company',
				'name' => 'company',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Ex: Microsoft',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b91408f6d33c',
				'label' => 'Start Date',
				'name' => 'start_date',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Ex: June 2018',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b9140ba6d33d',
				'label' => 'End Date',
				'name' => 'end_date',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Ex: September 2018',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b9140e26d33e',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'experience',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'discussion',
				3 => 'comments',
				4 => 'author',
				5 => 'format',
				6 => 'featured_image',
				7 => 'categories',
				8 => 'tags',
			),
		),
		'menu_order' => 0,
	));
}
