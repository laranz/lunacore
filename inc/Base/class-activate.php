<?php
/**
 * __pluginname
 *
 * @package __packagename
 * @since 0.1.0
 */

namespace Luna\Base;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.1.0
 * @package    __packagename
 * @author     laranz
 */
class Activate {

	/**
	 * Fired during plugin activation.
	 *
	 * @since    0.1.0
	 */
	public static function activator() {
		flush_rewrite_rules();
	}

}
