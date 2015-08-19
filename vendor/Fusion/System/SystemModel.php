<?php
namespace Fusion\System;

class SystemModel {
	
	protected $db;
	// Session helper
	// public $session;
	// Data caching helper
	public $cache;
	// Data accessed by views / controllers
	public $data;
	public $session;
	public $hash;
	public $load;
	protected $toolbox;
	
	public function __construct( $db, $_toolbox ) {
	
		$this->db           = $db;
		//$this->load       = $load;
		$this->toolbox 	    = $_toolbox;
		$this->session      = self::session();
		//$this->hash         = self::hash();
		$this->cache        = self::cache();
	}
	
	public function cache() {
		// return \Application::run('Cache');
	}

	public function encrypt( $string ) {

		$hash = new \Fusion\Toolbox\Hash;
		return $hash->encrypt($string);
	}
	
	public function verify($string, $base) {
        
        $hash = new \Fusion\Toolbox\Hash;
		return $hash->verify($string, $base);
	}

	public function session() {

		return $this->toolbox('session');
	}

	public function toolbox($helper) {

		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}

}