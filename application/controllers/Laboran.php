<?php

class Laboran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect('login');
        }
        if ($this->session->userdata('level') !== "laboran") {
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
    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        // $data['activesemester'] = $this->m_admin->getbayar();
        // $last = $data['activesemester'][0]['kode'];
        $data['get'] = $this->m_dosen->get_data_laboran($nidn);
        // $data['count'] = $this->m_dosen->countdosennilai($nidn);
        // $data['wali'] = $this->m_dosen->getdatamahasiswadosen($nidn);
        // dump($data);
        $this->load->view('laboran/navbar', $data);
        $this->load->view('laboran/index');
        $this->load->view('laboran/footer');
    }

    public function bebas_lab_waiting_list()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $laboran          = $data['get'][0]['jenis'];
        // $data['activesemester'] = $this->m_admin->getbayar();
        // $last = $data['activesemester'][0]['kode'];
        // $data['count'] = $this->m_admin->countnilaiterisi($last);
        // $data['count'] = $this->m_dosen->countdosennilai($nidn);
        $data['bebas_lab'] = $this->m_admin->get_laboran_waiting_list($laboran);
        // dump($laboran);
        $this->load->view('laboran/navbar', $data);
        $this->load->view('laboran/bebaslab/waiting_list');
        $this->load->view('laboran/footer');
    }

    public function bebas_lab_approved_list()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $laboran          = $data['get'][0]['jenis'];
        // $data['activesemester'] = $this->m_admin->getbayar();
        // $last = $data['activesemester'][0]['kode'];
        // $data['count'] = $this->m_admin->countnilaiterisi($last);
        // $data['count'] = $this->m_dosen->countdosennilai($nidn);
        $data['bebas_lab'] = $this->m_admin->get_laboran_approved_list($laboran);
        // dump($laboran);
        $this->load->view('laboran/navbar', $data);
        $this->load->view('laboran/bebaslab/approved_list');
        $this->load->view('laboran/footer');
    }

    public function bebas_lab_yudisum()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $laboran          = $data['get'][0]['jenis'];
        $data['yudisum']  = $this->m_admin->get_data_yudisium();
        // $data['activesemester'] = $this->m_admin->getbayar();
        // $last = $data['activesemester'][0]['kode'];
        // $data['count'] = $this->m_admin->countnilaiterisi($last);
        // $data['count'] = $this->m_dosen->countdosennilai($nidn);
        // dump($data);
        $this->load->view('laboran/navbar', $data);
        $this->load->view('laboran/bebaslab/index-1');
        $this->load->view('laboran/footer');
    }

    public function list_lab_yudisum()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $laboran          = $data['get'][0]['jenis'];
        $kode             = $this->uri->segment(3);
        // $data['activesemester'] = $this->m_admin->getbayar();
        // $last = $data['activesemester'][0]['kode'];
        // $data['count'] = $this->m_admin->countnilaiterisi($last);
        // $data['count'] = $this->m_dosen->countdosennilai($nidn);
        $data['belum_lab'] = $this->m_admin->get_laboran_waiting_list($kode, $laboran);
        $data['bebas_lab'] = $this->m_admin->get_laboran_approved_list($kode, $laboran);
        // dump($data);
        $this->load->view('laboran/navbar', $data);
        $this->load->view('laboran/bebaslab/list');
        $this->load->view('laboran/footer');
    }

    public function hapus_data_bebas_lab()
    {
        $id    = $this->uri->segment(3);
        $kode  = $this->uri->segment(4);
        $where = array('id' => $id);
        $this->m_dosen->hapus_data($where, 'tb_bebas_lab');
        redirect("laboran/list_lab_yudisum/$kode");
    }

    public function injek_data_bebas_lab()
    {
        // $username = $this->input->post('nim');
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $lab              = $data['get'][0]['jenis'];
        $kode             = $this->input->post('kode');
        date_default_timezone_set('Asia/Jakarta');  

        $create = array(
            'nim'        => $this->input->post('nim'),
            'status'     => $this->input->post('status'),
            'catatan'    => $this->input->post('catatan'),
            'jenis_lab'  => $lab,
            'approve_by' => $nidn,
            'approve_at' => date("Y-m-d H:i:s"),
        );
        // dump($create);
        $this->m_admin->inputakun($create, 'tb_bebas_lab');
        redirect("laboran/list_lab_yudisum/$kode");
    }

    public function gantipassword()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $data['login']    = $this->db->get_where('tbuser', array('username' => $nidn))->row();
        $truepassword     = $data['login'];
        $getpassword      = $truepassword->password;
        $data['hasil']    = array('getpassword' => $getpassword, 'oldpassword' => md5($this->input->post('password', true)),
            'newpassword'                           => md5($this->input->post('newpassword', true)),
            'newpassword2'                          => md5($this->input->post('newpassword2', true)));
        $oldpassword  = md5($this->input->post('password', true));
        $newpassword  = md5($this->input->post('newpassword', true));
        $newpassword2 = md5($this->input->post('newpassword2', true));
        // dump($data['hasil']);
        if ($this->input->post('submit')) {
            if (strtoupper($oldpassword) != strtoupper($getpassword)) {

                $this->session->set_flashdata('message', 'Maaf Password Lama Anda Salah');
                redirect("laboran/gantipassword");
            } else {
                if ($newpassword != $newpassword2) {

                    $this->session->set_flashdata('message', 'Maaf Ketikan Ulang Password Anda Berbeda');
                    redirect("laboran/gantipassword");
                } else {
                    $data = array(
                        'password' => $newpassword,
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

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }

}
