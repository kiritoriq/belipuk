<?php
class Query extends CI_Model {
	
	// public function getFilmAll() {
	// 	$data = $this->db->query("SELECT * FROM film ORDER BY id_film");
	// 	return $data->result();
    // }
    
    public function doLogin($username="", $password="") {
        $q = $this->db->select('a.*, b.role')
            ->from('users as a')
            ->join('roles as b', 'a.role_id = b.id')
            ->where(array('username' => $username, 'password' => md5($password)))->get();
        // $q = $this->db->get_where('users', array('username' => $username, 'password' => md5($password)));
        // return $q->result();
        if($q->num_rows() > 0) {
            $rs = $q->row();
            $newdata = array(
                'logged_in' => true,
                'username' => $rs->username,
                'nama' => $rs->nama,
                'user_id' => $rs->id,
                'role_id' => $rs->role_id,
                'role' => $rs->role,
                'image' => $rs->foto
              );
            $this->session->set_userdata($newdata);
            return true;
        } else {
            return false;
        }
    }

    function tanggalindonesia($date) {
        $x = explode('-', $date);
        $tgl = $x[0];
        $bulan = "";
        $thn = $x[2];
        switch($x[1]) {
          case '01':
            $bulan = 'Januari';
            break;
          case '02':
            $bulan = 'Februari';
            break;
          case '03':
            $bulan = 'Maret';
            break;
          case '04':
            $bulan = 'April';
            break;
          case '05':
            $bulan = 'Mei';
            break;
          case '06':
            $bulan = 'Juni';
            break;
          case '07':
            $bulan = 'Juli';
            break;
          case '08':
            $bulan = 'Agustus';
            break;
          case '09':
            $bulan = 'September';
            break;
          case '10':
            $bulan = 'Oktober';
            break;
          case '11':
            $bulan = 'November';
            break;
          case '12':
            $bulan = 'Desember';
            break;
        }
    
        return $tgl." ".$bulan." ".$thn; 
      }

      function getProduk() {
        $q = $this->db->select('*')
            ->from('ms_produk')->order_by('created_at', 'asc')->get();
        return $q;
      }

      function getPesanan() {
        $q = $this->db->select('*')->from('tr_pesan')->order_by('created_at', 'asc')->get();
        return $q;
      }

      function getDetailpesan($nopesan) {
        $q = $this->db->query("SELECT * FROM tr_pesan WHERE no_pesan = \"".$nopesan."\"");
        return $q;
      }

      function getDetailbarang($nopesan) {
        $q = $this->db->query("SELECT * FROM tr_pesan_detail WHERE no_pesan = \"".$nopesan."\" ");
        return $q;
      }

      function getHargasatuan($kd_produk, $ukuran) {
        $q = $this->db->query("SELECT * FROM ms_produk_detail WHERE kd_produk=\"".$kd_produk."\" AND kemasan=\"".$ukuran."\" ")->row();
        return $q->harga;
      }

      function getSelectrole($name, $pil) {
        $sel = "<select name='$name' id='$name' class='validate[required] form-control'>";
        $sel .= "<option value=''>.:Pilihan:.</option>";
        $q = $this->db->query('SELECT * FROM roles WHERE id NOT IN (1)');
        foreach($q->result() as $item) {
          if($pil == $item->id) {
            $s = 'selected';
          } else {
            $s = '';
          }
          $sel .= "<option value=\"".$item->id."\" ".$s.">".$item->role."</option>";
        }
        $sel .= "</select>";
        return $sel;
      }
    
}