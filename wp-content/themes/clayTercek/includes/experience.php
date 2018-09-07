<?php
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
    'show_in_nav_menus' => true,
    'show_in_menu' => true,
  );
  register_post_type( 'experience', $args ); 
}
add_action( 'init', 'my_custom_post_experience' );

?>