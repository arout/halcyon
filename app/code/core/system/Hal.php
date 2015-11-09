<?php
/**
 * file: /vendor/Fusion/System/Init.php
 * System initialization begins here
 *
 * We will use Pimple to create our services
 * and manage dependencies
 */
namespace Hal\Config;

$app = new \Pimple\Container();

$app['router'] = function ($c) {
	\Hal\Core\Registry::register('system/router', 'system/router');
	return new \Hal\Core\Router($c['config']->setting('default_controller'));
};

$app['config'] = function ($c) {
	\Hal\Core\Registry::register('system/config', 'system/config');
	return new Config;
};

$app['core'] = function ($c) {
	\Hal\Core\Registry::register('system/core', 'system/core');
	return new \Hal\Core\Application($c);
};

$app['database'] = function ($c) {
	\Hal\Core\Registry::register('system/database', 'system/database');
	return new Database($c['config']);
};

$app['view'] = function ($c) {
	\Hal\Core\Registry::register('system/view', 'system/view');
	return new \Hal\Core\SystemView;
};

$app['cache'] = function ($c) {
	\Hal\Core\Registry::register('system/cache', 'system/cache');
	return new \Hal\Core\Cache;
};

$app['load'] = function ($c) {
	\Hal\Core\Registry::register('system/load', 'system/load');
	return new \Hal\Core\Loader($c);
};

$app['system_model'] = function ($c) {
	\Hal\Core\Registry::register('system/model', 'system/model');
	return new \Hal\Core\SystemModel($c['database'], $c['toolbox']);
};

$app['template'] = function ($app) {
	\Hal\Core\Registry::register('system/template', 'system/template');
	return new \Hal\Core\Template($app, $data = NULL);
};

$app['log'] = function ($c) {
	\Hal\Core\Registry::register('system/log', 'system/log');
	return new \Hal\Core\Logger();
};

$app['system_controller'] = function ($app) {
	\Hal\Core\Registry::register('system/controller', 'system/controller');
	return new \Hal\Core\SystemController($app);
};

/*********************
 *   Toolbox helpers
 *********************/
$app['breadcrumbs'] = function ($c) {

	\Hal\Core\Registry::register('toolbox/breadcrumbs', 'toolbox/breadcrumbs');
	$bc = new \Hal\Extensions\Breadcrumbs($c['router'], $c['config']);
	$bc->show();
	return $bc;
};

$app['email'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/email', 'toolbox/email');
	return new \Hal\Extensions\Email;
};

$app['formatter'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/formatter', 'toolbox/formatter');
	return new \Hal\Extensions\Formatter;
};

$app['friends'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/friends', 'toolbox/friends');
	return new \Hal\Extensions\Friends($c['database'], $c['toolbox'], $c['system_model']);
};

$app['geoip'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/geoip', 'toolbox/geoip');
	return new \Hal\Extensions\Geoip($c['database']);
};

$app['hash'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/hash', 'toolbox/hash');
	return new \Hal\Extensions\Hash;
};

$app['image'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/image', 'toolbox/image');
	return new \Hal\Extensions\Image($c['config'], $c['toolbox']);
};

$app['input'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/input', 'toolbox/input');
	return new \Hal\Extensions\Input($c['sanitize'], $c['validate']);
};

$app['memcached'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/memcached', 'toolbox/memcached');
	return new Mcached;
	// return $_s->connect();
};

$app['messenger'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/messenger', 'toolbox/messenger');
	return new \Hal\Extensions\Messenger($c['database'], $c['toolbox']);
};

$app['opcache'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/opcache', 'toolbox/opcache');
	return new \Hal\Core\Opcache;
};

$app['pagination'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/pagination', 'toolbox/pagination');
	return new \Hal\Extensions\Pagination($c);
};

$app['performance'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/performance', 'toolbox/performance');
	return new \Hal\Extensions\Performance;
};

$app['sanitize'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/sanitize', 'toolbox/sanitize');
	return new \Hal\Extensions\Sanitize($c['toolbox']);
};

$app['search'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/search', 'toolbox/search');
	return new \Hal\Extensions\Search($c['database']);
};

$app['session'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/session', 'toolbox/session');
	return new \Hal\Core\Session;
};

$app['slider'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/slider', 'toolbox/slider');
	return new \Hal\Toolbox\Slider($c);
};

$app['title'] = function ($c) {

	\Hal\Core\Registry::register('toolbox/title', 'toolbox/title');
	require_once EXTENSIONS_PATH . 'Titlesettings.php';
	$title = new \Hal\Extensions\Title($c['toolbox']);
	# Pass the Titlesettings() function from the included file above to $title->set()
	$title->set(Titlesettings($c));
	return $title;
};

$app['validate'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/validate', 'toolbox/validate');
	return new \Hal\Extensions\Validation;
};

$app['toolbox'] = function ($c) {
	\Hal\Core\Registry::register('toolbox/toolbox', 'toolbox/toolbox');
	// Used to pass the toolbox as a function parameter to other objects
	return $c;
};

$hal = $app['core'];