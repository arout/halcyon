<?php
/**
 * file: /vendor/Fusion/System/Init.php
 * System initialization begins here
 *
 * We will use Pimple to create our services
 * and manage dependencies
 */
namespace Fusion\System;

$container = new \Pimple\Container();

$container['router'] = function ($c) {
	return new Router($c['config']->setting('default_controller'));
};

$container['config'] = function ($c) {
	return new \Fusion\Config\Config;
};

$container['database'] = function ($c) {
	return new \Fusion\Config\Database($c['config']);
};

$container['view'] = function ($c) {
	return new SystemView;
};

$container['cache'] = function ($c) {
	return new Cache;
};

$container['load'] = function ($c) {
	return new Loader($c['database'], $c['toolbox']);
};

$container['system_model'] = function ($c) {
	return new SystemModel($c['database'], $c['toolbox']);
};

$container['template'] = function ($c) {
	return new Template($c, $data = NULL);
};

$container['system_controller'] = function ($container) {
	return new SystemController($container);
};

/*********************
 *   Toolbox helpers
 *********************/
$container['breadcrumbs'] = function ($c) {

	$bc = new \Fusion\Toolbox\Breadcrumbs($c['router'], $c['config']);
	$bc->show();
	return $bc;
};

$container['email'] = function ($c) {
	return new \Fusion\Toolbox\Email;
};

$container['formatter'] = function ($c) {
	return new \Fusion\Toolbox\Formatter;
};

$container['friends'] = function ($c) {
	return new \Fusion\Toolbox\Friends($c['database'], $c['toolbox'], $c['system_model']);
};

$container['geoip'] = function ($c) {
	return new \Fusion\Toolbox\Geoip($c['database']);
};

$container['hash'] = function ($c) {
	return new \Fusion\Toolbox\Hash;
};

$container['image'] = function ($c) {
	return new \Fusion\Toolbox\Image($c['config'], $c['toolbox']);
};

$container['input'] = function ($c) {
	return new \Fusion\Toolbox\Input($c['sanitize'], $c['validate']);
};

$container['memcached'] = function ($c) {
	return new Mcached;
	// return $_s->connect();
};

$container['messenger'] = function ($c) {
	return new \Fusion\Toolbox\Messenger($c['database'], $c['toolbox']);
};

$container['opcache'] = function ($c) {
	return new Opcache;
};

$container['pagination'] = function ($c) {
	return new \Fusion\Toolbox\Pagination($c);
};

$container['performance'] = function ($c) {
	return new \Fusion\Toolbox\Performance;
};

$container['sanitize'] = function ($c) {
	return new \Fusion\Toolbox\Sanitize($c['toolbox']);
};

$container['search'] = function ($c) {
	return new \Fusion\Toolbox\Search($c['database']);
};

$container['session'] = function ($c) {
	return new Session;
};

$container['title'] = function ($c) {

	require_once (VENDOR_PATH.'Fusion/Toolbox/Titlesettings.php');
	$title = new \Fusion\Toolbox\Title($c['toolbox']);
	# Pass the Titlesettings() function from the included file above to $title->set()
	$title->set(Titlesettings($c));
	return $title;
};

$container['validate'] = function ($c) {
	return new \Fusion\Toolbox\Validation;
};

$container['toolbox'] = function ($c) {
	// Used to pass the toolbox as a function parameter to other objects
	return $c;
};
