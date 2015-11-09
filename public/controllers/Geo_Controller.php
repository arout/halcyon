<?php

class Geo_Controller extends Hal\Core\SystemController {

	public function index() {

		$p = $this->toolbox("pagination");

		$url_segment = (int) (empty($this->route->request[2]) ? 1 : $this->route->request[2]);
		$per_page    = 10;
		# Optional; send to paginate()
		$adjacent_links = 3;

		# Table being queried; needed to count results
		$table = "zips";

		//count records
		$sql = "SELECT DISTINCT citycode, statecode FROM {$table} ORDER BY citycode ASC";
		$p->config($sql, $url_segment, $per_page);

		$query = $this->db->prepare("{$sql} LIMIT {$p->startpoint}, {$per_page}");
		$query->execute();

		foreach ($query as $row) {
			// Send results to view file
			$data['location'][] = $row;
		}

		$data['pagination_links'] = $p->paginate($adjacent_links);

		$this->load->view('geo/index', $data);
	}

	public function all_cities() {

		// $get_cities = $this->model('Geoip')->get_all_cities();
		$this->model('Geoip')->get_all_cities();
		echo $this->cache()->get('cities');

	}

}
