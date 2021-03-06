<?php

/*
Plugin Name: Advanced Custom Fields: Dynamic Text Inputs
Plugin URI: https://github.com/Bazooo/acf-dynamic-text-inputs
Description: Dynamic text inputs that allows to create an array of text
Version: 0.0.0
Author: Mathieu Chan Yee Choy
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('bazooo_acf_plugin_dynamic_text_inputs') ) :

class bazooo_acf_plugin_dynamic_text_inputs {
	
	// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	0.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '0.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field')); // v4
	}
	
	
	/*
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	0.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to 4
	*  @return	void
	*/
	
	function include_field( $version = 4 ) {

		$this->settings['version_stuff'] = $version;
		
		// load textdomain
		load_plugin_textdomain( 'acf-dynamic-text-inputs', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );
		
		
		// include
		include_once('fields/class-bazooo-acf-field-dynamic-text-inputs-v4.php');
	}
	
}


// initialize
new bazooo_acf_plugin_dynamic_text_inputs();


// class_exists check
endif;
