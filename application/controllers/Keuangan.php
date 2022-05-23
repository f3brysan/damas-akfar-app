<?php
 
class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect('login');
        }
        if ($this->session->userdata('level') !== "keuangan") {
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
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/index');
        $this->load->view('keuangan/footer');
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
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/bebaslab/waiting_list');
        $this->load->view('keuangan/footer');
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
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/bebaslab/approved_list');
        $this->load->view('keuangan/footer');
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
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/bebaslab/index-1');
        $this->load->view('keuangan/footer');
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
        $data['belum_lab'] = $this->m_admin->get_laboran_waiting_list($kode,$laboran);
        $data['bebas_lab'] = $this->m_admin->get_laboran_approved_list($kode,$laboran);
        // dump($data);
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/bebaslab/list');
        $this->load->view('keuangan/footer');
    }

    public function hapus_data_bebas_lab()
    {
        $id    = $this->uri->segment(3);
        $kode    = $this->uri->segment(4);
        $where = array('id' => $id);
        $this->m_dosen->hapus_data($where, 'tb_bebas_lab');
        redirect("keuangan/list_lab_yudisum/$kode");
    }

    public function injek_data_bebas_lab()
    {
        // $username = $this->input->post('nim');
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $lab              = $data['get'][0]['jenis'];
        $kode        = $this->input->post('kode');
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
        redirect("keuangan/list_lab_yudisum/$kode");
    }

    public function bebas_spp_yudisum()
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
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/bebasspp/index-1');
        $this->load->view('keuangan/footer');
    }

    public function list_spp_yudisum()
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
        $data['belum_spp'] = $this->m_admin->get_spp_yudisium_list($kode);
        $data['bebas_spp'] = $this->m_admin->get_spp_yudisium_list_allow($kode);
        // dump($data);
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/bebasspp/index');
        $this->load->view('keuangan/footer');
    }

    public function spp_disallow()
    {
        $nim   = $this->uri->segment(3);
        $kode    = $this->uri->segment(4);
        $where = array('nim' => $nim);
        $this->m_dosen->hapus_data($where, 'tb_pembayaran_yudisium');
        redirect("keuangan/list_spp_yudisum/$kode");
    }

    public function spp_allow()
    {
        // $username = $this->input->post('nim');
        // $data['username'] = $this->session->userdata('username');
        // $nidn = $data['username'];
        // $data['get'] = $this->m_dosen->get_data_laboran($nidn);
        // $lab = $data['get'][0]['jenis'];
        $nim    = $this->uri->segment(3);
        $kode    = $this->uri->segment(4);
        $status = 'lolos';
        $create = array(
            'nim'    => $nim,
            'status' => $status,
        );
        // dump($create);
        $this->m_admin->inputakun($create, 'tb_pembayaran_yudisium');
        redirect("keuangan/list_spp_yudisum/$kode");
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
                redirect("keuangan/gantipassword");
            } else {
                if ($newpassword != $newpassword2) {

                    $this->session->set_flashdata('message', 'Maaf Ketikan Ulang Password Anda Berbeda');
                    redirect("keuangan/gantipassword");
                } else {
                    $data = array(
                        'password' => $newpassword,
                    );
                    // dump($data);

                    $res_insert = $this->db->update('tbuser', $data, array('username' => $nidn));
                    $this->session->set_flashdata('message', 'Password Baru Anda Telah Tersimpan');
                    redirect("keuangan/gantipassword");
                }

            }
        }
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/gantipassword');
        $this->load->view('keuangan/footer');
    }

    // DATA PEMBAYARAN
    public function data_pembayaran()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $data['bayar']    = $this->m_admin->getbayar();
        // dump($data['bayar']);
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/masterbayar/bayar');
        $this->load->view('keuangan/footer');
    }
    public function lihat_pembayaran()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $kode             = $this->uri->segment(3);
        $data['kode']     = $kode;
        $data['jumlah']   = $this->m_admin->getjumlahsiswabyangkatan();

        // dump($data['kode']);
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/masterbayar/detailbayar');
        $this->load->view('keuangan/footer');
    }
    public function bayar_angkatan()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['get']      = $this->m_dosen->get_data_laboran($nidn);
        $kode             = $this->uri->segment(3);
        $data['kode']     = $kode;
        $angkatan         = $this->uri->segment(4);
        $data['data']     = $this->m_admin->getdatabykodepembayaran($kode, $angkatan);
        $data['jumlah']   = $this->m_admin->getdatasiswabyangkatan($angkatan, $kode);

        // dump($data['jumlah']);
        $this->load->view('keuangan/navbar', $data);
        $this->load->view('keuangan/masterbayar/detailbayarbyangkatan');
        $this->load->view('keuangan/footer');
    }

    public function permit_krs()
    {
        $tahun  = $this->uri->segment(3);
        $kode   = $this->uri->segment(4);
        $nim    = $this->uri->segment(5);
        $create = array(
            'nim'         => $nim,
            'tahunajaran' => $kode,
        );
        // dump($create);
        $this->m_admin->inputakun($create, 'tbverifikasipembayaran');
        redirect("keuangan/bayar_angkatan/$kode/$tahun");
    }

    public function hapus_verif_mhs()
    {
        $tahun = $this->uri->segment(3);
        $kode  = $this->uri->segment(4);
        $nim   = $this->uri->segment(5);
        $where = array('nim' => $nim);
        $this->m_dosen->hapus_data($where, 'tbverifikasipembayaran');
        redirect("keuangan/bayar_angkatan/$kode/$tahun");
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }

}
