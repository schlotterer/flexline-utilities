<?php
/**
 * Plugin Name: FlexLine Utilities
 * Description: Custom functionality extending FlexLine Theme
 * Version: 1.0.0
 * Author: Joel Schlotterer
 * Author URI: https://FlexLineTheme.com
 * Text Domain: flexline
 * Domain Path: /languages

 * ███████╗██╗     ███████╗██╗  ██╗██╗     ██╗███╗   ██╗███████╗
 * ██╔════╝██║     ██╔════╝╚██╗██╔╝██║     ██║████╗  ██║██╔════╝
 * █████╗  ██║     █████╗   ╚███╔╝ ██║     ██║██╔██╗ ██║█████╗  
 * ██╔══╝  ██║     ██╔══╝   ██╔██╗ ██║     ██║██║╚██╗██║██╔══╝  
 * ██║     ███████╗███████╗██╔╝ ██╗███████╗██║██║ ╚████║███████╗
 * ╚═╝     ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝╚═╝╚═╝  ╚═══╝╚══════╝
  
 */

namespace FlexLine_Utilities;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define constants.
define('FLEXLINE_UTILITIES_VERSION', '1.0.0');
define('FLEXLINE_UTILITIES_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include required files.
require_once FLEXLINE_UTILITIES_PLUGIN_DIR . 'includes/class-admin.php';
require_once FLEXLINE_UTILITIES_PLUGIN_DIR . 'includes/class-shortcodes.php';
require_once FLEXLINE_UTILITIES_PLUGIN_DIR . 'includes/class-utilities.php';


// Activation and deactivation hooks.
register_activation_hook(__FILE__, 'FlexLine_Utilities\activate');
register_deactivation_hook(__FILE__, 'FlexLine_Utilities\deactivate');

/**
 * Plugin activation callback.
 */
function activate() {
    // Code to execute on activation.
}

/**
 * Plugin deactivation callback.
 */
function deactivate() {
    // Code to execute on deactivation.
}

// Initialize plugin functionalities.
add_action('plugins_loaded', 'FlexLine_Utilities\init');

function init() {
    Admin::init();
    Shortcodes::init();
    add_action('wp_enqueue_scripts', 'FlexLine_Utilities\enqueue_scripts');
}

/**
 * Enqueue scripts and styles.
 */
function enqueue_scripts() {
    //wp_enqueue_style('flexline-utilities', plugin_dir_url(__FILE__) . 'assets/css/flexline-utilities.css', array(), FLEXLINE_UTILITIES_VERSION);
    //wp_enqueue_script('flexline-utilities', plugin_dir_url(__FILE__) . 'assets/js/flexline-utilities.js', array(), FLEXLINE_UTILITIES_VERSION, true);
}

/**
 * Allows shortcodes for meta
 *
 * @author Joel Schlotterer
 */
// Activate shortcode function in various places.
add_filter( 'the_title', 'do_shortcode' );
add_filter( 'single_post_title', 'do_shortcode' );
add_filter( 'wpseo_title', 'do_shortcode' );
add_filter( 'wpseo_metadesc', 'do_shortcode' );
add_filter( 'wpseo_opengraph_title', 'do_shortcode' );
add_filter( 'wpseo_opengraph_desc', 'do_shortcode' );
add_filter( 'wpseo_opengraph_site_name', 'do_shortcode' );
add_filter( 'wpseo_twitter_title', 'do_shortcode' );
add_filter( 'wpseo_twitter_description', 'do_shortcode' );
add_filter( 'the_excerpt', 'do_shortcode' );

/**
 * Enable custom mime types.
 *
 * @author Joel Schlotterer
 *
 * @param array $mimes Current allowed mime types.
 *
 * @return array Mime types.
 */
function custom_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'FlexLine_Utilities\custom_mime_types' );

