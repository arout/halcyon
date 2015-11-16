<?php
namespace Hal\Helper;

class Config {

	/*
	 * API key for automobile database
	 * http://edmunds.mashery.com/io-docs
	 */
	static $api_key 		= 'YOUR KEY';
	static $api_secret 	= 'YOUR SECRET';
	/*
	 * API limits
	 */
	static $api_calls_per_sec = 10;
	static $api_calls_per_day = 5000;

	public function __construct() {

	}

}
