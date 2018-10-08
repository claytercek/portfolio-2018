<?php
function my_custom_post_video() {
  $labels = array(
    'name'               => _x( 'Videos', 'post type general name' ),
    'singular_name'      => _x( 'Video', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'video' ),
    'add_new_item'       => __( 'Add New video' ),
    'edit_item'          => __( 'Edit video' ),
    'new_item'           => __( 'New video' ),
    'all_items'          => __( 'All videos' ),
    'view_item'          => __( 'View video' ),
    'search_items'       => __( 'Search videos' ),
    'not_found'          => __( 'No videos found' ),
    'not_found_in_trash' => __( 'No videos found in the Trash' ),
    'menu_name'          => 'Videos'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our videos and video specific data',
    'public'        => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-video-alt',
    'supports'      => array( 'title', 'editor' ),
    'has_archive'   => true,
    'show_in_nav_menus' => true,
    'show_in_menu' => true,
  );
  register_post_type( 'video', $args ); 
}
add_action( 'init', 'my_custom_post_video' );

?>