<?php

class Lineups_Controller extends Hal\Core\SystemController {

	/**
	 * [__construct description]
	 * @param [object] $container [Instance of Pimple]
	 *
	 * Often, an individual controller will need a constructor.
	 * Below is an example of creating the __construct() for a
	 * given controller.
	 * The $app variable must be passed to the construct method,
	 * and again to the parent::__construct() method call
	 */
	public function __construct($app) {

		parent::__construct($app);

	}

	public function index() {

		$this->load->view('lineups/index');
	}

	public function generate() {
		/*
		$url = $_SERVER['REQUEST_URI'];
		$url = explode("?", $url);
		$url = str_replace("generated=", "", $url);
		 */

		if ($_POST) {

			$qbs  = [];
			$wrs  = [];
			$rbs  = [];
			$tes  = [];
			$flex = [];
			$def  = [];

			if ($_POST['qb1']) {
				$qbs = ['QB1' => $_POST['qb1'], 'QB1 Salary' => $_POST['qb1_salary']];
				// $this->log->save($qbs['QB1'].' $'.$qbs['QB1 Salary'], 'lineups.log');
			}
			if ($_POST['qb2']) {
				$qbs = array_merge($qbs, ['QB2' => $_POST['qb2'], 'QB2 Salary' => $_POST['qb2_salary']]);
			}
			if ($_POST['qb3']) {
				$qbs = array_merge($qbs, ['QB3' => $_POST['qb3'], 'QB3 Salary' => $_POST['qb3_salary']]);
			}
			if ($_POST['qb4']) {
				$qbs = array_merge($qbs, ['QB4' => $_POST['qb4'], 'QB4 Salary' => $_POST['qb4_salary']]);
			}
			if ($_POST['qb5']) {
				$qbs = array_merge($qbs, ['QB5' => $_POST['qb5'], 'QB5 Salary' => $_POST['qb5_salary']]);
			}

			if ($_POST['rb1']) {
				$rbs = ['RB1' => $_POST['rb1'], 'RB1 Salary' => $_POST['rb1_salary']];
			}
			if ($_POST['rb2']) {
				$rbs = array_merge($rbs, ['RB2' => $_POST['rb2'], 'RB2 Salary' => $_POST['rb2_salary']]);
			}
			if ($_POST['rb3']) {
				$rbs = array_merge($rbs, ['RB3' => $_POST['rb3'], 'RB3 Salary' => $_POST['rb3_salary']]);
			}
			if ($_POST['rb4']) {
				$rbs = array_merge($rbs, ['RB4' => $_POST['rb4'], 'RB4 Salary' => $_POST['rb4_salary']]);
			}
			if ($_POST['rb5']) {
				$rbs = array_merge($rbs, ['RB5' => $_POST['rb5'], 'RB5 Salary' => $_POST['rb5_salary']]);
			}
			if ($_POST['rb6']) {
				$rbs = array_merge($rbs, ['RB6' => $_POST['rb6'], 'RB6 Salary' => $_POST['rb6_salary']]);
			}
			if ($_POST['rb7']) {
				$rbs = array_merge($rbs, ['RB7' => $_POST['rb7'], 'RB7 Salary' => $_POST['rb7_salary']]);
			}
			if ($_POST['rb8']) {
				$rbs = array_merge($rbs, ['RB8' => $_POST['rb8'], 'RB8 Salary' => $_POST['rb8_salary']]);
			}

			if ($_POST['wr1']) {
				$wrs = ['WR4' => $_POST['wr4'], 'WR4 Salary' => $_POST['wr4_salary']];
			}
			if ($_POST['wr2']) {
				$wrs = array_merge($wrs, ['WR2' => $_POST['wr2'], 'WR2 Salary' => $_POST['wr2_salary']]);
			}
			if ($_POST['wr3']) {
				$wrs = array_merge($wrs, ['WR3' => $_POST['wr3'], 'WR3 Salary' => $_POST['wr3_salary']]);
			}
			if ($_POST['wr4']) {
				$wrs = array_merge($wrs, ['WR4' => $_POST['wr4'], 'WR4 Salary' => $_POST['wr4_salary']]);
			}
			if ($_POST['wr5']) {
				$wrs = array_merge($wrs, ['WR5' => $_POST['wr5'], 'WR5 Salary' => $_POST['wr5_salary']]);
			}
			if ($_POST['wr6']) {
				$wrs = array_merge($wrs, ['WR6' => $_POST['wr6'], 'WR6 Salary' => $_POST['wr6_salary']]);
			}
			if ($_POST['wr7']) {
				$wrs = array_merge($wrs, ['WR7' => $_POST['wr7'], 'WR7 Salary' => $_POST['wr7_salary']]);
			}
			if ($_POST['wr8']) {
				$wrs = array_merge($wrs, ['WR8' => $_POST['wr8'], 'WR8 Salary' => $_POST['wr8_salary']]);
			}
			if ($_POST['wr9']) {
				$wrs = array_merge($wrs, ['WR9' => $_POST['wr9'], 'WR9 Salary' => $_POST['wr9_salary']]);
			}
			if ($_POST['wr10']) {
				$wrs = array_merge($wrs, ['WR10' => $_POST['wr10'], 'WR10 Salary' => $_POST['wr10_salary']]);
			}

			if ($_POST['te1']) {
				$tes = ['TE4' => $_POST['te4'], 'TE4 Salary' => $_POST['te4_salary']];
			}
			if ($_POST['te2']) {
				$tes = array_merge($tes, ['TE4' => $_POST['te4'], 'TE4 Salary' => $_POST['te4_salary']]);
			}
			if ($_POST['te3']) {
				$tes = array_merge($tes, ['TE4' => $_POST['te4'], 'TE4 Salary' => $_POST['te4_salary']]);
			}
			if ($_POST['te4']) {
				$tes = array_merge($tes, ['TE4' => $_POST['te4'], 'TE4 Salary' => $_POST['te4_salary']]);
			}
			if ($_POST['te5']) {
				$tes = array_merge($tes, ['TE4' => $_POST['te4'], 'TE4 Salary' => $_POST['te4_salary']]);
			}
			if ($_POST['te6']) {
				$tes = array_merge($tes, ['TE4' => $_POST['te4'], 'TE4 Salary' => $_POST['te4_salary']]);
			}

			if ($_POST['def1']) {
				$defs = ['DEF4' => $_POST['def4'], 'DEF4 Salary' => $_POST['def4_salary']];
			}
			if ($_POST['def2']) {
				$defs = array_merge($defs, ['DEF4' => $_POST['def4'], 'DEF4 Salary' => $_POST['def4_salary']]);
			}
			if ($_POST['def3']) {
				$defs = array_merge($defs, ['DEF4' => $_POST['def4'], 'DEF4 Salary' => $_POST['def4_salary']]);
			}
			if ($_POST['def4']) {
				$defs = array_merge($defs, ['DEF4' => $_POST['def4'], 'DEF4 Salary' => $_POST['def4_salary']]);
			}
			if ($_POST['def5']) {
				$defs = array_merge($defs, ['DEF4' => $_POST['def4'], 'DEF4 Salary' => $_POST['def4_salary']]);
			}

			# Unique lineup id (set in hidden field in form)
			$data['lineup_id'] = $_POST['lineup_id'];
			# Salary cap
			$salary_cap = 50000;

			var_dump(array_keys($wrs));

			$data['getplayers'] = $this->model('Lineups')->select();
			$this->load->view('lineups/generated', $data);
		} else {
			$this->load->view('lineups/index', $data);
		}

	}
}