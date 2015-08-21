<?php
/*
Plugin Name: WP Component API
Version: 0.1
Description: A unified component API combining Widgets, Shortcodes and Template parts.
Author: Brent Jett
Author URI: https://about.me/brent.jett
Text Domain: wp_component
License: GPL v2 or later
*/

define( 'WP_COMPONENT_API_DIR', dirname( __FILE__ ));
defined( 'ABSPATH' ) or die( 'No script nonsense please!' );

// Include base class and helper functions.
require_once WP_COMPONENT_API_DIR . '/includes/class-wp-component.php';
require_once WP_COMPONENT_API_DIR . '/includes/functions.php';

// Include example components
require_once WP_COMPONENT_API_DIR . '/components/class-author-component.php';

function wp_init_components() {

    // register components
    $author = new Author_Component();

}
add_action('plugins_loaded', 'wp_init_components');
?>
