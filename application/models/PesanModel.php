<?php
class Pesanmodel extends CI_Model {
	
	private $_table = "tr_pesan";

	public $id;
	public $id_film;
	public $id_jadwal;
    // public $foto = "default.jpg";

	public function rules() {
		return [
			'id' => 'required',
			'id_film' => 'required',
			'id_jadwal' => 'required',
		];
	}

	public function getPesan() {
		$data = $this->db->query("SELECT * FROM ".$this->_table." ORDER BY id_film");
		return $data->result_array();
	}

	public function getPesanById($id) {
		$data = $this->db->query("SELECT * FROM ".$this->_table." WHERE id = '".$id."'");
			// if($data){
		return $data->result_array();
			// } else{
				// return $message = "Error!";
			// }
	}

	public function getPesantemp($id) {
		$data = $this->db->query(
			"SELECT * FROM ".$this->_table."_temp a 
			LEFT JOIN film b 
				ON a.id_film = b.id_film
			LEFT JOIN jadwal c 
				ON a.id_jadwal = c.id_jadwal
			WHERE id = '".$id."'"
		);
			// if($data){
		return $data->result_array();
			// } else{
				// return $message = "Error!";
			// }
	}

	public function getEdittemp($nopesan) {
		$data = $this->db->query(
			"SELECT * FROM ".$this->_table."_temp a 
			LEFT JOIN film b 
				ON a.id_film = b.id_film
			LEFT JOIN jadwal c 
				ON a.id_jadwal = c.id_jadwal
			LEFT JOIN ".$this->_table."_temp_details d
				ON a.no_pesan = d.no_pesan
			WHERE a.id = '".$id."'"
		);
	}

	public function getDetailstemp($nopesan) {
		$data = $this->db->query(
			"SELECT * FROM ".$this->_table."_temp_details WHERE no_pesan = '".$nopesan."'"
		);

		return $data->result_array();
	}

	public function insertPesantemp($data) {
		$this->db->insert($this->_table."_temp", $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function postDeletedetails($id) {
		return $this->db->delete($this->_table."_temp_details", array("id" => $id));
	}

	public function postDeletetemp($no_pesan) {
		$delete = $this->db->delete($this->_table."_temp_details", array("no_pesan" => $no_pesan));
		if($delete){
			return $this->db->delete($this->_table."_temp", array("no_pesan" => $no_pesan));
		}
	}

	public function insertdetailstemp($data){
		$this->db->set($data);
		$this->db->insert($this->_table."_temp_details");
	}

	public function insertPesan($data) {
		$this->db->insert($this->_table, $data);
		$id = $this->db->insert_id();

		return $id;
	}

}