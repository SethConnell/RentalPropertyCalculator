<?php
	class assets {
		private $properties;
		function __construct() { // construct and set the properties to the rental_property_calculator class properties
			$this->properties = func_get_arg(0);
		}
		function enqueue_admin() { // specify files to enqueue for the admin side of the plugin
			// MAIN SCRIPTS
			wp_enqueue_script( 'bootstrap', $this->properties['root_url'] . 'assets/js/bootstrap.min.js', array('jquery') ); // the bootstrap js file
			// STYLES
			wp_enqueue_style( 'bootstrap', $this->properties['root_url'] . 'assets/css/bootstrap.min.css' ); // the bootstrap css file
			wp_enqueue_style( 'fontawesome', $this->properties['root_url'] . 'assets/css/fontawesome-all.min.css' ); // fontawesome is a collection of symbols and icons
			wp_enqueue_style( 'sizer', $this->properties['root_url'] . 'assets/css/sizer.css' ); // sizer is a collection of css classes used to size elements
			wp_enqueue_style( 'styles', $this->properties['root_url'] . 'assets/css/styles.css' ); // custom styles for the plugin
		}
		function enqueue_frontend() { //specify the files to enqueue for the frontend side of the plugin
			// MAIN SCRIPTS
			wp_enqueue_script( 'bootstrap', $this->properties['root_url'] . 'assets/js/bootstrap.min.js', array('jquery') ); // the bootstrap js file
			wp_enqueue_script( $this->properties['prefix'] . '-app', $this->properties['root_url'] . 'assets/js/app.js', array('jquery') ); // this file is where the main javascript for the plugin belongs
			// STYLES
			wp_enqueue_style( 'bootstrap', $this->properties['root_url'] . 'assets/css/bootstrap.min.css' ); // the bootstrap css file
			wp_enqueue_style( 'fontawesome', $this->properties['root_url'] . 'assets/css/fontawesome-all.min.css' ); // fontawesome is a collection of symbols and icons
			wp_enqueue_style( 'sizer', $this->properties['root_url'] . 'assets/css/sizer.css' ); // sizer is a collection of css classes used to size elements
			wp_enqueue_style( 'styles', $this->properties['root_url'] . 'assets/css/styles.css' ); // custom styles for the plugin
			// LOCALIZE VARIABLES TO THE APP - this adds variables that can be accessed in the main javascript of the plugin. This adds a javascript object called rpc_localized with the following properties: wprest_api_url, plugin_url, and nonce. Add any other WordPress variables that you would like to use
			wp_localize_script( $this->properties['prefix'] . '-app', $this->properties['prefix'] . '_localized',
				array(
					'wprest_api_url' => get_rest_url() . $this->properties['prefix'] . '/', // the url of the REST API
					'plugin_url' => $this->properties['root_url'], // the URL of the root directory of the plugin
					'nonce' => wp_create_nonce( 'wp_rest' ), // nonces must be passed as a
				)
			);
		}
	}

