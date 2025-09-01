<?php
/**
 * Security functions (conditional).
 *
 * @package flexline
 */

namespace FlexLine;

defined('ABSPATH') || exit;


/**
 * Register conditional hardening hooks.
 */
function flexline_register_security_hooks() {
	$opts = \FlexLine\flexline_utilities_get_options();

	// Remove generator meta tag.
	if ( ! empty( $opts['remove_generator'] ) ) {
		add_filter( 'the_generator', '__return_false' );
	}

	// Disable XML-RPC.
	if ( ! empty( $opts['disable_xmlrpc'] ) ) {
		add_filter( 'xmlrpc_enabled', '__return_false' );
	}

	// REST API CORS: allow any origin (*).
	if ( ! empty( $opts['rest_cors_allow_all'] ) ) {
		/**
		 * Using rest_pre_serve_request ensures headers are sent at the right time.
		 * If you prefer the earlier approach, uncomment the add_action('rest_api_init', ...) block below.
		 */
		add_filter( 'rest_pre_serve_request', function( $served, $result, $request ) {
			if ( ! headers_sent() ) {
				header( 'Access-Control-Allow-Origin: *' );
				header( 'Vary: Origin', false );
			}
			return $served;
		}, 10, 3 );

		// —OR— keep your original approach (commented out):
		// add_action( 'rest_api_init', __NAMESPACE__ . '\cors_control' );
	}
}
add_action( 'init', __NAMESPACE__ . '\flexline_register_security_hooks' );

/**
 * Original CORS function (used only if you switch back to rest_api_init approach).
 */
function cors_control() {
	header( 'Access-Control-Allow-Origin: *' );
}
