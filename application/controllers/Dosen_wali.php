<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
// START For Import Excel

// END For Import Excel

class Dosen_wali extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect('login');
        }
        if ($this->session->userdata('level') !== "dosen") {
            echo "<script>alert('Maaf anda tidak diperkenankan mengakses Halaman ini.');history.go(-1);</script>";
            //redirect('login');
        }
        $this->load->helper('tanggal');
        $this->load->helper('text');
        $this->load->model('M_admin', 'madmin');
        $this->load->model('m_admin');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_dosen');
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $data['count']    = $this->m_dosen->countdosennilai($nidn);
        $data['wali']     = $this->m_dosen->getdatamahasiswadosen2($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/dosen_wali/index');
        $this->load->view('dosen/footer');
    }

    // KARTU HASIL STUDI
    public function khs_semester($nim)
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $data['semester'] = $this->m_mahasiswa->getkrsbysemester($nim);
        $data['nim']      = $nim;
        // $data['nav'] = $this->db->get_where('tbmahasiswa', array('nim' => $nim))->row();
        // dump($data['semester']);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/dosen_wali/khs');
        $this->load->view('dosen/footer');
    }
    public function khs_detail()
    {
        $kodeselected         = $this->uri->segment(4);
        $nim                  = $this->uri->segment(3);
        $data['username']     = $this->session->userdata('username');
        $nidn                 = $data['username'];
        $data['getdosen']     = $this->m_dosen->getselecteddosen($nidn);
        $data['nav']          = $this->db->get_where('tbmahasiswa', array('nim' => $nim))->row();
        $id                   = $nim;
        $data['mhs']          = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $namamhs              = $data['mhs']->namalengkap;
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $semestermhs          = $this->m_mahasiswa->getsemestermhs($id);
        $getsemestermhs       = $semestermhs['0']['total'];
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        // $data['datakrs'] = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
        $data['tahunajaran'] = $this->db->get_where('tbpembayaran', array('kode' => $kodeselected))->row();
        // $data['pickedkrs'] = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
        $getsemester         = $this->db->query("SELECT * FROM tbpembayaran where jenis = 'semester' ORDER BY id DESC limit 1 ");
        $data['semesternow'] = $getsemester->row();
        // $semesternow = $data['semesternow']->kode;
        $data['totalsks'] = $this->m_mahasiswa->totalsksbysemester($id, $kodeselected);
        // $data['khs'] = $this->m_mahasiswa->getdetailkhs($id, $kodeselected);
        $data['khs'] = $this->m_mahasiswa->getdetailkhsv2($id, $kodeselected);
        // $data['ips'] = $this->m_mahasiswa->getips($id, $kodeselected);
        $data['ips'] = $this->m_mahasiswa->getipsv2($id, $kodeselected);
        // $data['ipk'] = $this->m_mahasiswa->getipk($id, $kodeselected);
        $data['ipk'] = $this->m_mahasiswa->getipkv2($id, $kodeselected);
        $data['sks'] = $this->m_mahasiswa->getipk($id, $kodeselected);
        // $data['getips'] = $data['ips'];
        // dump($data);
        // $this->load->library('pdf');
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/dosen_wali/khs_detail');
        $this->load->view('dosen/footer');

        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "print_krs_'$id'_$namamhs.pdf";
        // $this->pdf->load_view('mahasiswa/cetakkrs', $data);

    }

    public function cetak_khs()
    {
        $kodeselected     = $this->uri->segment(4);
        $data['username'] = $this->session->userdata('username');
        $id               = $this->uri->segment(3);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        // $id = $data['username'];
        $data['mhs']          = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $namamhs              = $data['mhs']->namalengkap;
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $semestermhs          = $this->m_mahasiswa->getsemestermhs($id);
        $getsemestermhs       = $semestermhs['0']['total'];
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        // $data['datakrs'] = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
        $data['tahunajaran'] = $this->db->get_where('tbpembayaran', array('kode' => $kodeselected))->row();
        // $data['pickedkrs'] = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
        $getsemester         = $this->db->query("SELECT * FROM tbpembayaran where jenis = 'semester' ORDER BY id DESC limit 1 ");
        $data['semesternow'] = $getsemester->row();
        $semesternow         = $data['semesternow']->kode;
        $data['totalsks']    = $this->m_mahasiswa->totalsksbysemester($id, $kodeselected);
        $data['khs']         = $this->m_mahasiswa->getdetailkhsv2($id, $kodeselected);
        $data['ips']         = $this->m_mahasiswa->getipsv2($id, $kodeselected);
        $data['ipk']         = $this->m_mahasiswa->getipkv2($id, $kodeselected);
        $data['sks']         = $this->m_mahasiswa->getipk($id, $kodeselected);
        // $data['getips'] = $data['ips'];
        // dump($data);
        $this->load->library('pdf');
        // $this->load->view('mahasiswa/navbar', $data);
        // $this->load->view('mahasiswa/khs/detailkhs');
        // $this->load->view('mahasiswa/footer');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "print_khs_'$id'_'$namamhs'_$kodeselected.pdf";
        $this->pdf->load_view('admin/krs_khs/cetakkhs', $data);

    }

    // Kartu Rencana Studi
    public function krs($nim)
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $id               = $nim;
        $semestermhs      = $this->m_mahasiswa->getsemestermhs($id);
        $getsemester      = $this->db->query("SELECT * FROM tbpembayaran WHERE jenis = 'semester' ORDER BY id DESC limit 1 ");
        $data['cek']      = $getsemester->row();
        $oddeven          = $data['cek']->semester;
        $kodesemester     = $data['cek']->kode;
        $get              = $data['cek']->kode;
        if ($oddeven == "Ganjil") {

            $data['datakrs'] = $this->m_mahasiswa->datakrsodd($id, $kodesemester);
        } else {
            $data['datakrs'] = $this->m_mahasiswa->datakrseven($id, $kodesemester);
        }
        $cek                = $this->db->query("SELECT * FROM tbverifikasipembayaran WHERE nim = '$nim' and tahunajaran = '$get'");
        $data['verifikasi'] = $cek->row();
        $data['nav']        = $this->db->get_where('tbmahasiswa', array('nim' => $nim))->row();
        $data['pickedkrs']  = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
        $data['totalsks']   = $this->m_mahasiswa->totalsksbysemester($id, $kodesemester);
        $data['sks']        = $data['totalsks'][0]['total'];
        $data['nim']        = $nim;
        $data['ajukan_krs'] = $this->db->get_where('tbvalidasikrs', array('nim' => $id, 'tahun_ajaran' => $kodesemester))->row();
        // $data['datakrs'] = $this->m_mahasiswa->getdatakrs($getsemester);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/dosen_wali/krs');
        $this->load->view('dosen/footer');
    }

    public function setujui_krs($nim)
    {
        $token        = $this->randomUID();
        $tahun_ajaran = $this->uri->segment(4);
        $this->m_dosen->setujuikrs($nim, $token, $tahun_ajaran);
        redirect('dosen_wali');
    }

    public function cetak_krs()
    {
        $data['username']     = $this->session->userdata('username');
        $nidn                 = $data['username'];
        $data['getdosen']     = $this->m_dosen->getselecteddosen($nidn);
        $nim                  = $this->uri->segment(3);
        $id                   = $nim;
        $data['mhs']          = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $namamhs              = $data['mhs']->namalengkap;
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $semestermhs          = $this->m_mahasiswa->getsemestermhs($id);
        $getsemestermhs       = $semestermhs['0']['total'];
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        $data['datakrs']      = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
        $getsemester          = $this->db->query("SELECT * FROM tbpembayaran where tbpembayaran.jenis = 'semester' ORDER BY id DESC limit 1 ");
        $data['tahunajaran']  = $getsemester->row();
        $kodesemester         = $data['tahunajaran']->kode;
        $data['pickedkrs']    = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
        $data['totalsks']     = $this->m_mahasiswa->totalsksbysemester($id, $kodesemester);
        $dataValidasi         = $this->db->get_where('tbvalidasikrs', array('nim' => $id, 'tahun_ajaran' => $kodesemester))->row();
        $data['validasi']     = $this->db->get_where('tbvalidasikrs', array('nim' => $id, 'tahun_ajaran' => $kodesemester))->row();
        $ta = $data['validasi']->tahun_ajaran;
        // $data['qrCode'] = new QrCode();
        // $dataValidasi = $getvalidasi->row();
        $data_qr = site_url('cekkrs/') . $dataValidasi->token;

        $this->load->library('ciqrcode');
        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir']  = './uploads/'; //string, the default is application/cache/
        $config['errorlog']  = './uploads/'; //string, the default is application/logs/
        $config['imagedir']  = './uploads/qrcode/'; //direktori penyimpanan qr code
        $config['quality']   = true; //boolean, the default is true
        $config['size']      = '1024'; //interger, the default is 1024
        $config['black']     = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']     = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name = 'qrcode_krs_' . $id . '_' . $kodesemester . '.png';

        $params['data']     = $data_qr; //data yang akan di jadikan QR CODE
        $params['level']    = 'H'; //H=High
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
        $this->ciqrcode->generate($params);
        // dump($data);
        
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "print_krs_'$id'_$namamhs'_'$ta.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('dosen/dosen_wali/krs_cetak', $data);
        // $this->load->view('mahasiswa/cetakkrs', $data);
        // $this->pdf->load_view('mahasiswa/footer');

    }

    public function generateUID()
    {
        $data_siswa = $this->m_dosen->getMhs();
        foreach ($data_siswa as $row_siswa) {
            $token = $this->randomUID();
            $this->m_dosen->generateUID($row_siswa['nim'], $token);
        }
    }

    public function batalkan_krs($nim)
    {
        $tahun_ajaran = $this->uri->segment(4);
        $this->m_dosen->batalkankrs($nim, $tahun_ajaran);
        redirect('dosen_wali');
    }
    
    public function randomUID($length = 10)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
