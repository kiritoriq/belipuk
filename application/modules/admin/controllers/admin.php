<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

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
		$this->load->library(array('session', 'form_validation'));
        $this->load->model('query');
        $this->load->helper('url');
    }

	public function index()
	{
		if($this->session->userdata('logged_in')) {
			// $this->load->view('admin/dashboard/index');
			$this->dashboard();
		} else {
			$this->load->view('admin/login/index');
		}
		// $this->load->view('welcome_message');
		// $this->load->view('home');
	}

	public function systemAuth() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login = $this->query->doLogin($username, $password);
			// print_r($login);
			// exit();
			if($this->query->doLogin($username, $password)) {
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<b>Gagal masuk! Username dan Kata Sandi anda salah!</b>');
			}
		} else {
			$this->session->set_flashdata('message', '<strong> Maaf!</strong> Nama Pengguna, Kata Sandi dan Validasi Keamanan harus diisi.');
			redirect('admin');
		}
	}

	function logout() {
		session_destroy();
		$this->session->sess_destroy();
		redirect('admin');
	}

	function set_current($current) {
		if($this->session->userdata('logged_in')) {
			if($current == 'dashboard' OR $current == 'admin') {
				$data['dashboard'] = 'active';
			} else if($current == 'masterproduk') {
				$data['masterproduk'] = 'active';
			} else if($current == 'users') {
				$data['setting'] = 'active';
			} else if($current == 'daftarpesan' OR $current == 'jadwalkirim') {
				$data['transaksi'] = 'active';
			} else if($current == 'laporanpenjualan' OR $current == 'laporanpengadaan' OR $current == 'laporandistribusi') {
				$data['laporan'] = 'active';
			} else {
				$data['dashboard'] = '';
			}
			return $data;
		} else {
			redirect('admin');
		}
	}
	
	function set_subcurrent($subcurrent) {
		if($subcurrent == 'masterproduk') {
			$data['masterproduk'] = 'active';
		} else if($subcurrent == 'users') {
			$data['users'] = 'active';
		} else if($subcurrent == 'daftarpesan') {
			$data['daftarpesan'] = 'active';
		} else if($subcurrent == 'laporanpenjualan') {
			$data['laporanpenjualan'] = 'active';
		} else if($subcurrent == 'laporanpengadaan') {
			$data['laporanpengadaan'] = 'active';
		} else if($subcurrent == 'laporandistribusi') {
			$data['laporandistribusi'] = 'active';
		} else if($subcurrent == 'jadwalkirim') {
			$data['jadwalkirim'] = 'active';
		} else {
			$data['dashboard'] = '';
		}
		return $data;
	}

	function dashboard(){
		if($this->session->userdata('logged_in')) {
			$current = ($this->uri->segment(2)!=null)?$this->uri->segment(2):$this->uri->segment(1);
			// print_r($current);
			// exit();
			$data['current'] = $this->set_current($current);
			$data['main_view'] = 'admin/dashboard/page/maindashboard';
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function masterproduk() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['rs'] = $this->query->getProduk();
			$data['main_view'] = 'admin/dashboard/page/dataproduk';
			// print_r($this->uri->segment(2));
			// exit();
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function tambahproduk() {
		if($this->session->userdata('logged_in')) {
			$this->load->view('admin/dashboard/page/tambahproduk');
		} else {
			redirect('admin');
		}
	}

	function daftarpesan() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['rs'] = $this->query->getPesanan();
			$data['main_view'] = 'admin/dashboard/page/listpesan';
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function detailpesan() {
		if($this->session->userdata('logged_in')) {
			$data['rs'] = $this->query->getDetailpesan($this->input->post('nopesan'));
			$data['rb'] = $this->query->getDetailbarang($this->input->post('nopesan'));
			$this->load->view('admin/dashboard/page/detailpesan', $data);
		} else {
			redirect('admin');
		}
	}

	function konfirmasibayar() {
		if($this->session->userdata('logged_in')) {
			$data['flag_bayar'] = 1;
			$update = $this->db->update("tr_pesan", $data, array("no_pesan" => $this->input->post('nopesan')));
			$pesan = $this->db->get_where("tr_pesan", array('no_pesan' => $this->input->post('nopesan')))->row();
			$insertkonf = $this->db->insert("tr_konfirmasibayar", array(
				"no_pesan" => $this->input->post('nopesan'),
				"tot_bayar" => $pesan->tot_harga,
				"user_id" => $this->session->userdata('user_id'),
				"role_id" => $this->session->userdata('role_id'),
				"created_at" => date('Y-m-d H:i:s'),
			));
			if($this->db->error()['code'] == false) {
				echo "true";
			} else {
				echo "false";
			}
		}else {
			redirect('admin');
		}
	}

	function laporanpenjualan() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['rs'] = $this->query->getPesanan();
			$data['main_view'] = "admin/dashboard/page/laporanpenjualan";
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function jadwalkirim() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['main_view'] = "admin/dashboard/page/listkirim";
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function createkirim() {
		if($this->session->userdata('logged_in')) {
			// $data['current'] = $this->set_current($this->uri->segment(2));
			// $data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			// $data['main_view'] = "admin/dashboard/page/createkirim";
			$data['rs'] = $this->query->getPesanan();
			$this->load->view('admin/dashboard/page/createkirim', $data);
		} else {
			redirect('admin');
		}
	}

	function laporanpengadaan() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['main_view'] = "admin/dashboard/page/laporanpengadaan";
			// $data['rs'] = $this->query->getPesanan();
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function laporandistribusi() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			$data['main_view'] = "admin/dashboard/page/laporandistribusi";
			// $data['rs'] = $this->query->getPesanan();
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}

	function users() {
		if($this->session->userdata('logged_in')) {
			$data['current'] = $this->set_current($this->uri->segment(2));
			$data['subcurrent'] = $this->set_subcurrent($this->uri->segment(2));
			// print_r($data['subcurrent']);
			// exit();
			$data['rs'] = $this->db->query("SELECT a.*, b.role FROM users a INNER JOIN roles b ON a.role_id = b.id ORDER BY a.created_at DESC");
			$data['main_view'] = "admin/dashboard/page/listuser";
			$this->load->view('admin/dashboard/index', $data);
		} else {
			redirect('admin');
		}
	}
	
	function simpanuser() {
		if($this->session->userdata('logged_in')) {
			// $data = $_POST;
			if($this->input->post('edit') == 0) {
				$insert = $this->db->insert('users', array(
					"nama" => $this->input->post('nama'),
					"email" => $this->input->post('email'),
					"role_id" => $this->input->post('role_id'),
					"username" => $this->input->post('username'),
					"password" => md5($this->input->post('password')),
				));
			} else {
				$update = $this->db->update("users", array(
					"nama" => $this->input->post('nama'),
					"email" => $this->input->post('email'),
					"role_id" => $this->input->post('role_id'),
					"username" => $this->input->post('username'),
					"password" => md5($this->input->post('password')),
				), array("id" => $this->input->post('id')));
			}
			if($this->db->error()['code'] == false) {
				echo "true";
			} else {
				echo "false";
			}
		} else {
			redirect('admin');
		}
	}

	function deleteuser() {
		if($this->session->userdata('logged_in')) {
			$del = $this->db->query("DELETE FROM users WHERE id = \"".$this->input->post('id')."\" ");
			if($this->db->error()['code'] == false) {
				echo "true";
			} else {
				echo "false";
			}
		} else {
			redirect('admin');
		}
	}

	function createuser() {
		if($this->session->userdata('logged_in')) {
			$data['cek'] = 0;
			if($this->input->post('edit') == 1) {
				$q = $this->db->query("SELECT a.* FROM users a WHERE a.id = \"".$this->input->post('id')."\"");
				$data['cek'] = $q->num_rows();
				$data['rs'] = $q->row();
			}
			// $data['main_view'] = "admin/dashboard/page/createuser";
			$this->load->view('admin/dashboard/page/createuser', $data);
		} else {
			redirect('admin');
		}
	}

	// function simpanproduk() {
	// 	if($this->session->userdata('logged_in')) {
	// 		$this->form_validation->set_rules('kd_produk', 'Kode Produk', 'required');
	// 		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
	// 		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi Produk', 'required');
	// 		$this->form_validation->set_rules('manfaat', 'Manfaat Produk', 'required');
	// 		if($this->form_validation->run($this) == true) {
	// 			// if(!empty($_FILES['gambar']['name'])) {

	// 			// }
	// 		}
	// 	} else {
	// 		redirect('admin');
	// 	}
	// }
}
