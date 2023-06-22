<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages
 * as well as the front pages.
 *
 * @package CloudPano 360 Tours Embedder
 * @since 1.0.0
 */
class Cpte_Scripts {

	//class constructor
	function __construct()
	{
		
	}
	
	/**
	 * Enqueue Scripts on Public Side
	 * 
	 * @package CloudPano 360 Tours Embedder
	 * @since 1.0.0
	 */
	
	function cpte_custom_block_register_script(){

		wp_enqueue_script( 'cpte-custom-block', CPTE_INC_URL.'/js/cpte-public.js', array('wp-blocks', 'wp-components', 'wp-editor', 'wp-data'), true, false );

		wp_enqueue_style( 'cpte-custom-block', CPTE_INC_URL.'/css/cpte-public.css', array(), 5 );
	}

	function enqueue_dashicons() {
		wp_enqueue_style('dashicons');
	}
	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package CloudPano 360 Tours Embedder
	 * @since 1.0.0
	 */
	function add_hooks(){
	
		add_action( 'enqueue_block_editor_assets', array( $this, 'cpte_custom_block_register_script' ) );
		
		add_action('wp_enqueue_scripts', array( $this, 'enqueue_dashicons' ) );
		
	}
}
?>