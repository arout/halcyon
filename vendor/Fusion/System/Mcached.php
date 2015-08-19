<?php
namespace Fusion\System;

/**
 * File: /vendor/Fusion/System/Mcached.php
 * Purpose: Memcached class extension for application caching
 * 
 * Note: Change both instances of \Memcached to \Memcache if
 * memcached is not installed or supported on your server
 */

class Mcached extends \Memcached {
	
        protected $id;
	public $host;
	public $port;
	
	public function __construct() {
			
			/**
			 * check for memcache:  extension_loaded("memcached")
			 *
			 * These are default memcached settings -- they should
			 * work for most users.
			 * If they do not work, try changing localhost to 
			 * 127.0.0.1 or your server IP address. If none of 
			 * those options work, and you are certain memcached
			 * is installed and running, contact your web host;
			 * some webhosts change the default host parameter 
			 * or port
			 */
			parent::__construct();
			$this->host = '127.0.0.1';
			$this->port = '11211';
			$this->addserver($this->host, $this->port);
	}

        
}