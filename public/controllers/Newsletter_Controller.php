<?php

class Newsletter_Controller extends Fusion\System\SystemController {
	
	
	public function index() {

		if( $this->toolbox('session')->get('email') === FALSE )
			$this->redirect('dashboard/login');

		$this->load->view('newsletter/index');			
	}
	
	public function drafts() {

		$this->load->view('newsletter/drafts');			
	}

	public function process() {

		// Begin form validation by sanitizing all $_POST submitted
		$form = $this->toolbox('sanitize')->xss( $_POST );

		echo '<div class="white-row"><legend>Raw data</legend>'.$_POST['document'].'</div>';
		echo '<div class="white-row"><legend>Remove emails</legend>'.$this->toolbox('sanitize')->remove_email( $_POST['document'] ).'</div>';
		echo '<div class="white-row"><legend>Sanitized data</legend>'.$this->toolbox('sanitize')->allow_format( $_POST['document'], '<a><h1><img><p>' ).'</div>';
		echo '<div class="white-row"><legend>Sanitized form (entire form)</legend>'.$form['document'].'</div>';
		// $this->load->view('newsletter/drafts');			
	}
		
}
