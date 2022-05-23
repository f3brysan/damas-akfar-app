<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url', 'language', 'form'));
    }

    public function index()
    {   
        // $this->load->view('maintenance');
        $this->load->view('header');
        $this->load->view('login');
    }

    public function cek_login()
    {
        $data = array('username' => $this->input->post('username', true),
            'password'               => md5($this->input->post('password', true)),
        );
        // dump($data);
        $this->load->model('m_login'); // load model_user
        $hasil = $this->m_login->cek_user($data);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['status']   = 'login';
                $sess_data['id']       = $sess->id;
                $sess_data['username'] = $sess->username;
                $sess_data['level']    = $sess->level;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level') == 'admin') {

                redirect('admin');
            } elseif ($this->session->userdata('level') == 'mahasiswa') {
                redirect('mahasiswa');

            } elseif ($this->session->userdata('level') == 'dosen') {
                redirect('dosen');

            } elseif ($this->session->userdata('level') == 'prodi') {
                redirect('prodi');

            } elseif ($this->session->userdata('level') == 'laboran') {
                redirect('laboran');

            } elseif ($this->session->userdata('level') == 'keuangan') {
                redirect('keuangan');

            } elseif ($this->session->userdata('level') == 'pppm') {
                redirect('pppm');

            } elseif ($this->session->userdata('level') == 'perpus') {
                redirect('perpus');

            }
        } else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }

}
