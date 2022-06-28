<?php
/**
 * __pluginname
 *
 * A wrapper class for a list of action links displayed for
 * our plugin in the Plugins list table
 *
 * @package __packagename
 * @since 0.1.0
 */

namespace Luna\Base;

/**
 *
 * This class defines all code necessary to to add the
 * action links.
 *
 * @since      0.1.0
 * @package    __packagename
 * @author     laranz
 */
class Plugin_Action_Links {

	/**
	 * This register() runs first during the initialization
	 * of this class in inc\class-init.php.
	 * Consider this as a __constructor.
	 *
	 * @since    0.1.0
	 */
	public function register() {

		add_filter( 'plugin_action_links_' . LUNA_BASENAME, array( $this, 'custom_action_links' ) );

		add_filter( 'plugin_row_meta', array( $this, 'custom_author_near_links' ), 10, 4 );

	}

	/**
	 * Adding custom links for our plugin in the Plugins list table
	 *
	 * @param string[] $links | An array of plugin action links.
	 */
	public function custom_action_links( $links ) {

		// Adding a list of custom links.
		$custom_action_links = array(

			'settings' => '<a href="' . admin_url( 'admin.php?page=luna_core_settings' ) . '" aria-label="' . esc_attr__( 'View Luna Settings', '__textdomain' ) . '">' . esc_html__( 'Settings', '__textdomain' ) . '</a>',

			'addons'   => '<a href="' . admin_url( 'admin.php?page=luna_core_settings' ) . '" aria-label="' . esc_attr__( 'View Add-ons', '__textdomain' ) . '">' . esc_html__( 'Add-ons', '__textdomain' ) . '</a>',

		);

		return array_merge( $links, $custom_action_links );

	}

	/**
	 * Adding custom links near the author name in the Plugins list table
	 *
	 * @param string[] $links | An array of plugin action links.
	 */
	/**
	 * Adding custom links near the author name in the Plugins list table
	 *
	 * @param    string[] $plugin_meta       An array of plugin action links.
	 * @param    string   $plugin_file_name  Path to the plugin file relative to the plugin directory.
	 * @param    array    $plugin_data       An array of plugin data.
	 * @param    string   $status            Status filter currently applied to the plugin list, like "Active", "Inactive", "recently_activated", etc.,.
	 *
	 * @return  string[] $plugin_meta       An array of the plugin's metadata.
	 */
	public function custom_author_near_links( $plugin_meta, $plugin_file_name, $plugin_data, $status ) {
		// Appends the links only if it's our plugin.
		if ( LUNA_BASENAME === $plugin_file_name ) {
			$plugin_name = $plugin_data['Name'];
			/* translators: %s: Plugin name. */
			$aria_label = sprintf( __( 'Sponsor the author who created %s' ), $plugin_name );

			$plugin_meta[] = sprintf(
				'<a href="%1$s" aria-label="%2$s"><span class="dashicons dashicons-money-alt" aria-hidden="true"></span>%3$s</a>',
				esc_url( 'https://github.com/sponsors/laranz' ),
				esc_attr( $aria_label ),
				esc_html_x( 'sponsor', 'verb', '__textdomain' )
			);
		}

		return $plugin_meta;
	}
}
