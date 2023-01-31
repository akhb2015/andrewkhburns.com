<?php
/**
 * Plugin Name:       AKHB API Endpoints
 * Description:       Creates endpoints for other systems to interact with
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Andy Burns
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       akhb
 *
 * @package           endpoints
 */

//Prevent direct execution
if( !defined( 'ABSPATH' ) ) exit;

//path
define( 'AKHB_API_ENDPOINTS_PLUGIN_DIR', plugin_dir_path(__FILE__) );

//includes
$rootFiles = glob( AKHB_API_ENDPOINTS_PLUGIN_DIR . 'includes/*.php' );
$subDirectoryFiles = glob( AKHB_API_ENDPOINTS_PLUGIN_DIR . 'includes/**/*.php' );
$allFiles = array_merge( $rootFiles, $subDirectoryFiles );

foreach( $allFiles as $filename ) {
    include_once( $filename );
}


//hooks
//registers URL endpoints for sending/receiving data
add_action('rest_api_init', 'akhb_rest_api_init');

//for passing the data to the endpoint with Javascript
//add_action('wp_enqueue_scripts', 'akhb_enqueue_scripts');