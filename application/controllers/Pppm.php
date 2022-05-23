<?php

class Pppm extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('username') == "") {
			redirect('login');
		}
		if ($this->session->userdata('level') !== "pppm") {
			echo "<script>alert('Maaf anda tidak diperkenankan mengakses Halaman ini.');history.go(-1);</script>";
			//redirect('login');
		}
		$this->load->helper('text');
		$this->load->library('pdf');
		$this->load->model('m_admin');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->helper('tanggal');
	}
	public function index() {
		$data['username'] = $this->session->userdata('username');
		$nidn = $data['username'];
		// $data['activesemester'] = $this->m_admin->getbayar();
		// $last = $data['activesemester'][0]['kode'];
		$data['get'] = $this->m_dosen->get_data_laboran($nidn);
		// $data['count'] = $this->m_dosen->countdosennilai($nidn);
		// $data['wali'] = $this->m_dosen->getdatamahasiswadosen($nidn);
		// dump($data);
		$this->load->view('pppm/navbar', $data);
		$this->load->view('pppm/index');
		$this->load->view('pppm/footer');
	}

	public function data_kti_yudisium() {
		$data['username'] = $this->session->userdata('username');
		$nidn = $data['username'];
		$data['get'] = $this->m_dosen->get_data_laboran($nidn);
		$laboran = $data['get'][0]['jenis'];		
		$data['yudisum']  = $this->m_admin->get_data_yudisium();
		// $data['activesemester'] = $this->m_admin->getbayar();
		// $last = $data['activesemester'][0]['kode'];
		// $data['count'] = $this->m_admin->countnilaiterisi($last);
		// $data['count'] = $this->m_dosen->countdosennilai($nidn);		
		// dump($data);
		$this->load->view('pppm/navbar', $data);
		$this->load->view('pppm/yudisium/index');
		$this->load->view('pppm/footer');
	}

	public function waiting_list_kti() {
		$data['username'] = $this->session->userdata('username');
		$nidn = $data['username'];
		$data['get'] = $this->m_dosen->get_data_laboran($nidn);
		$laboran = $data['get'][0]['jenis'];		
		$kode = $this->uri->segment(3);
		// $data['activesemester'] = $this->m_admin->getbayar();
		// $last = $data['activesemester'][0]['kode'];
		// $data['count'] = $this->m_admin->countnilaiterisi($last);
		// $data['count'] = $this->m_dosen->countdosennilai($nidn);
		$data['unapprove_list'] = $this->m_dosen->get_data_kti_pppm_unapprove($kode);
		$data['approve_list'] = $this->m_dosen->get_data_kti_pppm_approve($kode);
		// dump($data);
		$this->load->view('pppm/navbar', $data);
		$this->load->view('pppm/yudisium/data_list');
		$this->load->view('pppm/footer');
	}

	public function unapprove_mhs_kti() {		
		$kode  = $this->uri->segment(3);
        $nim   = $this->uri->segment(4); 
		$where = array('nim' => $nim);
		$this->m_dosen->hapus_data($where, 'tb_bebas_kti');		
		 redirect("pppm/waiting_list_kti/$kode");
	}
	
	public function approve_mhs_kti()
    {
        $kode  = $this->uri->segment(3);
        $nim   = $this->uri->segment(4); 
        $status = "lolos";
        date_default_timezone_set('Asia/Jakarta');       
        $create = array(
            'nim'         => $nim,
            'status' => $status,
            'created_at' => date("Y-m-d H-i-s")
        );
        // dump($create);
        $this->m_admin->inputakun($create, 'tb_bebas_kti');
        redirect("pppm/waiting_list_kti/$kode");
    }

	public function gantipassword() {
		$data['username'] = $this->session->userdata('username');
		$nidn = $data['username'];
		$data['get'] = $this->m_dosen->get_data_laboran($nidn);
		$data['login'] = $this->db->get_where('tbuser', array('username'=> $nidn))->row();
		$truepassword = $data['login'];		
		$getpassword = $truepassword->password;
		$data['hasil'] = array('getpassword' => $getpassword ,'oldpassword' => md5($this->input->post('password', TRUE)),
			'newpassword' => md5($this->input->post('newpassword', TRUE)),
			'newpassword2' => md5($this->input->post('newpassword2', TRUE)) );
		$oldpassword = md5($this->input->post('password', TRUE));
		$newpassword = md5($this->input->post('newpassword', TRUE));
		$newpassword2 = md5($this->input->post('newpassword2', TRUE));
		// dump($data['hasil']);
		if ($this->input->post('submit')) {
			if (strtoupper($oldpassword) != strtoupper($getpassword)) {
				
				$this->session->set_flashdata('message', 'Maaf Password Lama Anda Salah');
				redirect("laboran/gantipassword");
			} else {
				if ($newpassword != $newpassword2 ) {
					
					$this->session->set_flashdata('message', 'Maaf Ketikan Ulang Password Anda Berbeda');
					redirect("laboran/gantipassword");
				}
				else {
					$data = array(
						'password' => $newpassword
					);
				 // dump($data);

					$res_insert = $this->db->update('tbuser', $data, array('username' => $nidn));
					redirect("laboran/gantipassword");
				}

			}
		}
		$this->load->view('laboran/navbar', $data);
		$this->load->view('laboran/gantipassword');
		$this->load->view('laboran/footer');
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}

}
