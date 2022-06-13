<?php
/**
 * __pluginname
 *
 * @package __packagename
 * @since 0.1.0
 * @author     laranz
 */

namespace Luna\Pages;

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      0.1.0
 * @package    __packagename
 * @author     laranz
 */
class Dashboard {

	/**
	 * Function to create admin pages.
	 *
	 * @since    0.1.0
	 */
	public function register() {

		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

	}

	/**
	 * Function to create admin pages.
	 *
	 * @since    0.1.0
	 */
	public function add_admin_pages() {
		add_menu_page(
			__( 'Luna Core', '__textdomain' ),
			__( 'Luna Core', '__textdomain' ),
			'manage_options',
			'luna_core_settings',
			array( $this, 'admin_index' ),
			'dashicons-pets',
			3
		);
	}

	/**
	 * Function to create admin pages.
	 *
	 * @since    0.1.0
	 */
	public function admin_index() {
		require_once LUNA_BASE_PATH . '/templates/admin.php';
	}
}
