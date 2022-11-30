<?php
/**
 * Plugin Name:       AKHB Multiple Blocks
 * Description:       Example static block scaffolded with Create Block tool.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       multiple-blocks
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

//Prevent direct execution
if( !defined( 'ABSPATH' ) ) exit;

//path
define( 'AKHB_BLOCK_PLUGIN_DIR', plugin_dir_path(__FILE__) );


//includes
$rootFiles = glob( AKHB_BLOCK_PLUGIN_DIR . 'includes/*.php' );
$subDirectoryFiles = glob( AKHB_BLOCK_PLUGIN_DIR . 'includes/**/*.php' );
$allFiles = array_merge( $rootFiles, $subDirectoryFiles );

foreach( $allFiles as $filename ) {
    include_once( $filename );
}

//hooks
add_action( 'init', 'akhb_register_blocks' );