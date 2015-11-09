<?php

class Member_Controller extends Hal\Core\SystemController {

	public function __construct($container) {

		parent::__construct($container);

		if ($this->session->get('email') === FALSE && $this->route->action != 'signup' && $this->route->action != 'register') {
			$this->redirect('login');
			exit;
		}
	}

	public function index() {

		$data['session_username'] = $this->toolbox('session')->get('username');
		$this->load->view('member/index', $data);
	}

	public function change_password() {

		if ($_POST) {
			$password = $_POST['password'];
			$cpassword = $_POST['confirm_password'];
			if ($password !== $cpassword) {
				return FALSE;
			}

			$this->model('Member')->update_password($password, $this->toolbox('session')->get('email'));
			$data['status'] = '<div class="alert alert-success text-center">Password successfully updated</div>';
			$this->load->view('forms/change_password', $data);
		} else {
			$this->load->view('forms/change_password');
		}

	}

	public function register() {
		$this->signup();
	}

	public function signup() {

		if ($_POST) {
			$data = $_POST;
		} else {
			$data = NULL;
		}

		$this->load->view('forms/signup_form', $data);
	}

	public function signup_validate() {

		if (!$_POST || empty($_POST)) {
			$this->redirect('member/signup');
		}
		// Begin form validation by sanitizing all $_POST submitted
		$form = $this->toolbox('sanitize')->xss($_POST);

		/**
		 * Now set validation rules for each field.
		 * Pass the sanitized $form variable above
		 * to the function below
		 */
		$check_if_valid = $this->toolbox('validate')->form($_POST, array(

			'username' => 'required|alpha_numeric',
			'password' => 'required|max_len,40|min_len,6',
			'confirm_password' => 'required|contains,' . $_POST['password'] . '',
			'first_name' => 'required|valid_name',
			'last_name' => 'required|valid_name',
			'email' => 'required|valid_email',
			'dob' => 'required',
			'city' => 'required',
			'state' => 'required|exact_len,2',
			'zip' => 'required|numeric|exact_len,5',
			'phone' => 'numeric|exact_len, 10',
		));

		/**
		 * Now validate the form according to the rules set above.
		 * If $check_if_valid is true, form was successfully validated,
		 * so we can go ahead and process the data.
		 * Otherwise, display the errors encountered.
		 */
		if ($check_if_valid === TRUE) {
			// valid submission -- continue
			/*
			if( isset( $form['phone'] ) && ! empty( $form['phone'] ) ) {
			// NOTE THE []; $form must be converted to array
			foreach($form as $form[]) {

			$phone = $this->toolbox('formatter')->PhoneNumber($form['phone']);
			}
			}
			 */
			try {
				$this->model('Member')->create_member($form);
				$this->redirect('member/signup/complete');
			} catch (\Exception $e) {
				//$form['error'] = \Kint::dump($e->getMessage());
				$this->signup();
			}

		} else {
			// Did not pass validation -- Show errors
			echo '<div class="alert alert-danger">';
			foreach ($check_if_valid as $invalid) {
				echo '<i class="fa fa-exclamation-triangle"></i> ' . $invalid . '<br>';
			}

			echo '</div>';
			$this->load->view('forms/signup_form', $data = $form);
		}
	}

	public function edit() {

		# Display edit profile page

		if ($_POST) {
			if ($this->model('Member')->update_profile_data()) {
				$data['saved'] = '<div class="alert alert-success text-center"><i class="fa fa-check"></i> Profile settings saved</div>';
			} else {
				$data['saved'] = '<div class="alert alert-danger text-center"><i class="fa fa-ban"></i> There was a problem saving your profile information</div>';
			}

		}
		$data['username'] = $this->session->get('username');
		$data['profile'] = $this->model('Member')->profile_data($this->session->get('username'));
		$this->load->view('member/edit', $data);
	}

	public function home() {

		$data['session_username'] = $this->toolbox('session')->get('username');
		$data['day'] = ['Monday', 'Tuesday', 'Wednesday'];
		$data['users'] = $this->model('Welcome')->select();
		$this->log->save('Testing logging program', 'member.log');
		// $this->load->file( 'maintenance.php' );
		$this->load->view('member/index', $data);
	}

	public function profile() {

		if (empty($this->route->param1) || $this->route->param1 === $this->session->get('username') || !isset($this->route->param1) || $this->route->param1 == 'edit') {
			$this->edit();
		} else {
			$this->view();
		}
	}

	public function view() {

		$data['username'] = urldecode($this->route->param1);
		$data['profile'] = $this->model('Member')->profile_data($data['username']);
		$data['img_gallery'] = $this->model('Member')->img_gallery($data['username']);

		if (empty($data['username']) || $data['username'] === $this->session->get('username')) {
			$this->edit();
		} else {
			$this->load->view('member/view', $data);
		}

	}
}
