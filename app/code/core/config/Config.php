<?php
namespace Hal\Config;

class Config {

	public $setting = [];
	protected $db;

	public function __construct() {

		//** Global website settings **//

		# Database Connection
		$this->setting['db_host'] = "localhost";
		$this->setting['db_name'] = "database";
		$this->setting['db_user'] = "db_username";
		$this->setting['db_pass'] = "db_password";

		# Define default controller
		# Enter the file name of you controller, without the .php extension
		$this->setting['default_controller'] = 'Home_Controller';

		# Define the site name
		$this->setting['site_name'] = 'Halcyon Framework';

		# Does your website/company have a tagline or slogan?
		$this->setting['site_slogan'] = 'MVC Framework for PHP 5.5+';

		# Customer service or support email address
		$this->setting['site_email'] = 'arout@kwfusion.com';

		# Site admin name
		$this->setting['site_admin'] = 'Customer Care';

		# Address
		$this->setting['street_address'] = '8 N. Queen St., 9th Floor';
		$this->setting['city']           = 'Lancaster';
		$this->setting['state']          = 'Pa';
		$this->setting['zipcode']        = '17331';

		# Phone
		$this->setting['telephone'] = '(717) 316-9385';

		# Name of the directory storing template files ( css/js/img, etc. )
		$this->setting['template_name'] = 'dealership';

		# Enable / disable breadcrumb links
		$this->setting['breadcrumbs'] = TRUE;

		# Put site in maintenance mode
		$this->setting['maintenance_mode'] = FALSE;

		/**
		 * Gzip compression
		 * Set to true to enable compression, false to disable
		 *
		 * If you get a blank page when compression is enabled,
		 * it means that you are putting out content before the page
		 * has begun loading.
		 *
		 * Nothing can be sent to the browser before compression begins,
		 * even blank spaces.
		 */
		$this->setting['compression'] = TRUE;

		/**
		 * Two step login process (i.e., should simple math problem be solved
		 * in addition to username / password?)
		 */
		$this->setting['login_math'] = TRUE;

		/*----------------------------------------
		 * Image gallery settings
		---------------------------------------*/
		$this->setting['total_img_allowed'] = 10;
		# Maximum allowed image file size in kb ( 1024kb is equal to 1MB )
		$this->setting['img_file_size'] = 1024;
		# Maximum image height in pixels. Set to zero for unlimited
		$this->setting['img_height'] = 0;
		# Maximum image width in pixels. Set to zero for unlimited
		$this->setting['img_width'] = 0;
		# Allowed image types
		$this->setting['img_type'] = ['jpg', 'jpeg', 'gif', 'png'];

		/*----------------------------------------
		 * Global messenger inbox settings
		---------------------------------------*/
		# Enable the messenger system by setting this to true
		$this->setting['inbox_enabled'] = TRUE;

		# Max number of saved messages in inbox
		$this->setting['inbox_limit'] = 100;

		# Allow email addresses to be sent in messages?
		$this->setting['inbox_allow_email'] = TRUE;

		# Allow URLs to be sent in messages?
		$this->setting['inbox_allow_url'] = TRUE;

		# Allow links to be sent in messages?
		$this->setting['inbox_allow_link'] = TRUE;

		# Allow images to be sent in messages?
		$this->setting['inbox_allow_image'] = TRUE;

		# Allow HTML formatting ( <strong>, <em>, <h1>, etc. ) to be sent in messages?
		$this->setting['inbox_allow_formatting'] = TRUE;

		################################################################
		# END OF USER EDITABLE SETTINGS -- DO NOT EDIT BELOW THIS LINE #
		################################################################

		/*----------------------------------------
		 * Global system settings
		---------------------------------------*/
		/**
		 * Define site url here
		 * If you will be using SSL, use relative URLs (i.e., //example.com instead of http://example.com)
		 * NO TRAILING SLASHES AT THE END OF THE URL
		 */
		$uri[]                     = explode('/', $_SERVER["REQUEST_URI"]);
		$this->setting['site_url'] = '//' . $_SERVER["SERVER_NAME"] . '/' . $uri[0][1];

		# Location of front controller
		$this->setting['BASE_PATH'] = BASE_PATH;

		# Location of the system directory
		$this->setting['system_folder'] = $this->setting['BASE_PATH'] . 'vendor/Fusion/System/';

		# Location of the public directory
		$this->setting['public_folder'] = $this->setting['BASE_PATH'] . 'public/';

		# Location of template directory
		$this->setting['template_folder'] = $this->setting['BASE_PATH'] . 'public/template/' . $this->setting['template_name'] . '/';

		# Template URL for fetching CSS / JS / IMG files
		$this->setting['template_url'] = $this->setting['site_url'] . '/public/template/' . $this->setting['template_name'] . '/';

		# Convert image file size setting to kb
		$this->setting['img_size']        = $this->setting['img_file_size'] * 1024;
		$size                             = $this->setting['img_size'];
		$unit                             = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
		$this->setting['notify_img_size'] = number_format(round($size / pow(1024, ($i = floor(log($size, 1024)))), 2)) . ' ' . $unit[$i];

		# Enable / disable Memcached helper
		if (extension_loaded('memcached')) {
			$this->setting['memcached'] = TRUE;
		} else {

			$this->setting['memcached'] = FALSE;
		}

		# Measure script execution time
		$this->setting['execution_time'] = (microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]);

		# Release version
		$this->setting['software_version'] = '1.0.2';
	}

	public final function setting($setting) {

		return $this->setting["$setting"];
	}

}
