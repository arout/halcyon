<?php
namespace Hal\Helper;

class Autoload {

	public function __construct( $c ) {
		
		foreach( new \DirectoryIterator(__DIR__) as $file ) {

			if( $file->isFile() ) {
				\Hal\Core\Registry::register('system/helper/'.$file, 'system/helper/'.$file);
				require_once dirname(__FILE__).'/'.$file->getFilename();
		  	}

		}
	}

	public function load( $helper ) {

		$helper = ucwords($helper);

		if( is_readable( dirname(__FILE__).'/'.$helper.'.php' ) ) {

			$helper = "\Hal\Helper\\${helper}";

			if( class_exists( $helper ) )
				return new $helper;
			else
				return \Kint::dump($helper.' helper class could not be loaded. Please make sure the class name matches the file name <em>exactly</em>.');
		}
		else 
			return \Kint::dump($helper.'.php helper file not found or is not readable');
	}

}