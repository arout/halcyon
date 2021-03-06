<?php
/*
 * An open source application development framework for PHP 5.5 or newer
 *
 * @package         Halcyon Framwework
 * @author          Andrew Rout [ arout@kwfusion.com ]
 * @copyright       Copyright (c) 2015, Andrew Rout
 * @license         http://kwfusion.com/support/license
 * @link            http://kwfusion.com
 * @since           Version 1.0
 *
 */

# Edit to match your time zone
date_default_timezone_set('America/New_York');

# Define the path to the front controller (this file)
define('BASE_PATH', dirname(__FILE__) . '/');

# Load directory definitions
require_once BASE_PATH . 'app/code/core/system/Paths.php';

# Get Composer autoloader
require_once VENDOR_PATH . 'autoload.php';
require_once VENDOR_PATH . 'raveren/kint/Kint.class.php';

# Pimple dependency injection
if (!class_exists('Pimple\Container')) {
	require_once VENDOR_PATH . 'pimple/pimple/src/Pimple/Container.php';
	require_once VENDOR_PATH . 'pimple/pimple/src/Pimple/ServiceProviderInterface.php';
}

# Get core system files
require_once SYSTEM_PATH . 'Hal.php';
$app['session']->start();

# Turn error reporting on / off
$hal->set_reporting('on');

# Off we go
if ($hal->config->setting('compression') === FALSE) {
	ob_start();
} else {
	# Use zlib for output compression
	ini_set('zlib.output_compression', 4096);
	ini_set('zlib.output_compression_level', "-1");
	ob_start();
}
# $hal['opcache']->configuration();
# $hal['memcached']->set('test', 'test data');

$hal->core['template']->header($app);

if ($hal->config->setting('maintenance_mode') === FALSE) {
	$hal->core['controller']->dispatch($app);
} else {
	require_once 'maintenance.php';
}

$hal->core['template']->footer($app);
