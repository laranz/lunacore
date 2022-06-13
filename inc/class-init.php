<?php
/**
 * __pluginname
 *
 * The file that defines the core plugin class
 *
 * @package __packagename
 * @since 0.1.0
 */

namespace Luna;

/**
 * The core plugin class, this class act as services.
 *
 * This class defines all code necessary to run all the plugin functionalities.
 *
 * @since      0.1.0
 * @package    __packagename
 * @author     laranz
 */
final class Init {

	/**
	 * Store all the needed classes to be initiated in an array.
	 *
	 * @return array full list of classes.
	 */
	public static function get_services() {
		$classlist = array(
			Pages\Dashboard::class,
		);
		return $classlist;
	}


	/**
	 * Get the class list loop through them and
	 * initiate them, and if it has a "register" function
	 * call it!
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::initiate_class( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initiate all the classes that passed in here.
	 *
	 * @param class $class | class from services array.
	 * @return class | new instance of the class.
	 */
	private static function initiate_class( $class ) {
		return new $class();
	}
}
