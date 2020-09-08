<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('query');
        $this->load->helper('url');
    }

	public function index()
	{
		$data['main_view'] = 'page/home';
        $this->load->view('template/index', $data);
	}

	function pesan() {
        $id = $this->input->post('id');
	}
	
	function pilihkemasan() {
		$kd_produk = $this->input->post('kd_produk');
		$html = $this->query->selectKemasan($kd_produk);
		echo $html;
	}

	function getHargaproduk() {
		$id = $this->input->post('id');
		$harga = $this->query->getHarga($id);
		echo $harga;
	}

	function getNpwp() {
		$uk = $this->input->post('tot_uk');
		if($uk >= 1000) {
			$html = "<div class='col-md-6'>
						<div class=\"form-group\">
						<label>NIK <b>(*)</b>:</label>
							<input type=\"text\" class=\"validate[required, number, maxSize[16]] gaji form-control\" maxlength=\"16\" placeholder=\"contoh: 3374135703070005\" name=\"nik\" required>
						</div>
					</div>
					<div class='col-md-6'>
						<div class=\"form-group\">
						<label>NPWP <b>(*)</b>:</label>
							<input type=\"text\" class=\"validate[required, number, maxSize[16]] gaji form-control\" maxlength=\"16\" placeholder=\"contoh: 092542943407000\" name=\"npwp\" required>
						</div>
					</div>";
		} else {
			$html = "<input type=\"hidden\" name=\"nik\">
					<input type=\"hidden\" name=\"npwp\">";
		}
		echo $html;
	}

	function postPesan() {
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Alamat Email', 'required');
		$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		// $res = array();
		if($this->form_validation->run($this) == true) {
			$data = $_POST;
			// print_r($data);
			// exit();
			$keynot = array("","produk","kemasan","harga","jml","kode_barang","nama_barang","total","ukuran","jumlah","uks","totals");
			$pesan = array();
			foreach($data as $key => $item) {
				if(array_search($key, $keynot) == "") {
					if($key == "totals_ukuran") {
						$pesan['tot_uk'] = $item;
					} else if($key == "totals_tabel") {
						$pesan['tot_harga'] = $item;
					} else if($key == "notelp") {
						$pesan['telp'] = $item;
					} else {
						$pesan[$key] = $item;
					}
				}
			}
			$pesan['no_pesan'] = $this->query->getNopesan();
			$pesan['created_at'] = date('Y-m-d H:i:s');
			$insertpesan = $this->query->insertPesan($pesan);
			// print_r($insertpesan);
			// exit();
			if($insertpesan['status'] == true) {
				if(!empty($this->input->post('kode_barang'))) {
					// $i = 0;
					foreach($this->input->post('kode_barang') as $index => $val) {
						$insert_detail = $this->db->insert("tr_pesan_detail", array(
							"no_pesan" => $pesan['no_pesan'],
							"kd_brg" => $this->input->post('kode_barang')[$index],
							"nama_brg" => $this->input->post('nama_barang')[$index],
							"ukuran" => $this->input->post('ukuran')[$index],
							"jml" => $this->input->post('jumlah')[$index],
							"jml_uk" => $this->input->post('uks')[$index],
							"harga" => $this->input->post('totals')[$index],
							"created_at" => date('Y-m-d H:i:s')
						));
						// $i++;
					}
					if($this->db->error()['code'] == 0) {
						$res = array(
							"status" => true,
							"msg" => "Pemesanan Telah Berhasil",
							"nopesan" => $pesan['no_pesan']
						);
					} else {
						$res = array(
							"status" => false,
							"msg" => "Terjadi Kesalahan, Silahkan Hubungi Admin!"
						);
					}
				}
				echo json_encode($res);
			} else {
				echo json_encode($res = array(
					"status" => false,
					"msg" => "Terjadi Kesalahan, Silahkan Hubungi Admin!"
				));
			}
		} else {

		}
	}

	function invoice() {
		$nopesan = $this->uri->segment(3);
		$data['rs'] = $this->query->getInvoice($nopesan);
		$data['rb'] = $this->query->barangInvoice($nopesan);
		$this->load->view("portal/page/invoice", $data);
	}
}
