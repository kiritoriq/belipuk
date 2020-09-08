<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('/header');
		$this->load->view('/navbar');
		$this->load->view('home/carousel');
			$this->load->model('filmmodel');
			$data['item'] = $this->filmmodel->getFilm();
			$this->load->view('home/index',$data);
		$this->load->view('/footer');
	}

	public function about(){
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('about/index');
		$this->load->view('footer');
	}

	public function pesan($id){
		$this->load->view('header');
		$this->load->view('navbar');
			$this->load->model('filmmodel');
			$data['item'] = $this->filmmodel->getFilmById($id);
			$this->load->view('pesan/index', $data);
		$this->load->view('footer');
	}

	public function coba(){
		echo "jancuk";
	}

	public function savepesantemp(){
		$input = array(
			'id' => '',
			'no_pesan' => $this->input->post('no_pesan'),
			'id_film' => $this->input->post('id_film'),
			'id_jadwal' => $this->input->post('id_jadwal'),
		);
		$this->load->model('pesanmodel');
		$pesan = $this->pesanmodel;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$validation = $this->form_validation;
		$validation->set_rules($pesan->rules());
		// if($validation->run()) {
			$idpesan = $pesan->insertPesantemp($input);
			if($idpesan){
				$nopesan = $this->input->post('no_pesan');
				foreach($this->input->post('kursi') as $index=>$kursi){
					$details = array(
						'id' => '',
						'no_pesan' => $this->input->post('no_pesan'),
						'nokursi' => $kursi
					);
					$inputdetails = $pesan->insertdetailstemp($details);	
				}
			$this->konfirmasipesan($idpesan,$nopesan);
			} else{

			echo "Terjadi Kesalahan!";
			}
		// } else{	
		// }
	}

	public function konfirmasipesan($id, $nopesan){
		$this->load->view('header');
		$this->load->view('navbar');
			$this->load->model('pesanmodel');
			$data['item'] = $this->pesanmodel->getPesantemp($id);
			$data['details'] = $this->pesanmodel->getDetailstemp($nopesan);
			$this->load->view('pesan/konfirmasi',$data);
		$this->load->view('footer');
	}

	public function hapusdetail() {
		$id = $this->input->post('id');
		$this->load->model('pesanmodel');
			$delete = $this->pesanmodel->postDeletedetails($id);
			if($delete)
				return 1;
	}

	public function hapuspesan($id) {
		if (!isset($id)) show_404();
        $this->load->model('pesanmodel');
        if ($this->pesanmodel->postDeletetemp($id)) {
            echo "<script> alert('Data Berhasil Dihapus!') </script>";
            $this->index();
        }
	}
}
