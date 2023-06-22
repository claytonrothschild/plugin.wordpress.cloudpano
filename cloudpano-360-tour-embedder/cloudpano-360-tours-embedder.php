<?php
/*
Plugin Name: CloudPano 360 Tour Embedder
Description: CloudPano 360 Tour Embedder
Version: 1.3.3
*/

/**
 * Basic plugin definitions 
 * 
 * @package CloudPano 360 Tour Embedder
 * @since 1.0.0
 */
if( !defined( 'CPTE_DIR' ) ) {
  define( 'CPTE_DIR', dirname( __FILE__ ) );      // Plugin dir
}
if( !defined( 'CPTE_URL' ) ) {
  define( 'CPTE_URL', plugin_dir_url( __FILE__ ) );   // Plugin url
}
if( !defined( 'CPTE_INC_DIR' ) ) {
  define( 'CPTE_INC_DIR', CPTE_DIR.'/includes' );   // Plugin include dir
}
if( !defined( 'CPTE_INC_URL' ) ) {
  define( 'CPTE_INC_URL', CPTE_URL.'includes' );    // Plugin include url
}
if( !defined( 'CPTE_ADMIN_DIR' ) ) {
  define( 'CPTE_ADMIN_DIR', CPTE_INC_DIR.'/admin' );  // Plugin admin dir
}
if(!defined('CPTE_TD')) {
  define('CPTE_TD', 'cloudpano-360-tours-embedder'); // Plugin Text Domain
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 *
 * @package CloudPano 360 Tours Embedder
 * @since 1.0.0
 */
load_plugin_textdomain( CPTE_TD, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 *
 * @package CloudPano 360 Tours Embedder
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'cpte_install' );

function cpte_install(){
	
}

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 *
 * @package CloudPano 360 Tours Embedder
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'cpte_uninstall');

function cpte_uninstall(){
  
}

// Global variables
global $cpte_scripts, $cpte_admin;

// Script class handles most of script functionalities of plugin
include_once( CPTE_INC_DIR.'/class-cpte-scripts.php' );
$cpte_scripts = new Cpte_Scripts();
$cpte_scripts->add_hooks();

// Admin class handles most of admin panel functionalities of plugin
include_once( CPTE_ADMIN_DIR.'/class-cpte-admin.php' );
$cpte_admin = new Cpte_Admin();
$cpte_admin->add_hooks();

include( CPTE_INC_DIR.'/cpte-shortcodes.php' );

?>