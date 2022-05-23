<?php

require 'vendor/autoload.php';
// START For Import Excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Prodi extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect('login');
        }
        if ($this->session->userdata('level') !== "prodi") {
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
        $data['username']       = $this->session->userdata('username');
        $nidn                   = $data['username'];
        $data['activesemester'] = $this->m_admin->getbayar();
        $last                   = $data['activesemester'][0]['kode'];
        $data['count']          = $this->m_admin->countnilaiterisi($last);
        // $data['count'] = $this->m_dosen->countdosennilai($nidn);
        // $data['wali'] = $this->m_dosen->getdatamahasiswadosen($nidn);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/index');
        $this->load->view('prodi/footer');
    }

    public function data_pjmk()
    {
        $data['username'] = $this->session->userdata('username');
        $data['bayar']    = $this->m_admin->getdatapjmk();
        // dump($data['bayar']);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterpjmk/pjmkbysemester');
        $this->load->view('prodi/footer');
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
        redirect('prodi/data_pjmk');
    }
    public function pjmkdisallowed()
    {
        $id    = $this->uri->segment(3);
        $value = '0';
        $data  = array(
            'permit' => $value,
        );
        // dump($id);
        $this->m_admin->permitpjmkall($data, $id);
        redirect('prodi/data_pjmk');
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
        redirect('prodi/data_pjmk');
    }
    public function pjmkbyta()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['tahunajaran'] = $tahunajaran;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->selectedmatkulbyta($tahunajaran);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterpjmk/pjmkbyta');
        $this->load->view('prodi/footer');
    }
    public function pjmkbymatkul()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->getdatapjmkbymatkul($tahunajaran, $kodematkul);
        $data['matkul']      = $this->m_admin->getselectedmatkul($kodematkul);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterpjmk/pjmkbymatkul');
        $this->load->view('prodi/footer');
    }
    public function tambahpjmk()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['username']    = $this->session->userdata('username');
        $data['dosen']       = $this->m_dosen->getalldosen();
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['get']         = $this->m_admin->getselectedmatkul($kodematkul);
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_admin->addpjmk($tahunajaran, $kodematkul);
            redirect("prodi/pjmkbymatkul/$tahunajaran/$kodematkul");
        }
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterpjmk/addpjmk');
        $this->load->view('prodi/footer');
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
        $data['get']        = $this->m_admin->getselectedmatkul($kodematkul);
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_admin->updatepjmk($id, $kodematkul);
            redirect("prodi/pjmkbymatkul/$tahunajaran/$kodematkul");
        }
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterpjmk/editpjmk');
        $this->load->view('prodi/footer');
    }
    public function hapuspjmk()
    {
        $id          = $this->uri->segment(5);
        $kodematkul  = $this->uri->segment(4);
        $tahunajaran = $this->uri->segment(3);
        $where       = array('id' => $id);
        $this->m_dosen->hapus_data($where, 'tbajar');
        redirect("prodi/pjmkbymatkul/$tahunajaran/$kodematkul");
    }

    // MASTER INPUT NILAI

    public function nilai_semester()
    {
        $data['username'] = $this->session->userdata('username');
        $data['bayar']    = $this->m_admin->getbayar();
        // dump($data['bayar']);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterkhs/datasemester');
        $this->load->view('prodi/footer');
    }
    public function nilai_semester_by_ta()
    {
        $tahunajaran         = $this->uri->segment(3);
        $data['tahunajaran'] = $tahunajaran;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->selectedmatkulbyta($tahunajaran);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterkhs/datamatkul');
        $this->load->view('prodi/footer');
    }
    public function nilai_semester_by_matkul()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->selectedmatkulbykode($tahunajaran, $kodematkul);
        $data['grafika']     = $this->m_admin->grafikmatkulbyrega($tahunajaran, $kodematkul);
        $data['grafikb']     = $this->m_admin->grafikmatkulbyregb($tahunajaran, $kodematkul);
        $data['matkul']      = $this->m_admin->getmatkulbypjmkprodi($tahunajaran, $kodematkul);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterkhs/datakelas');
        $this->load->view('prodi/footer');
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
        $data['matkul']      = $this->m_admin->getmatkulbypjmkprodi($kodematkul);
        // $data['log'] = $this->m_admin->loginputnilai($tahunajaran,$kodematkul);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterkhs/datanilai');
        $this->load->view('prodi/footernilai');
    }
    public function ceklog()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $nim                 = $this->uri->segment(5);
        $data['kelas']       = $this->uri->segment(6);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['nim']         = $nim;
        $data['username']    = $this->session->userdata('username');
        $data['log']         = $this->m_admin->loginputnilai($tahunajaran, $kodematkul, $nim);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/masterkhs/ceklog');
        $this->load->view('prodi/footernilai');
    }

    public function updatenilai()
    {
        $id    = $this->input->post("id");
        $value = $this->input->post("value");
        $modul = $this->input->post("modul");
        $this->m_admin->updatenilaimhs($id, $value, $modul);
        echo "{}";
    }

    public function cetakkhsperkelas()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $kelas               = $this->uri->segment(5);
        $str                 = $kelas;
        $chars               = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
        $reguler             = $chars[0];
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['kelas']       = $kelas;
        $data['username']    = $this->session->userdata('username');
        $data['get']         = $this->m_admin->getnilaibykelas($tahunajaran, $kodematkul, $kelas);
        $data['matkul']      = $this->m_admin->getmatkulbypjmk($tahunajaran, $kodematkul, $reguler);
        // $data['getips'] = $data['ips'];
        // dump($data);
        $this->load->library('pdf');
        // $this->load->view('mahasiswa/navbar', $data);
        // $this->load->view('mahasiswa/khs/detailkhs');
        // $this->load->view('mahasiswa/footer');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "print_nilai_'$tahunajaran'_'$kodematkul'_$kelas.pdf";
        $this->pdf->load_view('prodi/masterkhs/cetakdatanilai', $data);
    }

    public function data_peserta_yudisium()
    {
        $data['username'] = $this->session->userdata('username');
        $data['yudisum']  = $this->m_admin->get_data_yudisium();
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/yudisium/index');
        $this->load->view('prodi/footer');
    }

    public function detail_peserta_yudisium()
    {
        $kode             = $this->uri->segment(3);
        $data['username'] = $this->session->userdata('username');
        $data['list']     = $this->m_admin->get_list_pendaftar_yudisium($kode);
        // $data['wait']     = $this->m_admin->get_waiting_pendaftar_yudisium($kode);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/yudisium/detail_peserta_yudisium');
        $this->load->view('prodi/footer');
    }

    public function detail_status_peserta_yudisium()
    {
        $nim                  = $this->uri->segment(3);
        $data['username']     = $this->session->userdata('username');
        $data['yudisium']     = $this->db->get_where('tb_peserta_yudisium', array('nim' => $nim))->row();
        $data['bio_yudisium'] = $this->db->get_where('tbmahasiswa', array('nim' => $nim))->row();
        $data['spp']          = $this->m_mahasiswa->yudisium_spp_check($nim);
        $data['bebas_perpus'] = $this->m_mahasiswa->yudisium_perpus_check($nim);
        $data['bebas_kti']    = $this->m_mahasiswa->yudisium_kti_check($nim);
        $data['bebas_lab']    = $this->m_mahasiswa->yudisium_lab_check($nim);
        $data['nilai_se']     = $this->m_mahasiswa->yudisium_se_check($nim);
        $data['nilai_kpm']    = $this->m_mahasiswa->yudisium_kpm_check($nim);
        $data['min_nilai']    = $this->m_mahasiswa->yudisium_nilai_deny($nim);
        // $data['wait']     = $this->m_admin->get_waiting_pendaftar_yudisium($kode);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/yudisium/status');
        $this->load->view('prodi/footer');
    }

    public function yudisium_open()
    {
        $kode  = $this->uri->segment(3);
        $value = 'open';
        $data  = array(
            'status' => $value,
        );
        // dump($id);
        $this->m_admin->yudisium_permit($data, $kode);
        redirect('prodi/data_peserta_yudisium');
    }

    public function yudisium_close()
    {
        $kode  = $this->uri->segment(3);
        $value = 'close';
        $data  = array(
            'status' => $value,
        );
        // dump($id);
        $this->m_admin->yudisium_permit($data, $kode);
        redirect('prodi/data_peserta_yudisium');
    }

    public function allow_perpus_yudisium()
    {
        $kode  = $this->uri->segment(3);
        $id    = $this->uri->segment(4);
        $value = 'allow';
        $data  = array(
            'acc_bukti_perpus' => $value,
        );
        // dump($id);
        $this->m_admin->acc_yudisium($data, $id);
        redirect("prodi/detail_peserta_yudisium/$kode");
    }

    public function deny_perpus_yudisium()
    {
        $kode  = $this->uri->segment(3);
        $id    = $this->uri->segment(4);
        $value = 'deny';
        $data  = array(
            'acc_bukti_perpus' => $value,
        );
        // dump($id);
        $this->m_admin->acc_yudisium($data, $id);
        redirect("prodi/detail_peserta_yudisium/$kode");
    }

    public function allow_lab_yudisium()
    {
        $kode  = $this->uri->segment(3);
        $id    = $this->uri->segment(4);
        $value = 'allow';
        $data  = array(
            'acc_bukti_lab' => $value,
        );
        // dump($id);
        $this->m_admin->acc_yudisium($data, $id);
        redirect("prodi/detail_peserta_yudisium/$kode");
    }

    public function deny_lab_yudisium()
    {
        $kode  = $this->uri->segment(3);
        $id    = $this->uri->segment(4);
        $value = 'deny';
        $data  = array(
            'acc_bukti_lab' => $value,
        );
        // dump($id);
        $this->m_admin->acc_yudisium($data, $id);
        redirect("prodi/detail_peserta_yudisium/$kode");
    }

    public function ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $data['ekd']      = $this->m_admin->get_data_ekd();
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/index');
        $this->load->view('prodi/footer');
    }

    public function tambah_ekd()
    {
        $data['username']    = $this->session->userdata('username');
        $data['ekd']         = $this->m_admin->get_data_ekd();
        $data['tahunajaran'] = $this->m_admin->getbayar();
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_admin->ekd_adD();
            redirect("prodi/ekd");
        }
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/ekd_add');
        $this->load->view('prodi/footer');
    }

    public function matkul_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $kode             = $this->uri->segment(3);
        $data['matkul']   = $this->m_admin->get_matkul_ekd($kode);
        // dump($data);
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/ekd_matkul');
        $this->load->view('prodi/footer');
    }

    public function kelas_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $kode_ekd         = $this->uri->segment(3);
        $kodematkul       = $this->uri->segment(4);
        $data['kelas']    = $this->m_admin->get_kelas_ekd($kode_ekd, $kodematkul);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/ekd_kelas');
        $this->load->view('prodi/footer');
    }

    public function dosen_ekd()
    {
        $data['username']            = $this->session->userdata('username');
        $kode_ekd                    = $this->uri->segment(3);
        $kodematkul                  = $this->uri->segment(4);
        $kelas                       = $this->uri->segment(5);
        $data['dosen']               = $this->m_admin->get_dosen_by_kelas_ekd($kode_ekd, $kodematkul, $kelas);
        $data['kelas']               = $this->m_admin->get_kelas_ekd($kode_ekd, $kodematkul);
        $data['selected_matkul']     = $data['kelas']['0'];
        $data['selected_kelas']      = $kelas;
        $data['selected_kode_ekd']   = $kode_ekd;
        $data['selected_kodematkul'] = $kodematkul;
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/ekd_dosen');
        $this->load->view('prodi/footer');
    }

    public function tambah_dosen_ekd()
    {
        $data['username']            = $this->session->userdata('username');
        $kode_ekd                    = $this->uri->segment(3);
        $kodematkul                  = $this->uri->segment(4);
        $kelas                       = $this->uri->segment(5);
        $data['selected_kelas']      = $kelas;
        $data['selected_kode_ekd']   = $kode_ekd;
        $data['selected_kodematkul'] = $kodematkul;
        $data['ekd']                 = $this->m_admin->get_data_ekd();
        $data['dosen']               = $this->m_dosen->getalldosen();
        // $data['get_kode_ekd'] = $kode_ekd;
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_admin->ekd_add_dosen();
            redirect("prodi/dosen_ekd/$kode_ekd/$kodematkul/$kelas");
        }
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/ekd_add_dosen');
        $this->load->view('prodi/footer');
    }

    public function hapus_dosen_ekd()
    {
        $kode_ekd   = $this->uri->segment(3);
        $kodematkul = $this->uri->segment(4);
        $kelas      = $this->uri->segment(5);
        $id         = $this->uri->segment(6);
        $where      = array('id' => $id);
        $this->m_dosen->hapus_data($where, 'tb_dosen_ekd');
        redirect("prodi/dosen_ekd/$kode_ekd/$kodematkul/$kelas");
    }

    public function soal_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $data['soal']     = $this->m_admin->get_soal_ekd();
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/ekd_soal');
        $this->load->view('prodi/footer');
    }

    public function tambah_soal_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        // $data['ekd'] = $this->m_admin->get_data_ekd();
        // $data['tahunajaran'] = $this->m_admin->getbayar();
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_admin->ekd_soal_add();
            redirect("prodi/soal_ekd");
        }
        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd/ekd_add_soal');
        $this->load->view('prodi/footer');
    }

    public function hasil_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $data['ekd']      = $this->m_admin->get_data_ekd();
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd_hasil/index');
        $this->load->view('prodi/footer');
    }

    public function hasil_ekd_by_dosen()
    {
        $data['username']     = $this->session->userdata('username');
        $kode_ekd             = $this->uri->segment(3);
        $data['ekd_selected'] = $this->m_admin->ekd_selected($kode_ekd);
        $data['dosen_list']   = $this->m_admin->get_hasil_dosen_ekd($kode_ekd);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd_hasil/dosen_list');
        $this->load->view('prodi/footer');
    }

    public function detil_ekd_dosen()
    {
        $data['username']     = $this->session->userdata('username');
        $kode_ekd             = $this->uri->segment(3);
        $nidn                 = $this->uri->segment(4);
        $data['ekd_selected'] = $this->m_admin->ekd_dosen_selected($kode_ekd, $nidn);
        $data['matkul_list']  = $this->m_admin->get_hasil_ekd_by_matkul_dosen($kode_ekd, $nidn);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd_hasil/matkul_list');
        $this->load->view('prodi/footer');
    }

    public function hasil_ekd_dosen()
    {
        $data['username'] = $this->session->userdata('username');
        $kode_ekd         = $this->uri->segment(3);
        $nidn             = $this->uri->segment(4);
        $kodematkul       = $this->uri->segment(5);
        // $data['ekd_selected'] = $this->m_admin->ekd_dosen_selected($kode_ekd, $nidn);
        $data['get_ekd']   = $this->m_admin->get_detil_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        $data['hasil_ekd'] = $this->m_admin->get_nilai_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/ekd_hasil/hasil_ekd');
        $this->load->view('prodi/footer');
    }

    public function cetak_hasil_ekd_dosen()
    {
        $data['username'] = $this->session->userdata('username');
        $kode_ekd         = $this->uri->segment(3);
        $nidn             = $this->uri->segment(4);
        $kodematkul       = $this->uri->segment(5);
        // $data['ekd_selected'] = $this->m_admin->ekd_dosen_selected($kode_ekd, $nidn);
        $data['get_ekd']   = $this->m_admin->get_detil_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        $data['hasil_ekd'] = $this->m_admin->get_nilai_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        $nama_dosen        = $data['get_ekd']['0']['nama'];
        $gelar_dosen       = $data['get_ekd']['0']['gelarbelakang'];
        $nama_matkul       = $data['get_ekd']['0']['matkul'];
        // dump($data);

        $this->load->library('pdf');
        // $this->load->view('mahasiswa/navbar', $data);
        // $this->load->view('mahasiswa/khs/detailkhs');
        // $this->load->view('mahasiswa/footer');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Hasil_EKD_'$kode_ekd'_'$kodematkul'_'$nama_matkul'_'$nidn'_'$nama_dosen', '$gelar_dosen'.pdf";
        $this->pdf->load_view('prodi/ekd_hasil/cetak_ekd', $data);
    }

    public function kpm()
    {
        $data['username']     = $this->session->userdata('username');
        $data['get_data_kpm'] = $this->m_dosen->get_data_kpm();
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/kpm/index');
        $this->load->view('prodi/footer');
    }

    public function proposal_kti()
    {
        $data['username'] = $this->session->userdata('username');
        $data['list']     = $this->m_dosen->get_kode_ta_proposal_kti();
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/proposal_kti/index');
        $this->load->view('prodi/footer');
    }

    public function kti()
    {
        $data['username'] = $this->session->userdata('username');
        $data['list']     = $this->m_dosen->get_kode_ta_kti();
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/kti/index');
        $this->load->view('prodi/footer');
    }

    public function data_mhs_proposal_kti()
    {
        $data['username']    = $this->session->userdata('username');
        $kode_ta             = $this->uri->segment(3);
        $data['waiting_kti'] = $this->m_dosen->get_waiting_validasi_by_ta($kode_ta);
        $data['all_kti']     = $this->m_dosen->get_all_validasi_by_ta($kode_ta);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/proposal_kti/list');
        $this->load->view('prodi/footer');
    }

    public function data_mhs_kti()
    {
        $data['username']    = $this->session->userdata('username');
        $kode_ta             = $this->uri->segment(3);
        // $data['waiting_kti'] = $this->m_dosen->get_waiting_validasi_by_ta($kode_ta);
        $data['all_kti']     = $this->m_dosen->get_all_validasi_kti_by_ta($kode_ta);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/proposal_kti/list');
        $this->load->view('prodi/footer');
    }

    public function approve_proposal_kti()
    {
        $nim  = $this->uri->segment(3);
        $kode = $this->uri->segment(4);
        date_default_timezone_set('Asia/Jakarta');
        $edit = array(
            'acc_at' => date('Y-m-d H:i:s'),
        );
        $this->db->update('tb_proposal_kti', $edit, array('rel_nim' => $nim));
        // dump($id);
        redirect("prodi/data_mhs_proposal_kti/$kode");
    }

    public function disapprove_proposal_kti()
    {
        $nim  = $this->uri->segment(3);
        $kode = $this->uri->segment(4);
        $edit = array(
            'acc_at' => null,
        );
        $this->db->update('tb_proposal_kti', $edit, array('rel_nim' => $nim));
        // dump($id);
        redirect("prodi/data_mhs_proposal_kti/$kode");
    }

    public function detail_mhs_proposal_kti()
    {
        $nim                                          = $this->uri->segment(3);
        $data['username']                             = $this->session->userdata('username');
        $data['yudisium']                             = $this->db->get_where('tb_peserta_yudisium', array('nim' => $nim))->row();
        $data['bio_yudisium']                         = $this->db->get_where('tbmahasiswa', array('nim' => $nim))->row();
        $data['detil_proposal_kti']                   = $this->m_dosen->get_detil_proposal_kti($nim);
        $data['detil_dosen_proposal_kti']             = $this->m_dosen->get_detil_dosen_proposal_kti($nim);
        $data['detil_status_pengesahan_proposal_kti'] = $this->m_dosen->get_detil_dosen_pengesahan_proposal_kti($nim);
        // $data['wait']     = $this->m_admin->get_waiting_pendaftar_yudisium($kode);
        // dump($data);

        $this->load->view('prodi/navbar', $data);
        $this->load->view('prodi/proposal_kti/status');
        $this->load->view('prodi/footer');
    }

    public function reset_unggah_sebelum_proposal_kti()
    {
        $id           = $this->uri->segment(3);
        $reset         = null;
        $find_proposal = 'Pengesahan Sebelum Sidang Proposal KTI';
        $data_proposal = array(
            'attachment' => $reset,
        );
        $where = array('tipe' => $find_proposal, 'rel_nim' => $id);
        // dump($data);
        $this->db->update('tb_proposal_kti', $data_proposal, array('rel_nim' => $id));
        $this->m_mahasiswa->hapus_data($where, 'tb_validasi_proposal');
        redirect("prodi/detail_mhs_proposal_kti/$id");
    }

    public function reset_unggah_sesudah_proposal_kti()
    {
        $id           = $this->uri->segment(3);
        $reset         = null;
        $find_proposal = 'Pengesahan Sesudah Sidang Proposal KTI';
        $data_proposal = array(
            'attachment2' => $reset,
        );
        $where = array('tipe' => $find_proposal, 'rel_nim' => $id);
        // dump($data);
        $this->db->update('tb_proposal_kti', $data_proposal, array('rel_nim' => $id));
        $this->m_mahasiswa->hapus_data($where, 'tb_validasi_proposal');
        redirect("prodi/detail_mhs_proposal_kti/$id");
    }

    public function nilai_semester_by_kelas_excel()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $kelas               = $this->uri->segment(5);
        $data['username']    = $this->session->userdata('username');
        $nidn                = $data['username'];
        $data['getdosen']    = $this->m_dosen->getselecteddosen($nidn);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['kelas']       = $kelas;
        $str                 = $kelas;
        $chars               = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
        $reguler             = $chars[0];
        $data['username']    = $this->session->userdata('username');
        $data_mhs            = $this->m_admin->getnilaibykelas($tahunajaran, $kodematkul, $kelas);
        $data['matkul']      = $this->m_admin->getmatkulbypjmk($tahunajaran, $kodematkul, $reguler);
        // add by akbar
        // $this->load->view('dosen/pjmk/pjmknilai_excel', $data);

        // Create new Spreadsheet Object
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        // Set Document Properties
        $spreadsheet->getProperties()->setCreator('PusKom Akademi Farmasi Surabaya')
            ->setTitle('Template Data Nilai Excel')
            ->setSubject('Import-Export Data Nilai Excel');
        // Add Style
        $styleArray = array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
            // 'borders' => array(
            //     'bottom' => array(
            //         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            //         'color' => array('rgb' => '333333'),
            //     ),
            // )
        );
        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArray);
        // Auto fit column to content
        foreach (range('A', 'D') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        // Set the names of header cells
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'NIM');
        $sheet->setCellValue('C1', 'NAMA');
        $sheet->setCellValue('D1', 'NILAI');
        // Make variable start row
        $x = 2;
        foreach ($data_mhs as $row) {
            $sheet->setCellValue('A' . $x, $kodematkul);
            $sheet->setCellValue('B' . $x, $row['nim']);
            $sheet->setCellValue('C' . $x, $row['namalengkap']);
            $sheet->setCellValue('D' . $x, $row['nilai']);
            $sheet->getStyle("A" . $x)->getNumberFormat()->setFormatCode('0.00');
            $x++;
        }
        $nama_file = $tahunajaran . '_' . $kodematkul . '_' . $kelas;
        // $objWriter = new PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $writer = new Xlsx($spreadsheet);
        ob_end_clean();
        // $writer->save($nama_file.'.xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $nama_file . '.xlsx"');
        $writer->save("php://output");

    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }

}
