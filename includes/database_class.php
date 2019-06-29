<?php
	class database {
		private $properties;
		function __construct() { // construct and set the properties to the rental_property_calculator class properties
			$this->properties = func_get_arg(0);
		}
		function initialize() { // initialize various parts of the database
			$this->initialize_settings(); // call the function below to initialize the settings in the options table of the site database
			$this->initialize_db(); // call the function below to initialize the custom tables of the plugin into the site database
		}
		function initialize_settings() { // uses the WordPress function to save settings in the database
			add_option( $this->properties['prefix'] . '-test', 'Hello World!' ); // initialized the rpc-test option in the site database. This is just an example of how to create an option
		}
		function initialize_db() { // creates a new table that can be used via the WP REST API to log uses of the calculator
			$name = $this->properties['prefix'] . "-log";
			$statement = "id mediumint(9) NOT NULL AUTO_INCREMENT,
				rpc_date datetime,
				UNIQUE KEY id (id)";
			$this->create_table($name, $statement);
		}
		function create_table($table_name, $statement) { // function to create a db table
			global $wpdb;
			$charset_collate = $wpdb->get_charset_collate();
			$table_name = $wpdb->prefix . $table_name;
			$sql = "CREATE TABLE $table_name (
				$statement
			) $charset_collate;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
