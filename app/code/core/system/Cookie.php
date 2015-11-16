<?php
namespace Hal\Core;

class Cookie {

	/*--------------------------------------------
	 *	Cookie handling functions
	 *-------------------------------------------*/

	public function set($key, $value, $expires = null, $domain = "/") {

		if (is_null($expires)) {
			$expires = time() + (86400 * 30);
		}

		setcookie($key, $value, $expires, $domain);
	}

	public function delete($key) {

		/**
		 * Delete single item from $_SESSION
		 */
		$data = $_SESSION[$key];
		session_unset($data);
	}

	public function flush() {

		/**
		 * Destroy entire session
		 */

		// Check for session
		self::start();
		//remove all the variables in the session
		$this->id = FALSE;
		session_unset();
		// Destroy
		return session_destroy();
	}

	public function get($key) {

		if (isset($_SESSION["$key"])) {
			return $_SESSION["$key"];
		} else {
			return FALSE;
		}

	}

	public function start() {
		if (empty($this->id)) {
			session_start();
		}

		if (!$this->id || empty($this->id)) {
			$this->id = session_regenerate_id();
		}

	}

	public function verify($key) {

		if (isset($_SESSION[$key])) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

}
