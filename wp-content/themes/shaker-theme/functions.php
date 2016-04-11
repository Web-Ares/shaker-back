<?php

// Define PHP file constants.
define( 'TEMPLATEINC', TEMPLATEPATH . '/inc' );
define( 'TEMPLATEURI', get_template_directory_uri() );

show_admin_bar( false );
// Load library files.
require_once( TEMPLATEINC . '/shortcodes.php' );
require_once( TEMPLATEINC . '/cpt.php' );
require_once( TEMPLATEINC . '/template.php' );
require_once( TEMPLATEINC . '/actions.php' );
require_once( TEMPLATEINC . '/widget.php' );
require_once( TEMPLATEINC . '/limitedart.php' );
require_once( TEMPLATEINC . '/curations.php' );
