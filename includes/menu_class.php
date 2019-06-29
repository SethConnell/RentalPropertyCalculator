<?php
	class page {
		private $properties;
		function __construct() { // construct and set the properties to the rental_property_calculator class properties
			$this->properties = func_get_arg(0);
		}
		function register_menu() { // register the menu in the sidebard of the WordPress admin dashboard
			add_menu_page( $this->properties['page_title'], $this->properties['menu_title'], 'manage_options', $this->properties['menu_slug'], array( $this, 'admin_page' ) );
		}
		function admin_page() { // this function outputs the html for the admin side of the plugin
			$content = do_shortcode( file_get_contents($this->properties['root_dir'] . 'assets/partials/admin-content.php') ); // renders the contents of the admin-content partial into a variable
			?>
			<div class="container p-l-0 p-r-20"><!-- this is the main container for the admin side of the plugin. It uses the bootstrap container and the sizer classes used to remove padding from the left but add padding to the right. This creates an evenly sized area for the admin side of the plugin -->
				<?php echo $content ?> <!-- echo the rendered content variable onto the page -->
			</div>
		<?php }
	}
?>
