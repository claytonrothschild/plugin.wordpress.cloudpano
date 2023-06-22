<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Class
 *
 * Manage Admin Panel Class
 *
 * @package CloudPano 360 Tours Embedder
 * @since 1.0.0
 */
class Cpte_Admin {

	public $scripts;

	//class constructor
	function __construct() {

		global $cpte_scripts;

		$this->scripts = $cpte_scripts;
	}
	
	function cpte_custom_block_register(){
        
		register_block_type('my-plugin/my-block', array(
			'editor_script' => 'cpte-custom-block',
		));
	}

	/**
	 * Adding Hooks
	 *
	 * @package CloudPano 360 Tours Embedder
	 * @since 1.0.0
	 */
	function add_hooks(){
		
		add_action( 'init', array( $this, 'cpte_custom_block_register' ) );
	}
}
?>