<?php
class Tikumodel extends CI_Model {
	
	public function getFilmAll() {
		$data = $this->db->query("SELECT * FROM film ORDER BY id_film");
		return $data->result_array();
	}

	public function getFilmById($id) {
		$data = $this->db->query("SELECT * FROM film WHERE id_film = '".$id."'");
		return $data->result_array();

	}
}