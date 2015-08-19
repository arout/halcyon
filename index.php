<?php
/**
 *
 * An open source application development framework for PHP 5.5 or newer
 *
 * @package         kW Fusion
 * @author          Andrew Rout [ arout@kwfusion.com ]
 * @copyright       Copyright (c) 2014, Andrew Rout
 * @license         http://kwfusion.com/support/license
 * @link            http://kwfusion.com
 * @since           Version 1.0
 * @filesource
 *
 */

/**
 * Let's build a website!
 *
 * Set Error Reporting environment here.
 * Default options are essentially "ON / OFF". We will display all errors / notices
 * to help us along during the development,
 * but be sure to set error reporting to FALSE in a live environment.
 *
 */

// Edit to match your time zone
date_default_timezone_set('America/New_York');

// Turn error reporting off by setting this value to FALSE
define('DEBUG', TRUE);

if ( defined('DEBUG') )
{
    switch (DEBUG)
    {
        case TRUE:
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
            break;

        case FALSE:
            error_reporting(0);
            ini_set('display_errors', '0');
            break;

        default:
            exit("The debugging environment is not set correctly. Edit the index.php file
            ( location: <code>".__FILE__."</code> ) and set <code>define('DEBUG', TRUE)</code> to either TRUE or FALSE");
    }
}

# Global classes, provides failsafe for un-namespaced
use \PDO as PDO;
use \Memcache as Memcache;
use \Memcached as Memcached;
use Fusion\System;
use Fusion\Config;
use Fusion\Toolbox;
use Pimple\Container;

/**
 * Define the path to the front controller (this file)
 */
define('BASEPATH', dirname(__FILE__).'/');

/**
 * Define the path to vendors
 */
define('VENDOR_PATH', BASEPATH.'vendor/');

/**
 * Define the path to Fusion dir
 */
define('FUSION_PATH', BASEPATH.'vendor/Fusion/');

/**
 * Define path to System
 */
define('SYSTEM_PATH', VENDOR_PATH.'Fusion/System/');

/**
 * Define path to Toolbox dir
 */
define('TOOLBOX_PATH', VENDOR_PATH.'Fusion/Toolbox/');

// Load directory definitions
require_once(SYSTEM_PATH.'Paths.php');
// Get Composer autoloader
require_once(VENDOR_PATH.'autoload.php');
// Pimple dependency injection
require_once(VENDOR_PATH.'pimple/pimple/src/Pimple/Container.php');
require_once(VENDOR_PATH.'pimple/pimple/src/Pimple/ServiceProviderInterface.php');
// Fetch autoloader
// require_once(SYSTEM_PATH.'Autoload.php');

/*------------------------------------------------------------------------------------------
 * When adding your own files to autoload, append it to the end of array
 * Example:  autoload__application(  array( 'Filename_of_your_helper', 'another_custom_file' ) );
 * Please note that the below autoloaders do not implement lazy loading --
 * your files will be loaded into the application whether a script needs it or not
 * Uncomment below and insert your custom _application helpers to be loaded
 ------------------------------------------------------------------------------------------*/
// autoload__application( array( 'Email' ) );

/**
 * Off we go
 */
require_once(SYSTEM_PATH.'Init.php');

if( $container['config']->setting('compression') === FALSE )
    ob_start();
else {
    // Use zlib for output compression
    ini_set('zlib.output_compression', 4096);
    ini_set('zlib.output_compression_level', "-1");
    ob_start();
}
session_start();

// $container['opcache']->configuration();
// $container['memcached']->set('test', 'test data');

$container['template']->header( $container );

if( $container['config']->setting('maintenance_mode') === FALSE )
    $container['system_controller']->dispatch( $container );
else
    require_once('maintenance.php');

$container['template']->footer( $container );
