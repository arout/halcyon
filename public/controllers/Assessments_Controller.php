<?php

class Assessments_Controller extends Hal\Core\SystemController {

	// The page being viewed
	private $page;
	// Name of company
	protected $company;
	// Company URL
	protected $url;
	// Consultant
	private $consultant;
	// Creator of assessment
	private $author;
	// Name given to saved form (without extension)
	protected $file_name;
	// File extension
	private $file_extension = '.docx';
	// Storage locations
	private $draft_folder;
	private $completed_folder;

	public function __construct() {

		if (!isset($this->route->param1)) {
			$this->page = "index";
		} else {
			$this->page = $this->route->param1;
		}

		$this->author = $this->toolbox('session')->get('first_name') . ' ' . $this->toolbox('session')->get('last_name');

		$this->draft_folder     = DOCS_DIR . 'assessments/drafts/';
		$this->completed_folder = DOCS_DIR . 'assessments/completed/';

		require_once PLUGINS_DIR . 'phpword/PHPWord.php';
	}

	public function index() {

		$this->view('assessments/index');
	}

	public function edit() {

		// Open file in editor
		$data['content'] = $this->draft_folder . $this->toolbox('session')->get('assessment_file_name');

		$this->view('assessments/editor', $data);
	}

	public function resume() {

		$data['author'] = $this->author;
		// $data[''] = ;
		$this->view('assessments/resume', $data);
	}

	public function save_draft($company, $filename, $time, $name) {

		// Reusable method for saving drafts at any point
		$data['filename'] = $this->toolbox('session')->get('assessment_file_name');
		$data['company']  = $this->toolbox('session')->get('assessment_company');

		if ($this->model('Assessments')->save_draft($this->company, $this->file_name, time(), $this->toolbox('session')->get('first_name') . ' ' . $this->toolbox('session')->get('last_name'))) {
			return TRUE;
		} else {
			$this->view('assessments/drafts/save_error', $data);
		}

	}

	public function tags() {

		if ($_POST) {
			$this->model('Assessments')->create_template_tag(strtoupper('{{ ' . $_POST['tag'] . ' }}'), $_POST['value'], $_POST['descr'], $_POST['document']);
		}

		$data['filename'] = $this->model('Assessments')->get_all_documents();
		$data['tags']     = $this->model('Assessments')->template_tags();
		$this->view('assessments/tags', $data);
	}

	public function wizard() {

		$data['company']        = $this->toolbox('session')->get('assessment_company');
		$data['latency']        = $this->toolbox('Performance')->check_latency($this->toolbox('session')->get('assessment_url'));
		$data['download_speed'] = $this->toolbox('Performance')->check_download_speed($this->toolbox('session')->get('assessment_url'));

		// Load the correct view dynamically
		$this->view("assessments/wizard/$this->page", $data);
	}

	public function process_wizard_form_one() {

		if ($_POST) {

			// Sanitize form
			$form = $this->toolbox('Sanitize')->form($_POST);

			$this->company   = $form['company'];
			$this->url       = $form['url'];
			$this->cosultant = $form['consultant'];

			$this->toolbox('session')->set('assessment_company', $form['company']);
			$this->toolbox('session')->set('assessment_url', $form['url']);

			// We want to assemble the file name here in the following format:
			// Intials_Web_Assess_MMDDYY

			// Get the first letter of each word (including hyphenated/underscored words)
			$corpname = preg_split("/[\s,_ -]+/", $form['company']);
			$initials = "";

			foreach ($corpname as $firstletter) {
				$initials .= $firstletter[0];
			}

			$this->file_name = $initials . '_Web_Assess_' . date("mdY") . $this->file_extension;
			$this->toolbox('session')->set('assessment_file_name', $this->file_name);
			// Now let's create the file
			$file = $this->file_name;

			// Create a new PHPWord Object
			$PHPWord = new PHPWord();

			// Every element you want to append to the word document is placed in a section. So you need a section:
			$section = $PHPWord->createSection();

			// After creating a section, you can append elements:
			$section->addImage(
				'http://www.dynamicartisans.com/area51/public/template/update/assets/images/dynamicartisans-logo-mobi.png',
				array(
					'width'         => 100,
					'height'        => 100,
					'marginTop'     => -1,
					'marginLeft'    => -1,
					'wrappingStyle' => 'behind',
				));
			$section->addTextBreak(1);

			// You can directly style your text by giving the addText function an array:
			$section->addText('sight, sound, color, motion, and emotion.', array('name' => 'Tahoma', 'size' => 12, 'bold' => false));

			// If you often need the same style again you can create a user defined style to the word document
			// and give the addText function the name of the style:
			$PHPWord->addFontStyle('date-style', array('text-align' => 'right', 'size' => 12, 'color' => '1B2232'));
			$section->addText(date("F d, Y"), 'date-style');
			$section->addTextBreak(1);
			$section->addText('Contact:' . $this->company, array('bold' => true)); #$section->addText( $this->company );
			$section->addText('Consultant:' . $form['consultant'], array('bold' => true)); #$section->addText( $form['consultant'] );
			$section->addTextBreak(1);
			$section->addText('We took a moment to assess the website for ' . $this->toolbox('session')->get('assessment_company') . ' and these are the observations and
				recommendations from our web development team: ');

			// You can also putthe appended element to local object an call functions like this:
			//$myTextElement = $section->addText('Hello World!');
			//$myTextElement->setBold();
			//$myTextElement->setName('Verdana');
			//$myTextElement->setSize(22);

			// At least write the document to webspace:
			$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
			$objWriter->save($this->draft_folder . $this->file_name);

			// $this->model('Assessments')->generate_tags( $this->company );
			// Compile form variable tags
			// $this->model('Assessments')->initialize_var_tags( $this->company, $this->url, $form['consultant'], $this->file_name );
			// Track network speeds
			$this->model('Assessments')->network_speed($this->toolbox('Performance')->check_latency_raw($this->toolbox('session')->get('assessment_url')),
				$this->toolbox('Performance')->check_download_speed_raw($this->toolbox('session')->get('assessment_url')), $this->company);

			// Autosave draft
			$this->save_draft($this->company, $this->file_name, time(), $this->author);

			// Saving wizard -- move on two step two
			if ($this->model('Assessments')->wizard_step_one($this->company, $this->url, $form['first_name'], $form['last_name'], $form['consultant'], $this->file_name, $this->author)) {
				$this->redirect('assessments/wizard/server');
			} else {
				throw new Exception('Error processing request');
			}

		}

	}

	public function process_wizard_form_two() {

		// Fetch the DOM extraction class
		require_once PLUGINS_DIR . 'dom_extract.php';
		$html = new simple_html_dom();
		$html->load_file($this->toolbox('session')->get('assessment_url'));
		$style  = $html->find('style');
		$script = $html->find('script');
		$js     = count($script);
		$css    = count($style);

		// Record # of js and css files loaded
		$this->model('Assessments')->scripts($js, $css, $this->toolbox('session')->get('assessment_company'));

		echo '<legend>Number of stylesheets loaded</legend><code>' . $css . '</code><br><br>';
		echo '<legend>Number of javascripts loaded</legend><code>' . $js . '</code><br><br>';

		// Fetch meta tags from URL. Just use PHP's builtin functions for this
		$tags = get_meta_tags($this->toolbox('session')->get('assessment_url'));
		// Notice how the keys are all lowercase now, and
		// how . was replaced by _ in the key.
		// echo $tags['author'];       // name
		echo '<legend>Meta Keywords</legend><code>' . $tags['keywords'] . '</code><br><br>'; // php documentation
		echo '<legend>Meta Description</legend><code>' . $tags['description'] . '</code><br><br>'; // a php manual
		// echo $tags['geo_position']; // 49.33;-86.59

	}
}