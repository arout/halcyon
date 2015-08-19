<?php
namespace Fusion\System;

/**
 * File:    /vendor/Fusion/System/Logger.php
 * Purpose: Handles system and user-defined event logging
 */

class Logger {

	public function save( $message = NULL, $logfile = 'system.log' ) {

        /**
         * Logging function for both user-defined and system errors
         */
        if( ! is_null( $message ) ) {

	        if( $message instanceof Exception ) {

	            $print_to_file = "EXCEPTION OCCURED\r\nDate\Time: ".date("Y-m-d H:i:s")."\r\n
	            File name: $message->getFile()\r\nLine Number: $message->getLine()\nMessage: $message->getMessage()" . PHP_EOL;

	            $open = fopen( LOG_PATH.$logfile, "ab" );
	            fwrite( $open, $print_to_file );
	            fclose( $open );

	            return true;
	        }
	        else {

	        	$print_to_file = "### Log Entry ###\r\nDate\Time: ".date("Y-m-d H:i:s")."\r\n$message\r\n" . PHP_EOL;

	            $open = fopen( LOG_PATH.$logfile, "ab" );
	            fwrite( $open, $print_to_file );
	            fclose( $open );

	            return true;
	        }

    	}
    	else {
    			$print_to_file = "### NOTICE ###\nDate\Time: ".date("Y-m-d H:i:s")."\n
	            Cannot print a <null> message" . PHP_EOL;

	            $open = fopen( LOG_PATH.$logfile, "ab" );
	            fwrite( $open, $print_to_file );
	            fclose( $open );

	            return false;
    	}
    }

}