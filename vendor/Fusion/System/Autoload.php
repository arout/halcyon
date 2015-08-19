<?php

    /*** nullify any existing autoloads ***/
    spl_autoload_register(null, false);

    /*** specify extensions that may be loaded ***/
    spl_autoload_extensions('.php');

    /*** class Loader ***/
    function autoload_system($class) {

    	foreach( $class as $class ) {

	        $file = SYSTEM_PATH . ucwords($class) . '.php';

	        if ( is_readable($file) )
	            include_once $file;
	        else
	        	print(" Could not autoload $file ");
	    }
    }

    function autoload_config($class) {

        foreach( $class as $class ) {

	        $file = FUSION_PATH . 'Config/'. ucwords($class) . '.php';

	        if ( is_readable($file) )
	            include_once $file;
	        else	        
	        	return "Could not autoload $class";
	    }
    }
	
	function autoload_toolbox($class) {

        foreach( $class as $class ) {

	        $file = FUSION_PATH . 'Toolbox/'. ucwords($class) . '.php';

	        if ( is_readable($file) )
	            include_once $file;
	        else
	        	return "Could not autoload the following Toolbox Helper: $class";
	    }
    }
	
    /*** register the loader functions ***/
    spl_autoload_register('autoload_system');
    spl_autoload_register('autoload_config');
    spl_autoload_register('autoload_db');
	spl_autoload_register('autoload_toolbox');