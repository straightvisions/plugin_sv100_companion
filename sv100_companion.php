<?php
/*
Plugin Name: SV100 Companion
Plugin URI: https://straightvisions.com/
Description: This Plugin increases your PageSpeed even further. It is optimized to work well with our SV100 Theme.
Version: 1.4.00
Author: straightvisions GmbH
Author URI: https://straightvisions.com
Text Domain: sv100_companion
Domain Path: /languages
*/

namespace sv100_companion;

if(!class_exists('\sv_dependencies\init')){
	require_once( 'lib/core_plugin/dependencies/sv_dependencies.php' );
}

if ( $GLOBALS['sv_dependencies']->set_instance_name( 'SV 100 Companion' )->check_php_version() ) {
	require_once( dirname(__FILE__) . '/init.php' );
} else {
	$GLOBALS['sv_dependencies']->php_update_notification()->prevent_plugin_activation();
}