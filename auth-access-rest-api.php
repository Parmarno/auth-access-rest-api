<?php 
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	/**
	 * Plugin Name: Auth Access Rest API
	 * Plugin URI: https://github.com/Parmarno/auth-access-rest-api.git
	 * Description: Closed WP Rest API Default and Create Auth to call api wp rest V2
	 * Version: 1.0.0
	 * Author: Ekkarach Kulwong
	 * Author URI: http://www.i-makeweb.com
	 * Text Domain: auth-access-rest-api
	 * Domain Path: /languages
	 * License: GPL2+
	 */

	remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'template_redirect', 'rest_output_link_header', 11 );


	add_filter( 'rest_authentication_errors', 'disable_json_rest', 20 );

	function disable_json_rest(){
		if (!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW'])) {
			return new WP_Error( 'Permission Denied', __('You must send send user, password to access this api', 'auth-access-rest-api'), array( 'status' => 401 ) );
		} else {
			$tmp = wp_authenticate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
			if ($tmp->errors) {
				return new WP_Error( 'Permission Denied', __('You must send send user, password to access this api', 'auth-access-rest-api'), array( 'status' => 401 ) );
			} 
		}
	}	

