<?php
/**
 * __pluginname
 *
 * @package __packagename
 * @since 0.1.0
 * @author     laranz
 */

namespace Luna\Pages;

use Luna\Extend\AdminMenu;

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
	 * Storing the AdminMenu instance.
	 *
	 * @var [class instance]
	 */
	public $adminmenu;

	/**
	 * Storing the admin menu page list.
	 *
	 * @var array
	 */
	public $pages = array();

	/**
	 * Storing the admin sub-menu page list.
	 *
	 * @var array
	 */
	public $subpages = array();

	/**
	 * This register() runs first during the initialization
	 * of this class in inc\class-init.php.
	 * Consider this as a __contstructor.
	 *
	 * @since    0.1.0
	 */
	public function register() {
		$this->adminmenu = new AdminMenu();

		$this->set_pages();
		$this->set_sub_pages();

		$this->adminmenu->add_pages( $this->pages )->with_subpage( __( 'General', '__textdomain' ) )->add_subpages( $this->subpages )->register();

	}

	/**
	 * Settings pages.
	 *
	 * @return void
	 */
	public function set_pages() {
		$this->pages = array(
			'Settings Page' => array(
				'page_title' => __( 'Luna Settings', '__textdomain' ),
				'menu_title' => __( 'Luna Settings', '__textdomain' ),
				'capability' => 'manage_options',
				'menu_slug'  => 'luna_settings',
				'callback'   => array( $this, 'render_dashboard_template' ),
				'icon_url'   => 'dashicons-store',
				'position'   => 4,
			),
		);
	}

	/**
	 * Settings Subpages.
	 *
	 * @return void
	 */
	public function set_sub_pages() {
		$this->subpages = array(
			'CPT Settings Page'   => array(
				'parent_slug' => 'luna_settings',
				'page_title'  => __( 'CPT Settings', '__textdomain' ),
				'menu_title'  => __( 'CPT Settings', '__textdomain' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'luna_cpt_settings',
				'callback'    => array( $this, 'render_cpt_template' ),
				'position'    => 1,
			),
			'Block Settings Page' => array(
				'parent_slug' => 'luna_settings',
				'page_title'  => __( 'Blocks Settings', '__textdomain' ),
				'menu_title'  => __( 'Blocks Settings', '__textdomain' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'luna_block_settings',
				'callback'    => array( $this, 'render_block_template' ),
				'position'    => 2,
			),
		);
	}

	/**
	 * Function to call the Dashboard template file.
	 *
	 * @since    0.1.0
	 */
	public function render_dashboard_template() {
		require_once LUNA_BASE_PATH . '/templates/dashboard.php';
	}

	/**
	 * Function to call the CPT Setting page's template file.
	 *
	 * @since    0.1.0
	 */
	public function render_cpt_template() {
		require_once LUNA_BASE_PATH . '/templates/cpt.php';
	}

	/**
	 * Function to call the Block Setting page's template file.
	 *
	 * @since    0.1.0
	 */
	public function render_block_template() {
		require_once LUNA_BASE_PATH . '/templates/block.php';
	}
}
