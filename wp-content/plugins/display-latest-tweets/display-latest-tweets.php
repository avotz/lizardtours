<?php
/*
 * Plugin Name: Display Latest Tweets
 * Plugin URI: http://wordpress.org/plugins/display-latest-tweets/
 * Description: A widget that displays your latest tweets
 * Version: 1.3.0
 * Author: Sayful Islam
 * Author URI: https://profiles.wordpress.org/sayful/
 * Text Domain: sistweets
 * Domain Path: /languages/
 * License: GPL2
*/

if (!class_exists('Display_Latest_Tweets')):

class Display_Latest_Tweets {	

	/**
	* @var string
	*/
	public $plugin_url;
	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	public function __construct(){
		$this->includes();
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * include widget file
	 */
	public function includes(){
		require_once( 'widget-tweets.php' );
	}
}

add_action( 'plugins_loaded', array( 'Display_Latest_Tweets', 'get_instance' ), 0 );
endif;
