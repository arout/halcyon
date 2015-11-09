<?php
class Test_Controller extends Hal\Core\SystemController {

	public function paginate() {

		$data['location'] = $this->model('Welcome')->cities();

		//get the number of rows from our query
		//$count = count($data['location']);

		// URL being paginated
		$url = BASEURL . "test/paginate/";
		// URL segment to track pages
		$url_segment = $this->route->request[2];
		//number of results per page
		$per_page = 20;

		//instantiate the pagination
		if (!isset($pagination)) {
			$pagination = $this->toolbox('pagination');
		}

		$pagination->config($url, $url_segment, $per_page);
		$pagination->paginate($data['location'], 50);

		// Show pagination links
		// $data['paginate'] = $pagination->pagination( $query, $where = NULL, $where_values = NULL, $per_page = 10, $page = 1, $url = '?' );

		$this->load->view('tests/paginate', $data);
	}

	/**
	 * VALIDATION TOOLBOX HELPER TESTS
	 *
	 * Some simple tests to ensure $this->toolbox('validate') works as expected
	 */
	public function validate() {

		if ($_POST) {
			$data['email']    = $this->input('sanitize')->xss($_POST['email']);
			$data['password'] = $this->toolbox('sanitize')->xss($_POST['password']);

			$check_if_valid = $this->toolbox('validate')->form($data,
				[
					'email'    => 'required|valid_email',
					'password' => 'required|max_len,100|min_len,6',
				]
			);

			if ($check_if_valid === TRUE) {
				echo "Success";
			} else {
				echo '<div class="alert alert-danger">';
				foreach ($check_if_valid as $invalid) {
					echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
				}

				echo '</div>';
			}
		} else {
			$data['email']    = $this->input('sanitize')->xss('<h1>My email address</h1>');
			$data['password'] = $this->toolbox('sanitize')->xss('<h1>My password</h1>');
		}
		$this->load->view('tests/validate', $data);
	}

	public function image() {

		if ($_POST) {
			$upload = $this->toolbox('image')->upload($_POST);
			# Error messages
			$data['errors'] = $this->toolbox('image')->errors;
			foreach ($this->toolbox('image')->img as $image) {
				echo $image . '<br>';
			}

		}
		$data['notify_img_size'] = $this->config->setting['notify_img_size'];
		# Number of invalid uploads
		$data['errors_count'] = $this->toolbox('image')->error_count;

		$this->load->view('tests/image', $data);
	}

	public function bc_title() {

		$data['title'] = [

			"Welcome_Controller" => [
				"index" => "Welcome Page",
			],

			"Member_Controller"  => [
				"index"           => "View member profiles on " . $this->config->setting['site_name'] . "",
				"edit"            => "Editing " . $this->session->get('username') . "'s profile on " . $this->config->setting['site_name'] . "",
				"register"        => "Create an account on " . $this->config->setting['site_name'] . "",
				"signup"          => "Create an account on " . $this->config->setting['site_name'] . "",
				"view"            => "Viewing " . $this->route->param1 . "'s profile on " . $this->config->setting['site_name'] . "",
				"change_password" => "Change Password | MVC Framework for PHP 5.5+",
			],

			"Login_Controller"   => [
				"index" => "Login to your account on " . $this->config->setting['site_name'],
			],

			"Test_Controller"    => [
				"bc_title" => "Breadcrumb title testing on " . $this->config->setting['site_name'],
				"image"    => "Image testing on " . $this->config->setting['site_name'],
			],

		];
		foreach ($data['title'] as $segment => $title) {

			if (in_array($segment, [$this->route->controller])) {

				echo $segment . ' was found<br>';

				if (array_key_exists($this->route->action, $title)) {
					echo 'Title is: ' . $title[$this->route->action];
				} else {
					return FALSE;
				}
			}
		}
		$data['route'] = [$this->route->controller];
		$this->load->view('tests/bc_title', $data);
	}

	public function gritter() {

		$this->load->view('tests/gritter');
	}

	/*
}
public function index() {

require_once(PLUGINS_DIR.'google-drive-api/src/Google/Client.php');
require_once(PLUGINS_DIR.'google-drive-api/src/Google/Service.php');

$client = new \Google_Client();
// Get your credentials from the console
$client->setClientId('985655264456-k45madqbedn35ckv48f2prbhhphnttj4.apps.googleusercontent.com');
$client->setClientSecret('oj8WvIxzh0bmgYESM32XKA9X');
$client->setRedirectUri('urn:ietf:wg:oauth:2.0:oob');
$client->setScopes(array('https://www.googleapis.com/auth/drive'));

$service = new Google_Service($client);

$authUrl = $client->createAuthUrl();

//Request authorization
print "Please visit:\n$authUrl\n\n";
print "Please enter the auth code:\n";
$authCode = trim(fgets(STDIN));

// Exchange authorization code for access token
$accessToken = $client->authenticate($authCode);
$client->setAccessToken($accessToken);

//Insert a file
$file = new Google_DriveFile();
$file->setTitle('My document');
$file->setDescription('A test document');
$file->setMimeType('text/plain');

$data = file_get_contents('document.txt');

$createdFile = $service->files->insert($file, array(
'data' => $data,
'mimeType' => 'text/plain',
));

print_r($createdFile);

$this->load->view('tests/index');
}

public function paginate() {
$this->data['location'] = $this->model('welcome')->cities('zips');
$this->load->view('tests/paginate', $this->data);

}

public function xdebug() {
$data['debug'] = 'Debug me';
$data['session_username'] = $this->toolbox('session')->fetch('username');
$this->load->view('tests/xdebug', $data);
}
 */
}
