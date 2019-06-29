<?php
	class shortcode {
		private $properties;
		function __construct() { // construct and set the properties to the rental_property_calculator class properties
			$this->properties = func_get_arg(0);
		}
		function render() { // returns the rendered partial for the shortcode
			return do_shortcode( file_get_contents($this->properties['root_dir'] . 'assets/partials/calculator.php') ); // renders the contents of the shortcode partial
		}
	}
