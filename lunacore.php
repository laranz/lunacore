<?php
/**
 * __pluginname
 *
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @package           __packagename
 * @author            laranz
 *
 * @wordpress-plugin
 * Plugin Name:       Luna Core
 * Plugin URI:        https://wptitans.com/themes
 * Description:       A plugin to handle everything for the Luna Framework.
 * Version:           0.1.0
 * Author:            laranz
 * Author URI:        https://laranz.in
 * Text Domain:       __textdomain
 */

// If this file is accessed directly, then abort.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You shall not pass.' );
}

/**
 * Defining constants for the plugin.
 */
// Current plugin version.
define( 'LUNA_CORE_VERSION', '0.1.0' );
// Constant for plugin's directory path & URL.
define( 'LUNA_BASE_PATH', plugin_dir_path( __FILE__ ) );
define( 'LUNA_BASE_URL', plugin_dir_url( __FILE__ ) );
// Constant for plugin's basename.
define( 'LUNA_BASENAME', plugin_basename( __FILE__ ) );
// Constant for plugin's assets directory.
define( 'LUNA_ASSETS', plugin_dir_url( __FILE__ ) . 'assets/' );
// Constant for admin views folder path.
define( 'LUNA_VIEWS_ADMIN', plugin_dir_path( __FILE__ ) . 'views/admin/' );


/**
 * Loading the autoloader (Inception) so we can dynamically include
 * the rest of the classes.
 */
require_once LUNA_BASE_PATH . '/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in inc/class-activate.php
 */
function activate_luna_core() {
	Luna\Base\Activate::activator();
}
register_activation_hook( __FILE__, 'activate_luna_core' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in inc/class-deactivate.php
 */
function deactivate_luna_core() {
	Luna\Base\Deactivate::deactivator();
}
register_deactivation_hook( __FILE__, 'deactivate_luna_core' );


/**
 * Run, Forest, Run!
 *
 * Since everything within the plugin is registered in
 * the Init class under ready() function, we can call
 * run() function to initialize all things.
 *
 * @since    0.1.0
 */
if ( class_exists( 'Luna\\Init' ) ) {
	Luna\Init::run();
}
