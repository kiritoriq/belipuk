<?php
class Filmmodel extends CI_Model {
	
	private $_table = "film";

	public $id_film;
    public $judul;
    public $sinopsis;
    public $keterangan;
    public $foto = "default.jpg";

	public static $rules = array(
		'id_film' => 'required',
		'judul' => 'required',
		'sinopsis' => 'required',
		'keterangan' => 'required',
		'foto' => 'required'
	);

	public function getFilm() {
		$data = $this->db->query("SELECT * FROM film ORDER BY id_film");
		return $data->result_array();
	}

	public function getFilmById($id) {
		$data = $this->db->query("SELECT * FROM film WHERE id_film = '".$id."'");
			if($data){
				return $data->result_array();
			} else{
				return $message = "Error!";
			}
	}

	public function postInsert() {
		$post = $this->input->post();
		$this->judul = $post['judul'];
		$this->sinopsis = $post['sinopsis'];
		$this->keterangan = $post['keterangan'];
		$this->foto = $post['foto'];
		$this->db->insert($this->_table,$this);
	}

}