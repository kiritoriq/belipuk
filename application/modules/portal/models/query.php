<?php
class Query extends CI_Model {
	
	function selectProduk($name) {
		$sel = "<select name='$name' id='$name' class='form-control' required>";
		$sel .= "<option value=''>.:Pilihan:.</option>";
		$q = $this->db->select('*')->from('ms_produk')->get();
		foreach($q->result() as $item) {
			$sel .= "<option value=\"".$item->kd_produk."\">".$item->nama."</option>";
		}
		$sel .= "</select>";
		return $sel;
		// $q = $this->db->query("");
	}

	function selectKemasan($kd) {
		$sel = "<select name='kemasan' id='kemasan' class='form-control' required>";
		$q = $this->db->get_where("ms_produk_detail", array("kd_produk" => $kd))->result();
		foreach($q as $item) {
			if($item->kd_produk == 'B001') {
				$uk = 'L';
			} else {
				$uk = 'Kg';
			}
			$kemasan = $item->kemasan." ".$uk;
			$sel .= "<option value=\"".$item->id."\" data-recid=\"".$item->kemasan."\">".$kemasan."</option>";
		}
		$sel .= "</select>";
		return $sel;
	}

	function getHarga($id_kemasan) {
		$rs = $this->db->get_where("ms_produk_detail", array("id" => $id_kemasan))->row();
		return $rs->harga;
	}

	function insertPesan($pesan) {
		$rs = $this->db->insert("tr_pesan", $pesan);
		if($this->db->error()['code'] == 0) {
			$id = $this->db->insert_id();
			$response = array(
				"status" => true,
				"id" => $id
			);
		} else {
			$response = array(
				"status" => false,
				"msg" => $this->db->error()
			);
		}
		return $response;
		// return $this->db->error();
	}

	function getNopesan() {
		$rs = $this->db->query("SELECT CONCAT('PSN',LPAD(IFNULL(MAX(RIGHT(no_pesan,4))+1,1),4,0)) AS kd FROM tr_pesan")->row();
		return $rs->kd;
	}

	function getInvoice($nopesan) {
		$q = $this->db->query("SELECT * FROM tr_pesan WHERE no_pesan = \"".$nopesan."\"");
		return $q;
	}

	function barangInvoice($nopesan) {
		$q = $this->db->query("SELECT * FROM tr_pesan_detail WHERE no_pesan = \"".$nopesan."\" ");
		return $q;
	}

	function getHargasatuan($kd_produk, $ukuran) {
		$q = $this->db->query("SELECT * FROM ms_produk_detail WHERE kd_produk=\"".$kd_produk."\" AND kemasan=\"".$ukuran."\" ")->row();
		return $q->harga;
	}
    
}