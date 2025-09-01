<?php
/**
 * Plugin bootstrap for FlexLine Utilities features.
 */
namespace FlexLine;

defined('ABSPATH') || exit;

/**
 * Return plugin options merged with defaults.
 */
function flexline_utilities_get_options(): array {
	$defaults = array(
		'enable_og_tags'       => 0,
		'og_skip_if_yoast'     => 0,
		'remove_generator'     => 1,
		'disable_xmlrpc'       => 1,
		'rest_cors_allow_all'  => 0,
	);

	$opts = get_option('flexline_utilities', array());
	return wp_parse_args(is_array($opts) ? $opts : array(), $defaults);
}

/**
 * Register conditional hooks based on options.
 */
function flexline_utilities_boot() {
	$opts = flexline_utilities_get_options();

	// Open Graph tags (your existing function).
	if ( ! empty( $opts['enable_og_tags'] ) ) {
		add_action( 'wp_head', __NAMESPACE__ . '\add_og_tags' );
	}

	// Remove generator meta.
	if ( ! empty( $opts['remove_generator'] ) ) {
		add_filter( 'the_generator', '__return_false' );
	}

	// Disable XML-RPC.
	if ( ! empty( $opts['disable_xmlrpc'] ) ) {
		add_filter( 'xmlrpc_enabled', '__return_false' );
	}

	// Add permissive REST CORS header.
	if ( ! empty( $opts['rest_cors_allow_all'] ) ) {
		/**
		 * Use rest_pre_serve_request so headers are sent at the right time.
		 */
		add_filter( 'rest_pre_serve_request', function( $served, $result, $request ) {
			// Only set if not already set by another plugin or server.
			if ( ! headers_sent() && ! array_key_exists( 'Access-Control-Allow-Origin', headers_list() ) ) {
				header( 'Access-Control-Allow-Origin: *' );
				header( 'Vary: Origin', false );
			}
			return $served;
		}, 10, 3 );
	}
}
add_action( 'init', __NAMESPACE__ . '\flexline_utilities_boot' );
