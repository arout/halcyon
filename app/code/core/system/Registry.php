<?php
namespace Hal\Core;

abstract class Registry {

	public static $registry = array();

	/*
	 * Add a new resolver to the registry array.
	 * @param  string $name The id
	 * @param  object $resolve Closure that creates instance
	 * @return void
	 */
	public static function register($name, $resolve) {

		return static::$registry[$name] = $resolve;
	}

	/*
	 * Create the instance
	 * @param  string $name The id
	 * @return mixed
	 */

	public static function run($name) {

		if (static::registered($name)) {

			$name = static::$registry[$name];
			return $name();
		}

		throw new Exception($name . ' not found');
	}

	/**
	 * Determine whether the id is registered
	 * @param  string $name The id
	 * @return bool Whether to id exists or not
	 */
	public static function registered($name) {

		return array_key_exists($name, static::$registry);
	}

}