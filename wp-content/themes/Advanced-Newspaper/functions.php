<?php
# This theme supports gettext 
function theme_init(){load_theme_textdomain('WpAdvNewspaper', get_template_directory() . '/languages');}
add_action ('init', 'theme_init');

# This theme has support for custom background
add_custom_background(); 

#this theme support post thumbnails
add_theme_support('post-thumbnails');

#This theme supports custom navigation
if ( function_exists('wp_nav_menu') ) { 
	register_nav_menus( array(
		'masthead' => __( 'Masthead Navigation', 'transcript' ),
		'Header_Category_Nav' => __( 'Category bar on header', 'transcript' ),
		'Header_Page_Nav' => __( 'Page list on header', 'transcript' ),
		'Footer_Cat_Nav' => __( 'Category list on footer', 'transcript' ),
		'Footer_Page_Nav' => __( 'Page list on footer', 'transcript' ),
	) );
}

# Define Includes Path */
$gab_includes = TEMPLATEPATH . '/includes/';

# Load theme Javascripts into the wp_head
require_once ($gab_includes . 'theme-js.php');

# Register widget zones
require_once ($gab_includes . 'register-widget-zones.php');

# Theme Functions
require_once ($gab_includes . 'theme-functions.php');

# Theme Control Panel
/* commented out to use file from child theme 
require_once ($gab_includes . 'theme-control-panel.php');
*/

# Load customized comments template
require_once ($gab_includes . 'theme-comments.php');

# Load theme thumbnails
require_once ($gab_includes . 'theme-thumbnails.php');

# Load theme variables
require_once ($gab_includes . 'theme-variables.php');

?>
