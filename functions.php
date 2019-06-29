<?php
	/**
	 * Plugin Name: Rental Property Calulator
	 * Description: A comprehensive calculator for determining every aspect of your rental property’s investment prospects.
	 * Author: Seth Connell
	 * Version: 1.0
	 * Text Domain: rental-property-calculator
	 **/
	
	// the files below contain various parts of the plugin's functionality. We keep these separate to help control the complexity of the plugin
	require_once 'includes/menu_class.php'; // contains the functionality to add a link to the WordPress dashboard menu
	require_once 'includes/enqueue_class.php'; // adds all required external files (styles and scripts) to the header of the site
	require_once 'includes/api_class.php'; // adds RESTful API endpoints for accessing WordPress data
	require_once 'includes/database_class.php'; // initializes database tables required by the plugin
	require_once 'includes/shortcode_class.php'; // adds a shortcode that will be used to insert the calculator onto the site
	
	class rental_property_calculator { // main class for the plugin. It contains the functions used by the WordPress hooks below to set up the plugin
		private $properties;
		function __construct() {
			$this->properties = array ( // this object contains global variables that will be used in the other plugin classes. It is passed to each class constructor
				'root_dir' => plugin_dir_path(__FILE__),  // the relative path to the root directory of the plugin
				'root_url' => plugin_dir_url( __FILE__ ), // the URL to the root directory of the plugin
				'page_title' => 'Rental Property Calulator', // the page title used for the admin side of the plugin
				'menu_title' => 'Rental Property Calulator', // the text used for the menu item in the admin menu
				'menu_slug' => 'rental-property-calculator', // the URL slug used for the admin side of the plugin
				'prefix' => 'rpc', // specifies a unique prefix for names and paths in this plugin. This eliminates errors caused by defining multiple names or paths of the same name from different plugins
				'var_prefix' => 'rpc', // specifies a unique prefix for variables in this plugin. This eliminates errors caused by defining multiple variables of the same name from different plugins
			);
		}
		function menu() {
			$menu = new page($this->properties); // create a new instance of the rpc_page class from menu.php
			$menu->register_menu(); // call the function from menu.php that adds the menu item to the admin menu
		}
		function assets( $hook ) {
			$scripts = new assets($this->properties); // create a new instance of the rpc_assets class from enqueue.php
			if( $hook === 'toplevel_page_' . $this->properties['menu_slug'] ) { // if the current page is the plugin page in the admin side of the plugin
				$scripts->enqueue_admin(); // call the function from enqueue.php that enqueues the required scripts and styles on the admin side of the plugin
			} elseif ( !is_admin() ) { // if the current page is the frontend of the site
				$scripts->enqueue_frontend(); // call the function from enqueue.php that enqueues the required scripts and styles on the frontend side of the plugin
			}
		}
		function api() {
			$api = new api($this->properties); // create a new instance of the rpc_api class from api.php
			$api->register(); // call the function from api.php that adds the RESTful API routes
		}
		function database() {
			$db = new database($this->properties); // create a new instance of the rpc_database class from database.php
			$db->initialize(); // call the function from database.php that initializes the database for the plugin
		}
		function shortcode() {
			$shortcode = new shortcode($this->properties); // create a new instance of the rpc_shortcode class from shortcode.php
			return $shortcode->render(); // call the function from shortcode.php that outputs the plugin shortcode
		}
	}
	
	$rental_property_calculator = new rental_property_calculator(); // create a new instance of the main plugin class
	
	// the hooks below take the plugin functions and add them into our WordPress site
	add_action( 'admin_menu', array( $rental_property_calculator, 'menu' ) ); // adds the menu item to the admin menu in the dashboard
	add_action( 'admin_enqueue_scripts', array( $rental_property_calculator, 'assets' ) ); // enqueues the scripts and styles for the admin side of the plugin
	add_action( 'wp_enqueue_scripts', array( $rental_property_calculator, 'assets' ) ); // enqueues the scripts and styles for the frontend side of the plugin
	add_action( 'rest_api_init', array( $rental_property_calculator, 'api' ) ); // initializes the REST API
	register_activation_hook( __FILE__, array( $rental_property_calculator, 'database' ) ); // initializes the database
	add_shortcode( 'rental-property-calculator', array( $rental_property_calculator, 'shortcode' ) ); // adds the plugin shortcode
