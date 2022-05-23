<?php

require 'vendor/autoload.php';
// START For Import Excel

// END For Import Excel

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect('login');
        }
        if ($this->session->userdata('level') !== "admin") {
            echo "<script>alert('Maaf anda tidak diperkenankan mengakses Halaman ini.');history.go(-1);</script>";
            //redirect('login');
        }
        $this->load->helper('text');
        $this->load->library('pdf');
        $this->load->helper('tanggal');
        $this->load->model('m_admin');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_dosen');
    }
    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['angkatan'] = $this->m_admin->getallangkatan();
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }
    public function getmahasiswabyangkatan()
    {
        $data['username'] = $this->session->userdata('username');
        $nim              = $this->uri->segment(3);
        $data['mhs']      = $this->m_admin->getmahasiswabyangkatan($nim);
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/getmahasiswabyangkatan');
        $this->load->view('admin/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }

    public function detilmhs()
    {
        $id                  = $this->uri->segment(3);
        $data['mhs']         = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();
        $data['username']    = $this->session->userdata('username');
        $data['jkl']         = $this->m_admin->getselectedkelamin($id);
        $data['agama']       = $this->m_admin->getselectedagama($id);
        $data['tinggal']     = $this->m_admin->getselecteddom($id);
        $data['jenisdaftar'] = $this->m_admin->getselectedjenisdaftar($id);
        $data['didikayah']   = $this->m_admin->getselecteddidikayah($id);
        $data['didikibu']    = $this->m_admin->getselecteddidikibu($id);
        $data['didikwali']   = $this->m_admin->getselecteddidikwali($id);
        $data['payah']       = $this->m_admin->getselectedpenghasilanayah($id);
        $data['pibu']        = $this->m_admin->getselectedpenghasilanibu($id);
        $data['pwali']       = $this->m_admin->getselectedpenghasilanwali($id);
        $data['kayah']       = $this->m_admin->getselectedproayah($id);
        $data['kibu']        = $this->m_admin->getselectedproibu($id);
        $data['kwali']       = $this->m_admin->getselectedprowali($id);
        $data['aayah']       = $this->m_admin->getselectedagamaayah($id);
        $data['aibu']        = $this->m_admin->getselectedagamaibu($id);
        $data['awali']       = $this->m_admin->getselectedagamawali($id);
        //dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/detilmhs');
        $this->load->view('admin/footer');
    }
    public function cetakdetilmhs()
    {
        $id                  = $this->uri->segment(3);
        $data['mhs']         = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();
        $data['username']    = $this->session->userdata('username');
        $data['jkl']         = $this->m_admin->getselectedkelamin($id);
        $data['agama']       = $this->m_admin->getselectedagama($id);
        $data['tinggal']     = $this->m_admin->getselecteddom($id);
        $data['jenisdaftar'] = $this->m_admin->getselectedjenisdaftar($id);
        $data['didikayah']   = $this->m_admin->getselecteddidikayah($id);
        $data['didikibu']    = $this->m_admin->getselecteddidikibu($id);
        $data['didikwali']   = $this->m_admin->getselecteddidikwali($id);
        $data['payah']       = $this->m_admin->getselectedpenghasilanayah($id);
        $data['pibu']        = $this->m_admin->getselectedpenghasilanibu($id);
        $data['pwali']       = $this->m_admin->getselectedpenghasilanwali($id);
        $data['kayah']       = $this->m_admin->getselectedproayah($id);
        $data['kibu']        = $this->m_admin->getselectedproibu($id);
        $data['kwali']       = $this->m_admin->getselectedprowali($id);
        $data['aayah']       = $this->m_admin->getselectedagamaayah($id);
        $data['aibu']        = $this->m_admin->getselectedagamaibu($id);
        $data['awali']       = $this->m_admin->getselectedagamawali($id);
        //dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/cetakdetilmahasiswa');
        $this->load->view('admin/footer');
    }

    public function injeknim()
    {
        $id   = $this->input->post('id');
        $data = array(
            'nim' => $this->input->post('nim'),
        );
        $this->m_admin->injeknim($data, $id);
        // $username = $this->input->post('nim');
        $password = $this->input->post('nim');
        $create   = array(
            'username' => $this->input->post('nim'),
            'password' => md5($password),
            'level'    => 'mahasiswa',
        );
        //dump($create);
        $this->m_admin->inputakun($create, 'tbuser');
        redirect('admin/getmahasiswabyangkatan/2019');
    }

    //-------------------------------------------UBAH DATA DIRI------------------------------------------------------------I//
    public function edit_data_diri()
    {
        $data['username']    = $this->session->userdata('username');
        $data['agama']       = $this->m_admin->getallagama();
        $data['kelamin']     = $this->m_admin->getallkelamin();
        $data['jenisdaftar'] = $this->m_admin->getalljenisdaftar();
        $id                  = $this->uri->segment(3);
        $data['getmhs']      = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatadiri($id);
            redirect("admin/detilmhs/$id");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/editdatapribadi');
        $this->load->view('admin/footer');
    }

    public function edit_data_tempat_tinggal()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();
        $data['tinggal']  = $this->m_admin->getalljenistinggal($id);
        //dump($id);

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatatempat($id);
            redirect("admin/detilmhs/$id");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/editdataalamat');
        $this->load->view('admin/footer');
    }

    public function edit_data_kontak()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatakontak($id);
            redirect("admin/detilmhs/$id");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/editdatakontak');
        $this->load->view('admin/footer');
    }

    public function edit_data_pendidikan()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatapendidikan($id);
            redirect("admin/detilmhs/$id");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/editdatapendidikan');
        $this->load->view('admin/footer');
    }

    public function edit_data_wali()
    {
        $data['username'] = $this->session->userdata('username');
        $data['didik']    = $this->m_admin->getallpendidikan();
        $data['hasil']    = $this->m_admin->getallpenghasilan();
        $data['profesi']  = $this->m_admin->getallprofesi();
        $data['agama']    = $this->m_admin->getallagama();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatawali($id);
            redirect("admin/detilmhs/$id");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/editdatawali');
        $this->load->view('admin/footer');
    }

    public function edit_data_info()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatainfo($id);
            redirect("admin/detilmhs/$id");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/editdatainfo');
        $this->load->view('admin/footer');
    }
    public function edit_foto()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_admin->edit_foto($id);
            redirect("admin/detilmhs/$id");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/editfoto');
        $this->load->view('admin/footer');
    }
    public function data_dosen()
    {
        $data['username'] = $this->session->userdata('username');
        $data['dosen']    = $this->m_dosen->getalldosen();
        //dump($data['dosen']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterdosen/dosen');
        $this->load->view('admin/footer');
    }
    public function detil_dosen()
    {
        $nidn = $this->uri->segment(3);
        //$data['mhs'] = $this->db->get_where('tbdosen', array('id'=> $id))->row();
        $data['username'] = $this->session->userdata('username');
        $data['dosen']    = $this->m_dosen->getselecteddosen($nidn);
        $data['wali']     = $this->m_dosen->getdatamahasiswadosen($nidn);
        dump($data['wali']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterdosen/detil_dosen');
        $this->load->view('admin/footer');
    }
    public function tambah_data_dosen()
    {
        $data['kelamin']  = $this->m_admin->getallkelamin();
        $data['agama']    = $this->m_admin->getallagama();
        $data['username'] = $this->session->userdata('username');
        if ($this->input->post('sbmt')) {
            $this->m_dosen->adddatadosen();
            redirect('admin/data_dosen');
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterdosen/add_dosen');
        $this->load->view('admin/footer');
    }
    public function edit_data_diri_dosen()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $this->uri->segment(3);
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $data['kelamin']  = $this->m_admin->getallkelamin();
        $data['agama']    = $this->m_admin->getallagama();
        //$data['getdosen'] = $this->db->get_where('tbdosen', array('nidn'=> $nidn))->row();
        //dump(    $data['wali']);

        if ($this->input->post('sbmt')) {
            $this->m_dosen->updatedatadosen($nidn);
            redirect("admin/detil_dosen/$nidn");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterdosen/edit_dosen');
        $this->load->view('admin/footer');
    }
    public function edit_data_wali_dosen()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $this->uri->segment(3);
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        //dump($data['getdosen']);
        $data['wali']  = $this->m_dosen->getdatamahasiswadosen($nidn);
        $data['other'] = $this->m_dosen->getotherdatamahasiswa();
        $data['agama'] = $this->m_admin->getallagama();
        //$data['getdosen'] = $this->db->get_where('tbdosen', array('nidn'=> $nidn))->row();
        //dump(    $data['wali']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterdosen/edit_wali');
        $this->load->view('admin/footer');
    }
    public function add_mahasiswa_to_wali()
    {
        $nim  = $this->uri->segment(3);
        $nidn = $this->uri->segment(4);

        $data['other'] = $this->m_dosen->getselectedmahasiswadosen($nim, $nidn);
        $getdata       = $data['other'];

        foreach ($getdata as $gd) {
            $data = array(
                'nidn' => $gd['nidn'],
                'nim'  => $gd['nim'],
            );
        }
        //dump($data);
        $this->m_dosen->inputdatamahasiswawali($data, 'tbdosenwali');
        redirect("admin/edit_data_wali_dosen/$nidn");
    }
    public function hapus_mahasiswa_from_wali()
    {
        $nidn  = $this->uri->segment(4);
        $id    = $this->uri->segment(3);
        $where = array('id' => $id);
        $this->m_dosen->hapus_data($where, 'tbdosenwali');
        redirect("admin/edit_data_wali_dosen/$nidn");
    }

    // Data Mata Kuliah
    public function data_matkul()
    {
        $data['username'] = $this->session->userdata('username');
        $data['matkul']   = $this->m_dosen->getallmatkul();
        // dump($data['matkul']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/mastermatkul/matkul');
        $this->load->view('admin/footer');
    }
    public function tambah_matkul()
    {
        $data['username'] = $this->session->userdata('username');
        $data['dosen']    = $this->m_dosen->getalldosen();
        if ($this->input->post('sbmt')) {
            $this->m_dosen->addmatkul();
            redirect('admin/data_matkul');
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/mastermatkul/add_matkul');
        $this->load->view('admin/footer');
    }
    public function edit_matkul()
    {
        $data['username']  = $this->session->userdata('username');
        $kode              = $this->uri->segment(3);
        $nidn              = $this->uri->segment(4);
        $data['dosen']     = $this->m_dosen->getotherdosenmatkul($nidn);
        $data['getmatkul'] = $this->m_dosen->getselectedmatkul($kode);
        // dump($data['dosen']);
        if ($this->input->post('sbmt')) {
            $this->m_dosen->updatematkul($kode);
            redirect('admin/data_matkul');
        }
        //$data['getdosen'] = $this->db->get_where('tbdosen', array('nidn'=> $nidn))->row();
        //dump( $data['wali']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/mastermatkul/edit_matkul');
        $this->load->view('admin/footer');
    }

    // DATA PEMBAYARAN
    public function data_pembayaran()
    {
        $data['username'] = $this->session->userdata('username');
        $data['bayar']    = $this->m_admin->getbayar();
        // dump($data['bayar']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterbayar/bayar');
        $this->load->view('admin/footer');
    }
    public function lihat_pembayaran()
    {
        $data['username'] = $this->session->userdata('username');
        $kode             = $this->uri->segment(3);
        $data['kode']     = $kode;
        $data['jumlah']   = $this->m_admin->getjumlahsiswabyangkatan();

        // dump($data['kode']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterbayar/detailbayar');
        $this->load->view('admin/footer');
    }
    public function bayar_angkatan()
    {
        $data['username'] = $this->session->userdata('username');
        $kode             = $this->uri->segment(3);
        $data['kode']     = $kode;
        $angkatan         = $this->uri->segment(4);
        $data['data']     = $this->m_admin->getdatabykodepembayaran($kode, $angkatan);
        $data['jumlah']   = $this->m_admin->getdatasiswabyangkatan($angkatan, $kode);

        // dump($data['jumlah']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterbayar/detailbayarbyangkatan');
        $this->load->view('admin/footer');
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
        redirect("admin/bayar_angkatan/$kode/$tahun");
    }

    public function hapus_verif_mhs()
    {
        $tahun = $this->uri->segment(3);
        $kode  = $this->uri->segment(4);
        $nim   = $this->uri->segment(5);
        $where = array('nim' => $nim);
        $this->m_dosen->hapus_data($where, 'tbverifikasipembayaran');
        redirect("admin/bayar_angkatan/$kode/$tahun");
    }

    // MASTER INPUT NILAI

    public function nilai_semester()
    {
        $data['username'] = $this->session->userdata('username');
        $data['bayar']    = $this->m_admin->getbayar();
        // dump($data['bayar']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterkhs/datasemester');
        $this->load->view('admin/footer');
    }
    public function nilai_semester_by_ta()
    {
        $tahunajaran         = $this->uri->segment(3);
        $data['tahunajaran'] = $tahunajaran;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->selectedmatkulbyta($tahunajaran);
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterkhs/datamatkul');
        $this->load->view('admin/footer');
    }
    public function nilai_semester_by_matkul()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->selectedmatkulbykode($tahunajaran, $kodematkul);
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterkhs/datakelas');
        $this->load->view('admin/footer');
    }
    public function nilai_semester_by_kelas()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $kelas               = $this->uri->segment(5);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['kelas']       = $kelas;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->getnilaibykelas($tahunajaran, $kodematkul, $kelas);
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterkhs/datanilai');
        $this->load->view('admin/footernilai');
    }
    public function updatenilai()
    {
        $id    = $this->input->post("id");
        $value = $this->input->post("value");
        $modul = $this->input->post("modul");
        $this->m_admin->updatenilaimhs($id, $value, $modul);
        echo "{}";
    }
// DATA PJMK
    public function data_pjmk()
    {
        $data['username'] = $this->session->userdata('username');
        $data['bayar']    = $this->m_admin->getdatapjmk();
        // dump($data['bayar']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterpjmk/pjmkbysemester');
        $this->load->view('admin/footer');
    }
    public function pjmkallowed()
    {
        $id    = $this->uri->segment(3);
        $value = '1';
        $data  = array(
            'permit' => $value,
        );
        // dump($id);
        $this->m_admin->permitpjmkall($data, $id);
        redirect('admin/data_pjmk');
    }public function pjmkdisallowed()
    {
        $id    = $this->uri->segment(3);
        $value = '0';
        $data  = array(
            'permit' => $value,
        );
        // dump($id);
        $this->m_admin->permitpjmkall($data, $id);
        redirect('admin/data_pjmk');
    }
    public function autonilai()
    {
        $id    = $this->uri->segment(3);
        $value = '70';
        $data  = array(
            'nilai' => $value,
        );
        // dump($id);
        $this->m_admin->autob($data, $id);
        redirect('admin/data_pjmk');
    }
    public function pjmkbyta()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['tahunajaran'] = $tahunajaran;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->selectedmatkulbyta($tahunajaran);
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterpjmk/pjmkbyta');
        $this->load->view('admin/footer');
    }
    public function pjmkbymatkul()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->getdatapjmkbymatkul($tahunajaran, $kodematkul);
        $data['matkul']      = $this->m_admin->getmatkulbypjmk($tahunajaran, $kodematkul);
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterpjmk/pjmkbymatkul');
        $this->load->view('admin/footer');
    }
    public function tambahpjmk()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['username']    = $this->session->userdata('username');
        $data['dosen']       = $this->m_dosen->getalldosen();
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_admin->addpjmk($tahunajaran, $kodematkul);
            redirect("admin/pjmkbymatkul/$tahunajaran/$kodematkul");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterpjmk/addpjmk');
        $this->load->view('admin/footer');
    }
    public function editpjmk()
    {
        $id                 = $this->uri->segment(5);
        $kodematkul         = $this->uri->segment(4);
        $tahunajaran        = $this->uri->segment(3);
        $data['username']   = $this->session->userdata('username');
        $data['select']     = $this->m_admin->getselectedpjmk($id);
        $data['dosen']      = $this->m_dosen->getalldosen();
        $data['kodematkul'] = $kodematkul;
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_admin->updatepjmk($id, $kodematkul);
            redirect("admin/pjmkbymatkul/$tahunajaran/$kodematkul");
        }
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masterpjmk/editpjmk');
        $this->load->view('admin/footer');
    }
    public function hapuspjmk()
    {
        $id          = $this->uri->segment(5);
        $kodematkul  = $this->uri->segment(4);
        $tahunajaran = $this->uri->segment(3);
        $where       = array('id' => $id);
        $this->m_dosen->hapus_data($where, 'tbajar');
        redirect("admin/pjmkbymatkul/$tahunajaran/$kodematkul");
    }

    public function alumni()
    {
        $data['username'] = $this->session->userdata('username');
        $data['get']      = $this->m_admin->gettahunlulus();
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masteralumni/index.php');
        $this->load->view('admin/footer');
    }

    public function getdataalumni()
    {
        $kodewisuda       = $this->uri->segment(3);
        $data['username'] = $this->session->userdata('username');
        $data['get']      = $this->m_admin->getdataalumnibytahun($kodewisuda);
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/masteralumni/dataalumnibytahun.php');
        $this->load->view('admin/footer');
    }
    public function getdataskpi()
    {
        $nim                    = $this->uri->segment(3);
        $data['username']       = $this->session->userdata('username');
        $data['skpibiodata']    = $this->m_admin->skpibiodata($nim);
        $data['skpiprestasi']   = $this->m_admin->skpiprestasi($nim);
        $data['skpiorganisasi'] = $this->m_admin->skpiorganisasi($nim);
        $data['skpipkl']        = $this->m_admin->skpipkl($nim);
        $data['judul_kti']      = $this->m_admin->get_kti($nim);
        // dump($data);
        $paper_size = array(0, 0, 609.4488, 935.433);
        $this->pdf->setPaper($paper_size, 'potrait');
        // $this->pdf->lastpage();
        $this->pdf->filename = "cetak_skpi_$nim.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('admin/masteralumni/cetakSKPI', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function data_akademik()
    {
        $data['username'] = $this->session->userdata('username');
        $data['angkatan'] = $this->m_admin->getallangkatan();
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/krs_khs/index');
        $this->load->view('admin/footer');
    }

    public function get_data_akademik_by_angkatan()
    {
        $data['username'] = $this->session->userdata('username');
        $nim              = $this->uri->segment(3);
        $data['mhs']      = $this->m_admin->getmahasiswabyangkatan($nim);
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/krs_khs/getmahasiswabyangkatan');
        $this->load->view('admin/footer');
    }

    public function lihat_krs($nim)
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
        $data['ajukan_krs'] = $this->db->get_where('tbvalidasikrs', array('nim' => $nim))->row();
        // $data['datakrs'] = $this->m_mahasiswa->getdatakrs($getsemester);
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/krs_khs/krs');
        $this->load->view('admin/footer');
    }

    public function cetak_krs()
    {
        $data['username']     = $this->session->userdata('username');
        $id                   = $this->uri->segment(3);
        $data['mhs']          = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $namamhs              = $data['mhs']->namalengkap;
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $semestermhs          = $this->m_mahasiswa->getsemestermhs($id);
        $getsemestermhs       = $semestermhs['0']['total'];
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        $data['datakrs']      = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
        $getsemester          = $this->db->query("SELECT * FROM tbpembayaran where tbpembayaran.jenis = 'semester' ORDER BY id DESC limit 1 ");
        $getvalidasi          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = " . $id . " AND `status` = 1 ORDER BY id ASC limit 1 ");
        $data['tahunajaran']  = $getsemester->row();
        $kodesemester         = $data['tahunajaran']->kode;
        $data['pickedkrs']    = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
        $data['totalsks']     = $this->m_mahasiswa->totalsksbysemester($id, $kodesemester);
        $data['validasicode'] = $this->m_mahasiswa->qrcodekrs($id, $kodesemester);
        // $data['qrCode'] = new QrCode();
        $dataValidasi = $getvalidasi->row();
        $data_qr      = site_url('cekkrs/') . $dataValidasi->token;

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
        $image_name = 'qrcode_krs_' . $id . '.png';

        $params['data']     = $data_qr; //data yang akan di jadikan QR CODE
        $params['level']    = 'H'; //H=High
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
        $this->ciqrcode->generate($params);
        // dump($data);
        // $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "print_krs_'$id'_$namamhs.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('admin/krs_khs/cetakkrs', $data);
        // $this->load->view('mahasiswa/cetakkrs', $data);
        // $this->pdf->load_view('mahasiswa/footer');

    }

    public function khs_semester($nim)
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        // $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $data['semester'] = $this->m_mahasiswa->getkrsbysemester($nim);
        $data['nim']      = $nim;
        // $data['nav'] = $this->db->get_where('tbmahasiswa', array('nim' => $nim))->row();
        // dump($data['semester']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/krs_khs/khs');
        $this->load->view('admin/footer');
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
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/krs_khs/khs_detail');
        $this->load->view('admin/footer');

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

    public function wisuda()
    {
        $data['username'] = $this->session->userdata('username');
        $data['get']      = $this->m_admin->get_data_wisuda();
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/wisuda/index');
        $this->load->view('admin/footer');
    }

    public function get_data_wisudawan()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $this->uri->segment(3);
        // $wsd = $this->uri->segment(4);
        $data['mhs']   = $this->m_admin->get_data_wisudawan($id);
        $data['modal'] = $this->m_admin->get_data_wisudawan($id);
        if ($this->input->post('submit')) {
            $this->m_admin->add_notif();
            redirect("admin/get_data_wisudawan/WSD08");
        }
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/wisuda/datawisudawan.php');
        $this->load->view('admin/footer');
    }

    public function approve_wisda()
    {
        $kode = $this->uri->segment(3);
        $id   = $this->uri->segment(4);
        date_default_timezone_set('Asia/Jakarta');
        $value = date("Y-m-d H-i-s");
        $data  = array(
            'approved' => $value,
        );
        // dump($id);
        $this->m_admin->acc_wisuda($data, $id);
        redirect("admin/get_data_wisudawan/$kode");
    }

    public function SKPI()
    {
        $this->load->library('pdf');
        // $data['username'] = $this->session->userdata('username');
        $id = $this->uri->segment(3);
        // $data['nav'] = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        // $id = $data['username'];
        $data['no_surat'] = $this->m_mahasiswa->get_no_surat($id);
        $data['mhs']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['ijazah']   = $this->m_mahasiswa->check_ijazah_approved($id);
        // dump($data);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "SKPI_'$id'.pdf";
        //$this->pdf->load_view('mahasiswa/SKPI', $data);
        $this->load->view('mahasiswa/SKPI2021', $data);
    }

    public function cetak_draft_ijazah()
    {
        // $data['username'] = $this->session->userdata('username');
        // $nim = $data['username'];
        $id               = $this->uri->segment(3);
        $nim              = $id;
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();        
        // $data['nav'] = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        // $id = $data['username'];        
        $data['no_surat'] = $this->m_mahasiswa->get_no_surat($id);
        $data['mhs']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['ijazah']   = $this->m_mahasiswa->check_ijazah_approved($id);

        // $data['skpiorganisasi'] = $this->m_admin->skpiorganisasi($nim);
        // $data['skpipkl'] = $this->m_admin->skpipkl($nim);
        // dump($data);
        // $paper_size = array(0, 0, 609.4488, 935.433);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "transkrip_sementara_$nim.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('admin/wisuda/draft_ijazah_2020', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_transkrip_sementara()
    {
        // $data['username'] = $this->session->userdata('username');
        // $nim = $data['username'];
        $id               = $this->uri->segment(3);
        $nim              = $id;
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['satu']     = $this->m_mahasiswa->get_nilai_semester_1($nim);
        $data['dua']      = $this->m_mahasiswa->get_nilai_semester_2($nim);
        $data['tiga']     = $this->m_mahasiswa->get_nilai_semester_3($nim);
        $data['empat']    = $this->m_mahasiswa->get_nilai_semester_4($nim);
        $data['lima']     = $this->m_mahasiswa->get_nilai_semester_5($nim);
        $data['enam']     = $this->m_mahasiswa->get_nilai_semester_6($nim);
        $data['sks_1']    = $this->m_mahasiswa->get_sks_1_3($nim);
        $data['sks_2']    = $this->m_mahasiswa->get_sks_4_6($nim);
        $data['ipk']      = $this->m_mahasiswa->get_all_nilai_semester($nim);
        $data['kti']      = $this->m_mahasiswa->check_kti_submited($id);
        $data['no_surat'] = $this->m_mahasiswa->get_no_surat($id);
        $data['app']      = $this->m_mahasiswa->check_transkrip_approved($id);

        // $data['skpiorganisasi'] = $this->m_admin->skpiorganisasi($nim);
        // $data['skpipkl'] = $this->m_admin->skpipkl($nim);
        // dump($data);
        $paper_size = array(0, 0, 609.4488, 935.433);
        $this->pdf->setPaper($paper_size, 'potrait');
        $this->pdf->filename = "transkrip_sementara_$nim.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('admin/wisuda/transkrip_sementara', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_transkrip()
    {
        // $data['username'] = $this->session->userdata('username');
        // $nim = $data['username'];
        $id               = $this->uri->segment(3);
        $nim              = $id;
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['satu']     = $this->m_mahasiswa->get_nilai_semester_1($nim);
        $data['dua']      = $this->m_mahasiswa->get_nilai_semester_2($nim);
        $data['tiga']     = $this->m_mahasiswa->get_nilai_semester_3($nim);
        $data['empat']    = $this->m_mahasiswa->get_nilai_semester_4($nim);
        $data['lima']     = $this->m_mahasiswa->get_nilai_semester_5($nim);
        $data['enam']     = $this->m_mahasiswa->get_nilai_semester_6($nim);
        $data['sks_1']    = $this->m_mahasiswa->get_sks_1_3($nim);
        $data['sks_2']    = $this->m_mahasiswa->get_sks_4_6($nim);
        $data['ipk']      = $this->m_mahasiswa->get_all_nilai_semester($nim);
        $data['kti']      = $this->m_mahasiswa->check_kti_submited($id);
        $data['no_surat'] = $this->m_mahasiswa->get_no_surat($id);
        $data['app']      = $this->m_mahasiswa->check_transkrip_approved($id);

        // $data['skpiorganisasi'] = $this->m_admin->skpiorganisasi($nim);
        // $data['skpipkl'] = $this->m_admin->skpipkl($nim);
        // dump($data);
        $paper_size = array(0, 0, 609.4488, 935.433);
        $this->pdf->setPaper($paper_size, 'potrait');
        $this->pdf->filename = "transkrip_$nim.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('admin/wisuda/transkrip2021', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function data_sertifikat_mhs()
    {
        $id                  = $this->uri->segment(3);
        $data['username']    = $this->session->userdata('username');
        $data['sertifikasi'] = $this->m_mahasiswa->getselectedsertifikasi($id);
        //echo json_encode($data['sertifikasi']);
        //dump($data['sertifikasi']);
        $this->load->view('admin/navbar', $data);
        $this->load->view('mahasiswa/sertifikat');
        $this->load->view('admin/footer');
    }

    public function reset_upload_yudisium()
    {
        $id    = $this->uri->segment(3);
        $rel   = $this->uri->segment(4);
        $where = array('id' => $id);
        $this->m_mahasiswa->hapus_data($where, 'tb_document');
        redirect("admin/get_data_wisudawan/$rel");
    }

    public function delete_app_ijazah()
    {
        $id    = $this->uri->segment(3);
        $rel   = $this->uri->segment(4);
        $where = array('id' => $id);
        $this->m_mahasiswa->hapus_data($where, 'tb_approval');
        redirect("admin/get_data_wisudawan/$rel");
    }

    public function delete_app_transkrip()
    {
        $id    = $this->uri->segment(3);
        $rel   = $this->uri->segment(4);
        $where = array('id' => $id);
        $this->m_mahasiswa->hapus_data($where, 'tb_approval');
        redirect("admin/get_data_wisudawan/$rel");
    }

    public function edit_kti()
    {
        $id             = $this->uri->segment(3);
        $data['check']  = $this->m_admin->check_wisuda_active();
        $data['submit'] = $this->m_mahasiswa->check_kti_submited($id);
        $kode           = $data['check']['0']['kode'];
        $data['get']    = $this->m_mahasiswa->wisuda_register_check($id);
        // $data['nav'] = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        if ($this->input->post('edit')) {
            $this->m_mahasiswa->edit_kti($id);
            redirect("mahasiswa/wisuda");
        }
        if ($this->input->post('submit')) {
            $this->m_mahasiswa->add_kti($id);
            redirect("mahasiswa/wisuda");
        }
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/wisuda/berkas_kti');
        $this->load->view('mahasiswa/footer');
    }

}
