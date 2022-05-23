<?php

require 'vendor/autoload.php';
// START For Import Excel

// END For Import Excel

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->helper('tanggal');
        if ($this->session->userdata('username') == "") {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id          = $data['username'];
        $data['mhs'] = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        //$data['username'] = $this->session->userdata('username');
        $data['jkl']          = $this->m_mahasiswa->getselectedkelamin($id);
        $data['agama']        = $this->m_mahasiswa->getselectedagama($id);
        $data['tinggal']      = $this->m_mahasiswa->getselecteddom($id);
        $data['jenisdaftar']  = $this->m_mahasiswa->getselectedjenisdaftar($id);
        $data['didikayah']    = $this->m_mahasiswa->getselecteddidikayah($id);
        $data['didikibu']     = $this->m_mahasiswa->getselecteddidikibu($id);
        $data['didikwali']    = $this->m_mahasiswa->getselecteddidikwali($id);
        $data['payah']        = $this->m_mahasiswa->getselectedpenghasilanayah($id);
        $data['pibu']         = $this->m_mahasiswa->getselectedpenghasilanibu($id);
        $data['pwali']        = $this->m_mahasiswa->getselectedpenghasilanwali($id);
        $data['kayah']        = $this->m_mahasiswa->getselectedproayah($id);
        $data['kibu']         = $this->m_mahasiswa->getselectedproibu($id);
        $data['kwali']        = $this->m_mahasiswa->getselectedprowali($id);
        $data['aayah']        = $this->m_mahasiswa->getselectedagamaayah($id);
        $data['aibu']         = $this->m_mahasiswa->getselectedagamaibu($id);
        $data['awali']        = $this->m_mahasiswa->getselectedagamawali($id);
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        // dump($data['semestermhs']);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/index');
        // $this->load->view('maintenance');
        $this->load->view('mahasiswa/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }

    //UBAH DATA DIRI
    public function edit_data_diri()
    {
        $data['username']    = $this->session->userdata('username');
        $data['nav']         = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $data['agama']       = $this->m_admin->getallagama();
        $data['kelamin']     = $this->m_admin->getallkelamin();
        $data['jenisdaftar'] = $this->m_admin->getalljenisdaftar();
        $id                  = $this->uri->segment(3);
        $data['getmhs']      = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatadiri($id);
            redirect('mahasiswa/index');
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editdatapribadi');
        $this->load->view('mahasiswa/footer');
    }

    public function gantipassword()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id            = $data['username'];
        $data['login'] = $this->db->get_where('tbuser', array('username' => $id))->row();
        $truepassword  = $data['login'];
        $getpassword   = $truepassword->password;
        $data['hasil'] = array('getpassword' => $getpassword, 'oldpassword' => md5($this->input->post('password', true)),
            'newpassword'                        => md5($this->input->post('newpassword', true)),
            'newpassword2'                       => md5($this->input->post('newpassword2', true)));
        $oldpassword  = md5($this->input->post('password', true));
        $newpassword  = md5($this->input->post('newpassword', true));
        $newpassword2 = md5($this->input->post('newpassword2', true));
        // dump($data['hasil']);
        if ($this->input->post('submit')) {
            if (strtoupper($oldpassword) != strtoupper($getpassword)) {

                $this->session->set_flashdata('message', 'Maaf Password Lama Anda Salah');
                redirect("mahasiswa/gantipassword");
            } else {
                if ($newpassword != $newpassword2) {

                    $this->session->set_flashdata('message', 'Maaf Ketikan Ulang Password Anda Berbeda');
                    redirect("mahasiswa/gantipassword");
                } else {
                    $data = array(
                        'password' => $newpassword,
                    );
                    // dump($data);

                    $res_insert = $this->db->update('tbuser', $data, array('username' => $id));
                    $this->session->set_flashdata('message', 'Password Anda Telah Diubah.');
                    redirect("mahasiswa/gantipassword");
                }

            }
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/gantipassword');
        $this->load->view('mahasiswa/footer');
    }

    public function edit_data_tempat_tinggal()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();
        $data['tinggal']  = $this->m_admin->getalljenistinggal();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatatempat($id);
            redirect('mahasiswa/index');
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editdataalamat');
        $this->load->view('mahasiswa/footer');
    }

    public function edit_data_kontak()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatakontak($id);
            redirect('mahasiswa/index');
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editdatakontak');
        $this->load->view('mahasiswa/footer');
    }

    public function edit_data_pendidikan()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatapendidikan($id);
            redirect('mahasiswa/index');
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editdatapendidikan');
        $this->load->view('mahasiswa/footer');
    }

    public function edit_data_wali()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();
        $data['agama']    = $this->m_admin->getallagama();
        $data['didik']    = $this->m_admin->getallpendidikan();
        $data['hasil']    = $this->m_admin->getallpenghasilan();
        $data['profesi']  = $this->m_admin->getallprofesi();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatawali($id);
            redirect('mahasiswa/index');
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editdatawali');
        $this->load->view('mahasiswa/footer');
    }

    public function edit_data_info()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatainfo($id);
            redirect('mahasiswa/index');
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editdatainfo');
        $this->load->view('mahasiswa/footer');
    }
    public function edit_foto()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_admin->edit_foto($id);
            redirect("mahasiswa");
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editfoto');
        $this->load->view('mahasiswa/footer');
    }
    // public function wisuda() {
    //     $data['username'] = $this->session->userdata('username');
    //     $data['nav'] = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
    //     $this->load->view('mahasiswa/navbar', $data);
    //     $this->load->view('mahasiswa/yudisium');
    //     $this->load->view('mahasiswa/footer');
    // }
    public function data_sertifikat()
    {
        $data['username']          = $this->session->userdata('username');
        $data['nav']               = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                        = $data['username'];
        $data['sertifikasi']       = $this->m_mahasiswa->getselectedsertifikasi($id);
        $data['jenis_sertifikasi'] = $this->m_mahasiswa->get_jenis_sertifikasi($id);
        $data['count']             = count($data['jenis_sertifikasi']);
        // echo json_encode($data['sertifikasi']);
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/sertifikat');
        $this->load->view('mahasiswa/footer');
    }

    public function input_data_sertifikasi()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $id_rand          = $this->get_rand_id();
        $nmFile           = $_FILES['file']['name'];
        $tmpFile          = $_FILES['file']['tmp_name'];
        $explode          = explode(".", $nmFile);
        $ekstensi         = end($explode);

        if ($ekstensi == 'jpg' || $ekstensi == 'jpeg' || $ekstensi == 'png') {
            $create = array(
                'nim'     => $id,
                'gambar'  => $id . "_" . $this->input->post('jenis') . "_" . $id_rand . "." . $ekstensi,
                'jenis'   => $this->input->post('jenis'),
                'nama'    => $this->input->post('nama'),
                'sebagai' => $this->input->post('sebagai'),
                'mulai'   => $this->input->post('mulai'),
                'selesai' => $this->input->post('selesai'),
            );
            // dump($ekstensi);
            $this->m_mahasiswa->input_sertifikasi($create, 'tbsertifikasi');
            move_uploaded_file($tmpFile, './uploads/sertifikasi/' . $id . "_" . $this->input->post('jenis') . "_" . $id_rand . "." . $ekstensi);
            $this->session->set_flashdata('success_message', 'Data Anda telah tersimpan.');
            redirect('mahasiswa/data_sertifikat');
        } else {
            $this->session->set_flashdata('failed_message', 'Maaf disarankan jenis file yang diupload adalah ".jpg, .jpeg, atau .png".');
            redirect('mahasiswa/data_sertifikat');
        }
        $create = array(
            'nim'     => $id,
            'gambar'  => $id . "_" . $this->input->post('jenis') . "_" . $id_rand . "." . $ekstensi,
            'jenis'   => $this->input->post('jenis'),
            'nama'    => $this->input->post('nama'),
            'sebagai' => $this->input->post('sebagai'),
            'mulai'   => $this->input->post('mulai'),
            'selesai' => $this->input->post('selesai'),
        );
        // dump($create);
        $this->m_mahasiswa->input_sertifikasi($create, 'tbsertifikasi');
        move_uploaded_file($tmpFile, './uploads/sertifikasi/' . $id . "_" . $this->input->post('jenis') . "_" . $id_rand . "." . $ekstensi);
        redirect('mahasiswa/data_sertifikat');
    }

    public function edit_data_sertifikasi()
    {
        $data['username']       = $this->session->userdata('username');
        $data['nav']            = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                     = $this->uri->segment(3);
        $data['getsertifikasi'] = $this->db->get_where('tbsertifikasi', array('id' => $id))->row();

        if ($this->input->post('sbmt1')) {
            $this->m_mahasiswa->updategambarsertifikasi($id);
            redirect('mahasiswa/edit_data_sertifikasi/' . $id);
        }

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->updatedatasertifikasi($id);
            redirect('mahasiswa/data_sertifikat/');
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editsertifikasi');
        $this->load->view('mahasiswa/footer');
    }

    public function hapus_data_sertifikasi($id)
    {
        $where = array('id' => $id);
        $this->m_mahasiswa->hapus_data($where, 'tbsertifikasi');
        redirect('mahasiswa/data_sertifikat');
    }

    public function cetakSKPI()
    {
        $this->load->library('pdf');
        $data['username']    = $this->session->userdata('username');
        $data['nav']         = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                  = $data['username'];
        $data['sertifikasi'] = $this->m_mahasiswa->getselectedsertifikasi($id);
        $file                = $data['nav']->nim;
        //dump($file);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "SKPI_" . $file . ".pdf";
        //    $this->pdf->load_view('mahasiswa/cetaksertifikasi', $data);
        $this->load->view('mahasiswa/cetaksertifikasi', $data);
    }

    public function cetak_draft_ijazah()
    {
        // $data['username'] = $this->session->userdata('username');
        // $nim = $data['username'];
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id               = $data['username'];
        $data['no_surat'] = $this->m_mahasiswa->get_no_surat($id);
        $data['mhs']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['ijazah']   = $this->m_mahasiswa->check_ijazah_approved($id);

        // $data['skpiorganisasi'] = $this->m_admin->skpiorganisasi($nim);
        // $data['skpipkl'] = $this->m_admin->skpipkl($nim);
        // dump($data);
        // $paper_size = array(0, 0, 609.4488, 935.433);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "draft_ijazah_$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('admin/wisuda/draft_ijazah_2020', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function SKPI()
    {
        $this->load->library('pdf');
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id               = $data['username'];
        $data['no_surat'] = $this->m_mahasiswa->get_no_surat($id);
        $data['mhs']      = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['ijazah']   = $this->m_mahasiswa->check_ijazah_approved($id);
        // dump($data);
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "SKPI.pdf";
        //$this->pdf->load_view('mahasiswa/SKPI', $data);
        $this->load->view('mahasiswa/SKPI', $data);
    }

    public function data_wisuda()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $data['username'];
        $data['wisuda']   = $this->m_mahasiswa->getselectedwisuda($id);
        //dump($data['wisuda']);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/biodatawisuda');
        $this->load->view('mahasiswa/footer');
    }

    public function edit_data_wisuda()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();

        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->edit_wisuda($id);
            redirect("mahasiswa/data_wisuda");
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/editdatawisuda');
        $this->load->view('mahasiswa/footer');
    }

    public function upload_bebas_kuliah()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $this->uri->segment(3);
        $data['getmhs']   = $this->db->get_where('tbmahasiswa', array('id' => $id))->row();
        //dump($data['getmhs']);
        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->upload_bebas_kuliah($id);
            redirect("mahasiswa/upload_bebas_kuliah/" . $id);
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/uploadbebaskuliah');
        $this->load->view('mahasiswa/footer');
    }

    public function cek_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $data['username'];
        $getsemester      = $this->db->query("SELECT * FROM tbpembayaran WHERE jenis = 'semester' ORDER BY id DESC limit 1 ");
        $getekd           = $this->db->query("SELECT * FROM tb_ekd  ORDER BY id DESC limit 1 ");
        $data['cek']      = $getsemester->row();
        $data['cek_ekd']  = $getekd->row();
        //dump($data['getmhs']);
        dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->upload_bebas_kuliah($id);
            redirect("mahasiswa/upload_bebas_kuliah/" . $id);
        }
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/uploadbebaskuliah');
        $this->load->view('mahasiswa/footer');
    }

    // Kartu Rencana Studi
    public function krs()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username']               = $this->session->userdata('username');
        $semestermhs      = $this->m_mahasiswa->getsemestermhs($id);
        $getsemester      = $this->db->query("SELECT * FROM tbpembayaran WHERE jenis = 'semester' ORDER BY id DESC limit 1 ");
        $getekd           = $this->db->query("SELECT * FROM tb_ekd  ORDER BY id DESC limit 1 ");
        $data['cek']      = $getsemester->row();
        $data['cek_ekd']  = $getekd->row();
        $oddeven          = $data['cek']->semester;
        $kodesemester     = $data['cek']->kode;
        $get              = $data['cek']->kode;
        $ekd              = $data['cek_ekd']->rel_tahunajaran;
        if ($oddeven == "Ganjil") {

            $data['datakrs'] = $this->m_mahasiswa->datakrsodd($id, $kodesemester);
        } else {
            $data['datakrs'] = $this->m_mahasiswa->datakrseven($id, $kodesemester);
        }
        $cek                      = $this->db->query("SELECT * FROM tbverifikasipembayaran WHERE nim = '$data[username]' and tahunajaran = '$get'");
        $data['verifikasi']       = $cek->row();
        $nim                      = $data['username'];
        $data['nav']              = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $data['pickedkrs']        = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
        $data['totalsks']         = $this->m_mahasiswa->totalsksbysemester($id, $kodesemester);
        $data['sks']              = $data['totalsks'][0]['total'];
        $data['ajukan_krs']       = $this->db->get_where('tbvalidasikrs', array('nim' => $data['username'], 'tahun_ajaran' => $kodesemester))->row();
        $data['get_ekd']          = $this->m_mahasiswa->get_ekd_type($id, $ekd);
        $data['ekd']              = $this->m_mahasiswa->get_ekd($id, $ekd);
        $data['ekd_dosen_filled'] = $this->m_mahasiswa->count_ekd_dosen($id, $ekd);
        // $data['ekd_laboran_filled'] = $this->m_mahasiswa->count_ekd_laboran($id, $ekd);
        // $data['ekd_perpus_filled']  = $this->m_mahasiswa->count_ekd_perpus($id, $ekd);
        // $data['ekd_perpus']         = $this->m_mahasiswa->ekd_perpus($id, $ekd);
        // $data['test']  = $this->m_mahasiswa->test_hitung_ekd($id, $ekd);

        // $data['total']               = $data['ekd']['0']['total'] + $data['ekd']['1']['total'] + $data['ekd_perpus']['0']['total'];
        // $data['filled']              = $data['ekd_dosen_filled']['0']['filled'] + $data['ekd_laboran_filled']['1']['filled'] + $data['ekd_perpus_filled']['0']['filled'];
        // $data['datakrs'] = $this->m_mahasiswa->getdatakrs($getsemester);
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/krs');
        // $this->load->view('mahasiswa/ekd/index');
        // $this->load->view('maintenance');
        $this->load->view('mahasiswa/footer');
    }

    public function ajukan_krs()
    {
        $getsemester  = $this->db->query("SELECT * FROM tbpembayaran where tbpembayaran.jenis = 'semester' ORDER BY id DESC limit 1 ");
        $tahunajaran  = $getsemester->row();
        $kodesemester = $tahunajaran->kode;
        $nim          = $this->session->userdata('username');
        $cek          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = '$nim' and tahunajaran = '$kodesemester'");

        if ($cek == null) {
            $this->m_mahasiswa->ajukankrs($nim, $kodesemester);
        }
        redirect('mahasiswa/krs');
    }

    public function insert_krs()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $semestermhs      = $this->m_mahasiswa->getsemestermhs($id);
        $nim              = $data['username'];
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $getsemester      = $this->db->query("SELECT * FROM tbpembayaran where tbpembayaran.jenis = 'semester' ORDER BY id DESC limit 1 ");
        $data['cek']      = $getsemester->row();
        $get              = $data['cek']->kode;

        $create = array(
            'nim'  => $id,
            'kode' => $this->input->post('kode'),

        );

        $this->m_mahasiswa->insertkrs($create, $get);
        redirect('mahasiswa/krs');
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/krs');
        $this->load->view('mahasiswa/footer');
    }

    public function hapuspilihankrs()
    {
        $studi  = $this->uri->segment(3);
        $matkul = $this->uri->segment(4);
        $nim    = $this->uri->segment(5);
        $where  = array('id' => $studi);
        $this->m_mahasiswa->hapus_data($where, 'tbstudi');
        redirect('mahasiswa/krs');
    }

    public function cetak_krs()
    {
        $data['username']     = $this->session->userdata('username');
        $id                   = $data['username'];
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
        // $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "print_krs_'$id'_$namamhs.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/cetakkrs', $data);
        // $this->load->view('mahasiswa/cetakkrs', $data);
        // $this->pdf->load_view('mahasiswa/footer');

    }

    public function krs_semester()
    {
        $data['username'] = $this->session->userdata('username');
        $nim              = $data['username']              = $this->session->userdata('username');
        $data['semester'] = $this->m_mahasiswa->getkrsbysemester($nim);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/riwayat_krs/index');
        $this->load->view('mahasiswa/footer');
    }

    // KARTU HASIL STUDI
    public function khs_semester()
    {
        $data['username'] = $this->session->userdata('username');
        $nim              = $data['username']              = $this->session->userdata('username');
        $data['semester'] = $this->m_mahasiswa->getkrsbysemester($nim);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/khs/index');
        $this->load->view('mahasiswa/footer');
    }

    public function cetak_riwayat_krs()
    {
        $kodeselected         = $this->uri->segment(4);
        $data['username']     = $this->session->userdata('username');
        $data['nav']          = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                   = $data['username'];
        $data['mhs']          = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $namamhs              = $data['mhs']->namalengkap;
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $semestermhs          = $this->m_mahasiswa->getsemestermhs($id);
        $getsemestermhs       = $semestermhs['0']['total'];
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        // $data['datakrs'] = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
        $data['tahunajaran'] = $this->db->get_where('tbpembayaran', array('kode' => $kodeselected))->row();
        // $data['pickedkrs'] = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
        $getsemester               = $this->db->query("SELECT * FROM tbpembayaran where jenis = 'semester' ORDER BY id DESC limit 1 ");
        $data['semesternow']       = $getsemester->row();
        $semesternow               = $data['semesternow']->kode;
        $data['totalsks']          = $this->m_mahasiswa->totalsksbysemester($id, $kodeselected);
        $data['semester_selected'] = $this->m_mahasiswa->cek_ta_riwayatkrs($id, $kodeselected);
        $data['pickedkrs']         = $this->m_mahasiswa->riwayat_krs_by_ta($id, $kodeselected);
        $data['validasi']          = $this->db->get_where('tbvalidasikrs', array('nim' => $id, 'tahun_ajaran' => $kodeselected))->row();
        // $data['khs']         = $this->m_mahasiswa->getdetailkhsv2($id, $kodeselected);
        // $data['ips']         = $this->m_mahasiswa->getipsv2($id, $kodeselected);
        // $data['ipk']         = $this->m_mahasiswa->getipkv2($id, $kodeselected);
        // $data['sks']         = $this->m_mahasiswa->getipk($id, $kodeselected);
        // $data['getips'] = $data['ips'];
        $dataValidasi = $this->db->get_where('tbvalidasikrs', array('nim' => $id, 'tahun_ajaran' => $kodeselected))->row();
        // $getvalidasi          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = " . $id . " AND `status` = 1  ORDER BY id ASC limit 1 ");

        // dump($data);
        $this->load->library('pdf');
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
        $image_name = 'qrcode_krs_' . $id . '_' . $kodeselected . '.png';

        $params['data']     = $data_qr; //data yang akan di jadikan QR CODE
        $params['level']    = 'H'; //H=High
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
        $this->ciqrcode->generate($params);
        // $this->load->view('mahasiswa/navbar', $data);
        // $this->load->view('mahasiswa/khs/detailkhs');
        // $this->load->view('mahasiswa/footer');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "print_histori_krs_'$id'_'$kodeselected'_$namamhs.pdf";
        $this->pdf->load_view('mahasiswa/riwayat_krs/cetak_krs', $data);

    }

    public function khs_detail()
    {
        $kodeselected         = $this->uri->segment(4);
        $data['username']     = $this->session->userdata('username');
        $data['nav']          = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                   = $data['username'];
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
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/khs/detailkhs');
        // $this->load->view('mahasiswa/ekd/index');
        $this->load->view('mahasiswa/footer');

        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "print_krs_'$id'_$namamhs.pdf";
        // $this->pdf->load_view('mahasiswa/cetakkrs', $data);

    }

    public function cetak_khs()
    {
        $kodeselected         = $this->uri->segment(4);
        $data['username']     = $this->session->userdata('username');
        $data['nav']          = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                   = $data['username'];
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
        $this->pdf->filename = "print_khs_'$id'_$namamhs.pdf";
        $this->pdf->load_view('mahasiswa/khs/cetakkhs', $data);

    }
// LOG PERUBAHAN NILAI
    public function log_nilai()
    {
        $data['username'] = $this->session->userdata('username');
        $nim              = $data['username']              = $this->session->userdata('username');
        $data['semester'] = $this->m_mahasiswa->getkrsbysemester($nim);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $data['lognilai'] = $this->m_mahasiswa->getlognilai($nim);
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/lognilai/index');
        $this->load->view('mahasiswa/footer');
    }

    public function detail_lognilai()
    {
        $kodeselected     = $this->uri->segment(3);
        $data['username'] = $this->session->userdata('username');
        $nim              = $data['username']              = $this->session->userdata('username');
        $data['semester'] = $this->m_mahasiswa->getkrsbysemester($nim);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $data['detail']   = $this->m_mahasiswa->detail_lognilai($nim, $kodeselected);
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/lognilai/detail');
        $this->load->view('mahasiswa/footer');
    }

    // REMEDIAL
    public function remedial()
    {
        $data['username']        = $this->session->userdata('username');
        $nim                     = $data['username']                     = $this->session->userdata('username');
        $data['getkoderemedial'] = $this->db->query("SELECT * FROM tbremedial ORDER BY id DESC limit 1 ")->row();
        $kodesemester            = $data['getkoderemedial']->rel_kodepembayaran;
        $koderemedial            = $data['getkoderemedial']->kode;
        $id                      = $nim;
        $cek                     = $this->db->query("SELECT * FROM tbverifikasipembayaran WHERE nim = '$data[username]' and tahunajaran = '$kodesemester'");

        $data['verifikasi']       = $cek->row();
        $data['semester']         = $this->m_mahasiswa->getkrsbysemester($nim);
        $data['permitprintkrs']   = $this->m_mahasiswa->cekpermitprintremedial($id, $koderemedial);
        $data['nav']              = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $data['pickedremedial']   = $this->m_mahasiswa->dataremedialpicked($id, $koderemedial);
        $data['khs']              = $this->m_mahasiswa->getdataforremedial($id, $kodesemester, $koderemedial);
        $data['totalsksremedial'] = $this->m_mahasiswa->totalsksremedial($id, $koderemedial);
        $data['sks']              = $data['totalsksremedial'][0]['total'];
        $data['is_aprove']        = $this->m_mahasiswa->get_status_bayar($nim);
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/remedial/index');
        $this->load->view('mahasiswa/footer');
    }

    public function insert_remedial()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $semestermhs      = $this->m_mahasiswa->getsemestermhs($id);
        $nim              = $data['username'];
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $getsemester      = $this->db->query("SELECT * FROM tbremedial ORDER BY id DESC limit 1 ");
        $data['cek']      = $getsemester->row();
        $get              = $data['cek']->kode;

        // $data['datakrs'] = $this->m_mahasiswa->getdatakrs($getsemester);
        // $kodesemester = $data['datakrs']->kode;

        $create = array(
            'nim'  => $id,
            'kode' => $this->input->post('kode'),

        );
        // dump($create);

        $this->m_mahasiswa->insertkrs($create, $get);
        redirect('mahasiswa/remedial');
        $this->load->view('mahasiswa/navbar', $data);
        // $this->load->view('mahasiswa/remedial/index');
        $this->load->view('mahasiswa/footer');
    }

    public function hapuspilihanremedial()
    {
        $studi  = $this->uri->segment(3);
        $matkul = $this->uri->segment(4);
        $nim    = $this->uri->segment(5);
        $where  = array('id' => $studi);
        $this->m_mahasiswa->hapus_data($where, 'tbstudi');
        redirect('mahasiswa/remedial');
    }

    public function cetakinvoiceremedial()
    {
        $data['username']     = $this->session->userdata('username');
        $id                   = $data['username'];
        $data['mhs']          = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['nav']          = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $namamhs              = $data['mhs']->namalengkap;
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $semestermhs          = $this->m_mahasiswa->getsemestermhs($id);
        $getsemestermhs       = $semestermhs['0']['total'];
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        // $data['datakrs'] = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
        $data['getkoderemedial']  = $this->db->query("SELECT * FROM tbremedial ORDER BY id DESC limit 1 ")->row();
        $kodesemester             = $data['getkoderemedial']->semester;
        $koderemedial             = $data['getkoderemedial']->kode;
        $data['pickedremedial']   = $this->m_mahasiswa->dataremedialpicked($id, $koderemedial);
        $data['totalsksremedial'] = $this->m_mahasiswa->totalsksremedial($id, $koderemedial);
        $data['sks']              = $data['totalsksremedial'][0]['total'];
        // dump($data);
        // $this->load->library('pdf');

        $this->pdf->setPaper('F4', 'potrait');
        $this->pdf->filename = "print_invoice_'$id'_$namamhs.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/remedial/cetak_invoice_remedial', $data);
        // $this->pdf->load_view('mahasiswa/footer');

    }
    public function cetakkrsremedial()
    {
        $data['username']     = $this->session->userdata('username');
        $id                   = $data['username'];
        $data['mhs']          = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
        $data['nav']          = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $namamhs              = $data['mhs']->namalengkap;
        $data['semestermhs']  = $this->m_mahasiswa->getsemestermhs($id);
        $semestermhs          = $this->m_mahasiswa->getsemestermhs($id);
        $getsemestermhs       = $semestermhs['0']['total'];
        $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
        // $data['datakrs'] = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
        $data['getkoderemedial']     = $this->db->query("SELECT * FROM tbremedial ORDER BY id DESC limit 1 ")->row();
        $kodesemester                = $data['getkoderemedial']->semester;
        $koderemedial                = $data['getkoderemedial']->kode;
        $data['dataremedialprinted'] = $this->m_mahasiswa->dataremedialprinted($id, $koderemedial);
        $data['totalsksremedial']    = $this->m_mahasiswa->totalsksremedial($id, $koderemedial);
        $data['sks']                 = $data['totalsksremedial'][0]['total'];
        // dump($data);
        // $this->load->library('pdf');

        $this->pdf->setPaper('F4', 'potrait');
        $this->pdf->filename = "print_krs_remedial_'$id'_$namamhs.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/remedial/cetak_krs_remedial', $data);
        // $this->pdf->load_view('mahasiswa/footer');

    }

    public function yudisium()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $data['check']    = $this->m_admin->check_yudisium_active();
        // $data['get']          = $this->m_mahasiswa->yudisium_check($id);
        $data['yudisium']     = $this->db->get_where('tb_peserta_yudisium', array('nim' => $data['username']))->row();
        $data['spp']          = $this->m_mahasiswa->yudisium_spp_check($id);
        $data['bebas_perpus'] = $this->m_mahasiswa->yudisium_perpus_check($id);
        $data['bebas_kti']    = $this->m_mahasiswa->yudisium_kti_check($id);
        $data['bebas_lab']    = $this->m_mahasiswa->yudisium_lab_check($id);
        $data['uncheck_lab']  = $this->m_mahasiswa->yudisium_lab_uncheck($id);
        $data['nilai_se']     = $this->m_mahasiswa->yudisium_se_check($id);
        $data['nilai_kpm']    = $this->m_mahasiswa->yudisium_kpm_check($id);
        $data['min_nilai']    = $this->m_mahasiswa->yudisium_nilai_deny($id);
        $data['nav']          = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $kode                 = $data['check'][0]['kode'] . $data['check'][0]['gelombang'];
        $data['autonum']      = $this->m_mahasiswa->autonum_yudisium_check($kode);
        $autonum              = $data['autonum'][0]['auto'];
        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->register_yudisium($kode, $id, $autonum);
            redirect("mahasiswa/yudisium");
        }

        if ($this->input->post('cetak')) {
            $this->m_mahasiswa->acc_yudisium($id);
            redirect("mahasiswa/cetak_bukti_yudisium");
        }
        // dump($autonum);

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/yudisium/index');
        $this->load->view('mahasiswa/footer');
    }

    public function cetak_bukti_yudisium()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $data['check']    = $this->m_admin->check_yudisium_active();
        $data['get']      = $this->m_mahasiswa->yudisium_print($id);
        // $data['min_nilai'] = $this->m_mahasiswa->yudisium_nilai_deny($id);
        $data['nav']     = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $kode            = $data['check'][0]['kode'] . $data['check'][0]['gelombang'];
        $data['autonum'] = $this->m_mahasiswa->autonum_yudisium_check($kode);
        $autonum         = $data['autonum'][0]['auto'];
        $qrdate          = date('d-m-Y');
        $isi             = 'http://damas.akfarsurabaya.ac.id/kode_unik/' . $data['get']['0']['kode_unik'];
        // $data_qr = 'bukti_';

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
        $image_name = 'qrcode_bebas_yudisium_' . $id . '.png';

        $params['data']     = $isi; //data yang akan di jadikan QR CODE
        $params['level']    = 'H'; //H=High
        $params['size']     = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
        $this->ciqrcode->generate($params);
        // dump($data);
        // $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Bukti_Yudisium_'$id'_$kode.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/yudisium/cetak_bukti_yudisium', $data);
        // $this->pdf->load_view('mahasiswa/footer');

    }

    public function upload_bebas_perpus()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $data['check']    = $this->m_admin->check_yudisium_active();
        $data['get']      = $this->m_mahasiswa->yudisium_check($id);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $kode             = $data['check'][0]['kode'] . $data['check'][0]['gelombang'];
        $data['autonum']  = $this->m_mahasiswa->autonum_yudisium_check($kode);
        $autonum          = $data['autonum'][0]['auto'];
        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->upload_bebas_perpus($id);
            redirect("mahasiswa/upload_bebas_perpus");
        }
        // dump($autonum);

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/yudisium/upload_bebas_perpus');
        $this->load->view('mahasiswa/footer');
    }

    public function upload_bebas_kti()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $data['check']    = $this->m_admin->check_yudisium_active();
        $data['get']      = $this->m_mahasiswa->yudisium_check($id);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $kode             = $data['check'][0]['kode'] . $data['check'][0]['gelombang'];
        // $data['autonum']  = $this->m_mahasiswa->autonum_yudisium_check($kode);
        // $autonum          = $data['autonum'][0]['auto'];
        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->upload_bebas_kti($id);
            redirect("mahasiswa/upload_bebas_kti");
        }
        // dump($autonum);

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/yudisium/upload_bebas_kti');
        $this->load->view('mahasiswa/footer');
    }

    public function upload_bebas_lab()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $data['check']    = $this->m_admin->check_yudisium_active();
        $data['get']      = $this->m_mahasiswa->yudisium_check($id);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $kode             = $data['check'][0]['kode'] . $data['check'][0]['gelombang'];
        $data['autonum']  = $this->m_mahasiswa->autonum_yudisium_check($kode);
        $autonum          = $data['autonum'][0]['auto'];
        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->upload_bebas_lab($id);
            redirect("mahasiswa/yudisium");
        }
        // dump($autonum);

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/yudisium/upload_bebas_lab');
        $this->load->view('mahasiswa/footer');
    }

    public function wisuda()
    {
        $data['username']  = $this->session->userdata('username');
        $id                = $data['username'];
        $data['check']     = $this->m_admin->check_wisuda_active();
        $kode              = $data['check']['0']['kode'];
        $data['get']       = $this->m_mahasiswa->wisuda_register_check($id);
        $data['nav']       = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $data['kti']       = $this->m_mahasiswa->check_kti_submited($id);
        $data['ijazah']    = $this->m_mahasiswa->check_ijazah_approved($id);
        $data['transkrip'] = $this->m_mahasiswa->check_transkrip_approved($id);
        $data['yudisium']  = $this->m_mahasiswa->check_yudisium_submited($id);
        $data['notif']     = $this->m_mahasiswa->get_notif($id);
        if ($this->input->post('sbmt')) {
            $this->m_mahasiswa->register_wisuda($kode, $id);
            redirect("mahasiswa/wisuda");
        }
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/wisuda/index');
        $this->load->view('mahasiswa/footer');
    }

    public function berkas_kti()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $data['check']    = $this->m_admin->check_wisuda_active();
        $data['submit']   = $this->m_mahasiswa->check_kti_submited($id);
        $kode             = $data['check']['0']['kode'];
        $data['get']      = $this->m_mahasiswa->wisuda_register_check($id);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
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

    public function get_rand_id()
    {
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 15) as $k) {
            $rand .= $seed[$k];
        }
        return $rand;
    }

    public function approve_ijazah()
    {
        $data['username'] = $this->session->userdata('username');
        $id_rand          = $this->get_rand_id();
        $id               = $data['username'];
        $jenis            = 'ijazah';
        date_default_timezone_set('Asia/Jakarta');
        $create = array(
            'id'        => $id_rand,
            'nim'       => $id,
            'jenis'     => $jenis,
            'create_at' => date("Y-m-d H-i-s"),
        );
        // dump($create);
        $this->m_admin->inputakun($create, 'tb_approval');
        redirect('mahasiswa/wisuda');
    }

    public function approve_nilai()
    {
        $data['username'] = $this->session->userdata('username');
        $id_rand          = $this->get_rand_id();
        $id               = $data['username'];
        $jenis            = 'nilai_sementara';
        date_default_timezone_set('Asia/Jakarta');
        $create = array(
            'id'        => $id_rand,
            'nim'       => $id,
            'jenis'     => $jenis,
            'create_at' => date("Y-m-d H-i-s"),
        );
        // dump($create);
        $this->m_admin->inputakun($create, 'tb_approval');
        redirect('mahasiswa/cek_nilai');
    }

    public function approve_transkrip()
    {
        $data['username'] = $this->session->userdata('username');
        $id_rand          = $this->get_rand_id();
        $id               = $data['username'];
        $jenis            = 'transkrip';
        date_default_timezone_set('Asia/Jakarta');
        $create = array(
            'id'        => $id_rand,
            'nim'       => $id,
            'jenis'     => $jenis,
            'create_at' => date("Y-m-d H-i-s"),
        );
        // dump($create);
        $this->m_admin->inputakun($create, 'tb_approval');
        redirect('mahasiswa/wisuda');
    }

    public function upload_berkas_yudisium()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $data['check']    = $this->m_admin->check_wisuda_active();
        $kode             = $data['check']['0']['kode'];
        $data['get']      = $this->m_mahasiswa->wisuda_register_check($id);
        $data['yudisium'] = $this->m_mahasiswa->check_yudisium_submited($id);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();

        if ($this->input->post('submit')) {
            $this->m_mahasiswa->upload_berkas_yudisium($id);
            redirect("mahasiswa/wisuda");
        }
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/wisuda/upload_berkas_yudisium');
        $this->load->view('mahasiswa/footer');
    }

    public function cetak_transkrip_sementara()
    {
        $data['username'] = $this->session->userdata('username');
        $nim              = $data['username'];
        $id               = $nim;
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
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
        $this->pdf->setPaper('folio', 'potrait');
        $this->pdf->filename = "transkrip_sementara_$nim.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        // $this->pdf->load_view('mahasiswa/wisuda/cetak_transkrip_sementara', $data);
        $this->pdf->load_view('mahasiswa/wisuda/transkrip2021', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function survey_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $subjek_ekd       = $this->uri->segment(3);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $getekd           = $this->db->query("SELECT * FROM tb_ekd  ORDER BY id DESC limit 1 ");
        $data['cek_ekd']  = $getekd->row();
        $ekd              = $data['cek_ekd']->rel_tahunajaran;
        // $data['get']      = $this->m_mahasiswa->ekd_matkul_by_mhs($id, $subjek_ekd, $ekd);
        $data['get'] = $this->m_mahasiswa->ekd_matkul_by_mhs_v2($id, $subjek_ekd, $ekd);
        // dump($autonum);

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/ekd/survey_subjek');
        $this->load->view('mahasiswa/footer');
    }

    public function survey_pustakawan()
    {
        $data['username'] = $this->session->userdata('username');
        $id               = $data['username'];
        $subjek_ekd       = $this->uri->segment(3);
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $getekd           = $this->db->query("SELECT * FROM tb_ekd  ORDER BY id DESC limit 1 ");
        $data['cek_ekd']  = $getekd->row();
        $ekd              = $data['cek_ekd']->rel_tahunajaran;
        $data['get']      = $this->m_mahasiswa->ekd_perpus_by_mhs($id, $subjek_ekd, $ekd);
        // dump($autonum);

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/ekd/survey_subjek');
        $this->load->view('mahasiswa/footer');
    }

    public function borang_ekd()
    {
        $data['username']  = $this->session->userdata('username');
        $id                = $data['username'];
        $nidn              = $this->uri->segment(3);
        $matkul            = $this->uri->segment(4);
        $getekd            = $this->db->query("SELECT kode_ekd FROM tb_ekd  ORDER BY id DESC limit 1 ");
        $ekd               = $getekd->row();
        $data['matkul']    = $matkul;
        $data['nidn']      = $nidn;
        $data['nav']       = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $data['soal']      = $this->m_mahasiswa->kuisioner_ekd($nidn, $ekd);
        $data['nilai']     = $this->m_mahasiswa->nilai_ekd();
        $data['dosen_ekd'] = $this->m_mahasiswa->selected_kuisioner($nidn, $matkul);
        // dump($autonum);

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/ekd/kuisioner_ekd');
        $this->load->view('mahasiswa/footer');
    }

    public function insert_ekd()
    {

        $data['username']  = $this->session->userdata('username');
        $id                = $data['username'];
        $nidn              = $this->uri->segment(4);
        $matkul            = $this->uri->segment(3);
        $data['nav']       = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $get_ekd           = $this->db->query("SELECT * FROM tb_ekd where tb_ekd.`status` = 1 ORDER BY id DESC limit 1 ");
        $data['cek']       = $get_ekd->row();
        $get               = $data['cek']->kode_ekd;
        $data['soal']      = $this->m_mahasiswa->kuisioner_ekd($nidn);
        $data['nilai']     = $this->m_mahasiswa->nilai_ekd();
        $data['dosen_ekd'] = $this->m_mahasiswa->selected_kuisioner($nidn, $matkul);

        date_default_timezone_set('Asia/Jakarta');

        $create = array(
            'rel_nim'    => $id,
            'rel_matkul' => $matkul,
            'rel_nidn'   => $nidn,
            'rel_soal'   => $this->input->post('id_soal'),
            'bobot'      => $this->input->post('nilai'),
            'created_at' => date("Y-m-d H-i-s"),

        );

        $this->m_mahasiswa->insert_ekd($create, $get);
        redirect('mahasiswa/krs/');
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/krs');
        $this->load->view('mahasiswa/footer');
    }

    public function cek_nilai()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $data['username'];
        $data['app']      = $this->m_mahasiswa->check_nilai_sementara_approved($id);
        $data['check']    = $this->m_mahasiswa->count_if_up_semester_5($id);
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/ceknilai/index.php');
        $this->load->view('mahasiswa/footer');
    }

    public function cetak_nilai_sementara()
    {
        $data['username'] = $this->session->userdata('username');
        $nim              = $data['username'];
        $id               = $nim;
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
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
        $data['app']      = $this->m_mahasiswa->check_nilai_sementara_approved($id);

        // $data['skpiorganisasi'] = $this->m_admin->skpiorganisasi($nim);
        // $data['skpipkl'] = $this->m_admin->skpipkl($nim);
        // dump($data);
        $this->pdf->setPaper('folio', 'potrait');
        $this->pdf->filename = "persetujuan_nilai_1_5_$nim.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/wisuda/cetak_nilai_sementara', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function layanan_kti()
    {
        $data['username']            = $this->session->userdata('username');
        $data['nav']                 = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                          = $data['username'];
        $getsemester                 = $this->db->query("SELECT tbpembayaran.kode FROM tbpembayaran where jenis = 'semester' and tbpembayaran.kode like 'GA%' ORDER BY id DESC limit 1 ");
        $getsemester                 = $getsemester->row();
        $semesternow                 = $getsemester->kode;
        $data['check_matkul_picked'] = $this->m_mahasiswa->check_proposal_or_kti_picked($id);
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/kti/first');
        $this->load->view('mahasiswa/footer');
    }

    public function kti()
    {
        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $data['username'];
        $getsemester      = $this->db->query("SELECT tbpembayaran.kode FROM tbpembayaran where jenis = 'semester' and tbpembayaran.kode like 'GA%' ORDER BY id DESC limit 1 ");
        $getsemester      = $getsemester->row();
        $semesternow      = $getsemester->kode;
        $data['kti']      = $this->db->query("SELECT * FROM tb_kti WHERE tb_kti.rel_nim = '$id'")->row();

        $data_proposal                 = $this->db->query("SELECT * FROM tb_proposal_kti WHERE tb_proposal_kti.rel_nim = '$id'")->row();
        $judul_proposal                = $data_proposal->judul;
        $subjudul_proposal             = $data_proposal->sub_judul;
        $data['check_dosen']           = $this->m_mahasiswa->check_dosen_kti($id);
        $data['get_before']            = $this->m_mahasiswa->check_queue_kti_validation_before($id);
        $data['get_after']             = $this->m_mahasiswa->check_queue_kti_validation_after($id);
        $data['get_before_validation'] = $this->m_mahasiswa->get_kti_before_validation_queue($id);
        $data['get_after_validation']  = $this->m_mahasiswa->get_kti_after_validation_queue($id);

        if ($this->input->post('copy')) {
            $this->m_mahasiswa->register_kti($id, $judul_proposal, $subjudul_proposal, $semesternow);
            redirect("mahasiswa/kti");
        }
        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/kti/index_kti');
        $this->load->view('mahasiswa/footer');
    }

    public function proposal_kti()
    {
        $data['username']              = $this->session->userdata('username');
        $data['nav']                   = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                            = $data['username'];
        $getsemester                   = $this->db->query("SELECT tbpembayaran.kode FROM tbpembayaran where jenis = 'semester' and tbpembayaran.kode like 'GA%' ORDER BY id DESC limit 1 ");
        $getsemester                   = $getsemester->row();
        $semesternow                   = $getsemester->kode;
        $data['get_dosen']             = $this->m_mahasiswa->get_dosen();
        $data['check_semester']        = $this->m_mahasiswa->check_proposal_picked($id);
        $data['check_sign']            = $this->m_mahasiswa->check_proposal_apply($id);
        $data['check_dosen']           = $this->m_mahasiswa->check_dosen($id);
        $data['get_before']            = $this->m_mahasiswa->check_queue_validation($id);
        $data['get_after']             = $this->m_mahasiswa->check_queue_validation_after($id);
        $data['get_before_validation'] = $this->m_mahasiswa->get_proposal_before_validation_queue($id);
        $data['get_after_validation']  = $this->m_mahasiswa->get_proposal_after_validation_queue($id);

        if ($this->input->post('sign')) {
            $this->m_mahasiswa->register_proposal_kti($id, $semesternow);
            redirect("mahasiswa/proposal_kti");
        }

        if ($this->input->post('add_dosen')) {
            $this->m_mahasiswa->kti_add_dosen($id, $semesternow);
            redirect("mahasiswa/proposal_kti");
        }

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/kti/index');
        $this->load->view('mahasiswa/footer');
    }

    public function edit_judul_kti()
    {
        $data['username']   = $this->session->userdata('username');
        $data['nav']        = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id                 = $data['username'];
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);

        if ($this->input->post('edit')) {
            $this->m_mahasiswa->edit_judul_kti($id);
            redirect("mahasiswa/proposal_kti");
        }

        // dump($data);
        $this->load->view('mahasiswa/navbar', $data);
        $this->load->view('mahasiswa/kti/edit_judul_kti');
        $this->load->view('mahasiswa/footer');
    }

    public function queue_upload_log_kti_before()
    {
        $id                 = $this->session->userdata('username');
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        // dump($data);
        $this->m_mahasiswa->upload_log_kti_before($id);
    }

    public function queue_upload_log_kti_after()
    {
        $id                 = $this->session->userdata('username');
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        // dump($data);     
        $this->m_mahasiswa->upload_log_kti_after($id);
    }

    public function queue_upload_log_proposal_kti()
    {
        $id                  = $this->session->userdata('username');
        $data['check_sign']  = $this->m_mahasiswa->check_proposal_apply($id);
        $proposal_kti        = $data['check_sign']['0']['unique_id'];
        $data['check_dosen'] = $this->m_mahasiswa->check_dosen_sblm_kti($id);
        $dosen               = $data['check_dosen'];
        // $cek          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = '$nim' and tahunajaran = '$kodesemester'");
        // dump($data);
        date_default_timezone_set('Asia/Jakarta');
        // $default = 'Pengesahan Sebelum Sidang';
        $this->m_mahasiswa->upload_log_proposal_kti($id);
    }

    public function queue_upload_log_proposal_kti_after()
    {
        $id                  = $this->session->userdata('username');
        $data['check_sign']  = $this->m_mahasiswa->check_proposal_apply($id);
        $proposal_kti        = $data['check_sign']['0']['unique_id'];
        $data['check_dosen'] = $this->m_mahasiswa->check_dosen_sblm_kti($id);
        $dosen               = $data['check_dosen'];
        // $cek          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = '$nim' and tahunajaran = '$kodesemester'");
        // dump($data);
        date_default_timezone_set('Asia/Jakarta');
        // $default = 'Pengesahan Sesudah Sidang';
        $this->m_mahasiswa->upload_log_kti_proposal_after($id);
    }

    public function queue_before_kti()
    {
        $id                  = $this->session->userdata('username');
        $data['kti']         = $this->db->query("SELECT * FROM tb_kti WHERE tb_kti.rel_nim = '$id'")->row();
        $proposal_kti        = $data['kti']->unique_id;
        $data['check_dosen'] = $this->m_mahasiswa->check_dosen_sblm_kti($id);
        $dosen               = $data['check_dosen'];
        // $cek          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = '$nim' and tahunajaran = '$kodesemester'");
        // dump($data);
        date_default_timezone_set('Asia/Jakarta');
        $default = 'Pengesahan Sebelum Sidang KTI';

        foreach ($dosen as $dosen) {
            $create = array(
                'rel_nim'         => $id,
                'rel_id_proposal' => $proposal_kti,
                'rel_nidn'        => $dosen['nidn'],
                'tipe'            => $default,
            );
            // dump($create);
            $this->db->insert('tb_validasi_proposal', $create);
        }

        redirect('mahasiswa/kti');
    }

    public function queue_after_kti()
    {
        $id                  = $this->session->userdata('username');
        $data['kti']         = $this->db->query("SELECT * FROM tb_kti WHERE tb_kti.rel_nim = '$id'")->row();
        $proposal_kti        = $data['kti']->unique_id;
        $data['check_dosen'] = $this->m_mahasiswa->check_dosen_stlh_kti($id);
        $dosen               = $data['check_dosen'];
        // $cek          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = '$nim' and tahunajaran = '$kodesemester'");
        // dump($data);
        date_default_timezone_set('Asia/Jakarta');
        $default = 'Pengesahan Sesudah Sidang KTI';

        foreach ($dosen as $dosen) {
            $create = array(
                'rel_nim'         => $id,
                'rel_id_proposal' => $proposal_kti,
                'rel_nidn'        => $dosen['nidn'],
                'tipe'            => $default,
            );
            // dump($create);
            $this->db->insert('tb_validasi_proposal', $create);
        }

        redirect('mahasiswa/kti');
    }

    public function queue_before_proposal_kti()
    {
        $id                  = $this->session->userdata('username');
        $data['check_sign']  = $this->m_mahasiswa->check_proposal_apply($id);
        $proposal_kti        = $data['check_sign']['0']['unique_id'];
        $data['check_dosen'] = $this->m_mahasiswa->check_dosen_sblm_kti($id);
        $dosen               = $data['check_dosen'];
        // $cek          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = '$nim' and tahunajaran = '$kodesemester'");
        // dump($data);
        date_default_timezone_set('Asia/Jakarta');
        $default = 'Pengesahan Sebelum Sidang Proposal KTI';

        foreach ($dosen as $dosen) {
            $create = array(
                'rel_nim'         => $id,
                'rel_id_proposal' => $proposal_kti,
                'rel_nidn'        => $dosen['nidn'],
                'tipe'            => $default,
            );
            $this->db->insert('tb_validasi_proposal', $create);
        }

        redirect('mahasiswa/proposal_kti');
    }

    public function queue_after_proposal_kti()
    {
        $id                  = $this->session->userdata('username');
        $data['check_sign']  = $this->m_mahasiswa->check_proposal_apply($id);
        $proposal_kti        = $data['check_sign']['0']['unique_id'];
        $data['check_dosen'] = $this->m_mahasiswa->check_dosen_stlh_kti($id);
        $dosen               = $data['check_dosen'];
        // $cek          = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = '$nim' and tahunajaran = '$kodesemester'");
        // dump($data);
        date_default_timezone_set('Asia/Jakarta');
        $default = 'Pengesahan Sesudah Sidang Proposal KTI';

        foreach ($dosen as $dosen) {
            $create = array(
                'rel_nim'         => $id,
                'rel_id_proposal' => $proposal_kti,
                'rel_nidn'        => $dosen['nidn'],
                'tipe'            => $default,
            );
            $this->db->insert('tb_validasi_proposal', $create);
        }

        redirect('mahasiswa/proposal_kti');
    }

    public function cetak_pengesahan_kti_before()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $data['username'];
        $data['kti']      = $this->db->query("SELECT * FROM tb_kti WHERE tb_kti.rel_nim = '$id'")->row();
        $data['dosen']    = $this->m_mahasiswa->check_queue_kti_validation_before($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sebelum_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($data);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
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
            $image_name = 'qrcode_kti_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sebelum_Sidang_Proposal_KTI_$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_sebelum_sidang_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_pengesahan_lr_kti_before()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        $id               = $data['username'];
        $data['kti']      = $this->db->query("SELECT * FROM tb_kti WHERE tb_kti.rel_nim = '$id'")->row();
        $data['dosen']    = $this->m_mahasiswa->check_queue_kti_validation_before($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sebelum_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($data);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
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
            $image_name = 'qrcode_kti_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sebelum_Sidang_Proposal_KTI_$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_lr_sebelum_sidang_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_pengesahan_proposal_kti_before()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id                 = $data['username'];
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        $data['dosen']      = $this->m_mahasiswa->check_queue_validation($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sebelum_proposal_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($isi);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
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
            $image_name = 'qrcode_kti_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sebelum_Sidang_KTI_$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_sebelum_sidang_proposal_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_pengesahan_lr_proposal_kti_before()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id                 = $data['username'];
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        $data['dosen']      = $this->m_mahasiswa->check_queue_validation($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sebelum_proposal_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($isi);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
            $this->load->library('ciqrcode');
            $config['cacheable'] = true; //boolean, the default is true
            $config['cachedir']  = './uploads/'; //string, the default is application/cache/
            $config['errorlog']  = './uploads/'; //string, the default is application/logs/
            $config['imagedir']  = './uploads/qrcode/'; //direktori penyimpanan qr code
            $config['quality']   = true; //boolean, the default is true
            $config['size']      = '1024'; //interger, the default is 1024
            $config['black']     = array(225, 255, 255); // array, default is array(255,255,255)
            $config['white']     = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name = 'qrcode_kti_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sebelum_Sidang_KTI_Literatur_Review$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_lr_sebelum_sidang_proposal_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_pengesahan_kti_after()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id                 = $data['username'];
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        $data['dosen']      = $this->m_mahasiswa->check_queue_validation_after($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sesudah_proposal_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($data);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
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
            $image_name = 'qrcode_kti_after_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sesudah_Sidang_KTI_$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_sesudah_sidang_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_pengesahan_lr_kti_after()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id                 = $data['username'];
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        $data['dosen']      = $this->m_mahasiswa->check_queue_validation_after($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sesudah_proposal_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($data);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
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
            $image_name = 'qrcode_kti_after_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sesudah_Sidang_KTI_Literatur_Review$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_lr_sesudah_sidang_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_pengesahan_proposal_kti_after()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id                 = $data['username'];
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        $data['dosen']      = $this->m_mahasiswa->check_queue_validation_after($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sesudah_proposal_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($isi);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
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
            $image_name = 'qrcode_proposal_kti_after_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sesudah_Sidang_Proposal_KTI_$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_sesudah_sidang_proposal_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function cetak_pengesahan_lr_proposal_kti_after()
    {

        $data['username'] = $this->session->userdata('username');
        $data['nav']      = $this->db->get_where('tbmahasiswa', array('nim' => $data['username']))->row();
        //$data['getmhs'] = $this->db->get_where('tbmahasiswa', array('nim'=> $data['username']))->row();
        $id                 = $data['username'];
        $data['check_sign'] = $this->m_mahasiswa->check_proposal_apply($id);
        $data['dosen']      = $this->m_mahasiswa->check_queue_validation_after($id);

        foreach ($data['dosen'] as $dosen) {
            $isi[] = array(
                'qrcode'    => 'http://damas.akfarsurabaya.ac.id/verifikator/sesudah_proposal_kti/' . $dosen['qrcode_id'],
                'file_name' => $dosen['qrcode_id'])

            ;

        };
        // dump($isi);
        // $data_qr = 'bukti_';
        foreach ($isi as $isi) {
            $this->load->library('ciqrcode');
            $config['cacheable'] = true; //boolean, the default is true
            $config['cachedir']  = './uploads/'; //string, the default is application/cache/
            $config['errorlog']  = './uploads/'; //string, the default is application/logs/
            $config['imagedir']  = './uploads/qrcode/'; //direktori penyimpanan qr code
            $config['quality']   = true; //boolean, the default is true
            $config['size']      = '1024'; //interger, the default is 1024
            $config['black']     = array(225, 255, 255); // array, default is array(255,255,255)
            $config['white']     = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name = 'qrcode_proposal_kti_after_' . $isi['file_name'] . '.png';

            $params['data']     = $isi['qrcode']; //data yang akan di jadikan QR CODE
            $params['level']    = 'H'; //H=High
            $params['size']     = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name;
            $this->ciqrcode->generate($params);
        };

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pengesahan_Sebelum_Sidang_KTI_Literatur_Review_$id.pdf";
        // $this->pdf->load_view('mahasiswa/navbar', $data);
        $this->pdf->load_view('mahasiswa/kti/cetak_pengesahan_lr_sesudah_sidang_proposal_kti', $data);
        // $this->pdf->load_view('mahasiswa/footer');
    }

    public function hapus_dosen_kti()
    {
        $nidn  = $this->uri->segment(3);
        $id    = $this->uri->segment(4);
        $where = array('rel_nidn' => $nidn, 'rel_nim' => $id);
        $this->m_mahasiswa->hapus_data($where, 'tb_dosen_proposal');
        redirect("mahasiswa/proposal_kti");
    }

}
