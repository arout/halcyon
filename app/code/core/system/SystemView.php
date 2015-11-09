<?php
namespace Hal\Core;

class SystemView {

	public $name;
	public $cache;
	
	public function __construct() {
		
		$this->cache = self::cache();
	}
	
	public function name($file) {

		return $this->name = $file;
		// Data caching helper
	}

	public function cache() {
		
		// return \Application::run('Cache');
	}

}
