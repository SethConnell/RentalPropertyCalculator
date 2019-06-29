<?php
	class api {
		private $properties;
		function __construct() { // construct and set the properties to the rental_property_calculator class properties
			$this->properties = func_get_arg(0);
		}
		function register() { // register all the routes
			register_rest_route($this->properties['prefix'], 'settings', array( // creates a RESTful API endpoint for retrieving settings. This route can be accessed at site-url/wp-json/rpc/settings
				'methods' => 'GET', // the method for this endpoint is GET
				'callback' => array( $this, 'get_settings') // specify the callback function for the endpoint
			));
			register_rest_route($this->properties['prefix'], 'settings', array( // creates a RESTful API endpoint for retrieving settings. This route can be accessed at site-url/wp-json/rpc/settings
				'methods' => 'POST', // the method for this endpoint is POST
				'callback' => array( $this, 'update_settings') // specify the callback function for the endpoint
			));
		}
		function get_settings() { // the callback function for the first endpoint registered above
			$settings = get_option($this->properties['prefix'] . '-test'); // pulls the rpc-test entry from the site database. This is just an example of how to pull an option
			return $settings; // return the settings pulled from the database
			// test this once the plugin is installed and activated using PostMan (https://www.getpostman.com/) GET: site-url/wp-json/rpc/settings
			// should return 'Hello World!' as initialized in database_class.php line 12
		}
		function update_settings(WP_REST_Request $request) { // the callback function for the second endpoint registered above
			$settings = $request['test']; // decode the settings passed to this endpoint and put them into a php array
			$status = update_option($this->properties['prefix'] . '-test', $settings); // updates the rpc-test entry in the site database and sets the status variable to the status of the action. This is just an example of how to update an option
			return $status; // return the status of the update action for handling
			// test this once the plugin is installed and activated using PostMan (https://www.getpostman.com/) POST: site-url/wp-json/rpc/settings?test=hello
			// should return true as the status of the update
			// next, test that the value was updated by using PostMan (https://www.getpostman.com/) GET: site-url/wp-json/rpc/settings
			// should return 'hello' or whatever value was appended to the POST url above on line 27
		}
	}

