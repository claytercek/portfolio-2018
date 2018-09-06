<?php

add_action( 'after_switch_theme', 'scratch_setup' );
function scratch_setup() {
  // create Style Guide
  $postarr = array(
    'post_type' => 'page',
    'post_title' => 'Style Guide'
  );
  $style_guide_id = wp_insert_post( $postarr );
  update_post_meta( $style_guide_id, '_wp_page_template', 'page-style_guide.php' );

  // set up home page
  $home_page = get_page_by_title( 'Front Page' );
  $home_page_id = null;
  if( !$home_page ) {
    $postarr = array(
      'post_type' => 'page',
      'post_title' => 'Front Page',
      'post_status' => 'publish'
    );
    $home_page_id = wp_insert_post( $postarr );
  } else {
    $home_page_id = $home_page->ID;
  }

  if( $home_page_id ) {
    update_option( 'page_on_front', $home_page_id );
    update_option( 'show_on_front', 'page' );
    update_post_meta( $home_page_id, '_wp_page_template', 'page-layouts.php' );
  }

  // add main menu
  // Check if the menu exists
  $menu_name = 'Main Nav';
  $menu_exists = wp_get_nav_menu_object( $menu_name );

  // If it doesn't exist, let's create it.
  if(!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);

    // Set up default menu items
    $args = array(
      'menu-item-title' =>  __('Home'),
      'menu-item-url' => home_url( '/' ),
      'menu-item-status' => 'publish'
    );
    wp_update_nav_menu_item($menu_id, 0, $args);

    $args = array(
      'menu-item-title' =>  __('Style Guide'),
      'menu-item-url' => get_permalink($style_guide_id),
      'menu-item-status' => 'publish'
    );
    wp_update_nav_menu_item($menu_id, 0, $args);
  }

  // assign menu location
  $locations = get_registered_nav_menus();

  if(!empty($locations))
  {
    foreach($locations as $locationId => $menuValue)
    {
      switch($locationId)
      {
        case 'scratch-main-nav':
        $menu = get_term_by('name', 'Main Nav', 'nav_menu');
        break;
      }

      if(isset($menu))
      {
        $locations[$locationId] = $menu->term_id;
      }
    }

    set_theme_mod('nav_menu_locations', $locations);
  }
}

// // //

function hide_admin_bar_from_front_end() {
  if (is_blog_admin()) {
    return true;
  }
  return false;
}

add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );

// // //

add_action('init', 'bones_head_cleanup');

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function bones_head_cleanup() {
  // category feeds
  // remove_action( 'wp_head', 'feed_links_extra', 3 );
  // post and comment feeds
  // remove_action( 'wp_head', 'feed_links', 2 );
  // EditURI link
  remove_action( 'wp_head', 'rsd_link' );
  // windows live writer
  remove_action( 'wp_head', 'wlwmanifest_link' );
  // index link
  remove_action( 'wp_head', 'index_rel_link' );
  // previous link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  // start link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  // links for adjacent posts
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

} /* end bones head cleanup */

// // //

/*
 * Include Layout Functions and Layout Declarations.
 */

require_once dirname( __FILE__ ) . '/layout-functions.php';
require_once dirname( __FILE__ ) . '/layout-declarations.php';

// // //

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

  /**
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
$plugins = array(
  // This is an example of how to include a plugin from the WordPress Plugin Repository
  array(
    'name'         => 'ACF-Content Analysis for Yoast SEO',
    'slug'         => 'acf-content-analysis-for-yoast-seo',
    'required'     => false,
  ),
  array(
    'name'         => 'Resize Image After Upload',
    'slug'         => 'resize-image-after-upload',
    'required'     => false,
  ),
  array(
    'name'         => 'WordPress SEO by Yoast',
    'slug'         => 'wordpress-seo',
    'required'     => false,
  )
);

// Change this to your theme text domain, used for internationalising strings
$theme_text_domain = 'tgmpa';

  /**
   * Array of configuration settings. Amend each line as needed.
   * If you want the default strings to be available under your own theme domain,
   * leave the strings uncommented.
   * Some of the strings are added into a sprintf, so see the comments at the
   * end of each line for what each argument will be.
   */
$config = array('domain' => $theme_text_domain, // Text domain - likely want to be the same as your theme.
                'default_path' => '', // Default absolute path to pre-packaged plugins
                'parent_menu_slug' => 'themes.php', // Default parent menu slug
                'parent_url_slug' => 'themes.php', // Default parent URL slug
                'menu' => 'install-required-plugins',  // Menu slug
                'has_notices' => true, // Show admin notices or not
                'is_automatic' => false, // Automatically activate plugins after installation or not
                'message' => '', // Message to output right before the plugins table
                'strings' => array('page_title' => __( 'Install Required Plugins', $theme_text_domain ),
                                   'menu_title' => __( 'Install Plugins', $theme_text_domain ),
                                   'installing' => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
                                   'oops' => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
                                   'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
                                   'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
                                   'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
                                   'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                                   'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                                   'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
                                   'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
                                   'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
                                   'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
                                   'activate_link' => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
                                   'return' => __( 'Return to Required Plugins Installer', $theme_text_domain ),
                                   'plugin_activated' => __( 'Plugin activated successfully.', $theme_text_domain ),
                                   'complete' => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
                                   'nag_type' => 'updated')); // Determines admin notice type - can only be 'updated' or 'error'

tgmpa( $plugins, $config );

}

?>
