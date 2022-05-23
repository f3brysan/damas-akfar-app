<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
// START For Import Excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// END For Import Excel

class Dosen extends CI_Controller
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
        $data['wali']     = $this->m_dosen->getdatamahasiswadosen($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/index');
        $this->load->view('dosen/footer');
    }
    public function data_pjmk()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/pjmk/datapjmk');
        $this->load->view('dosen/footer');
    }
    public function pjmkbymatkul()
    {
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $reguler             = $this->uri->segment(5);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['reguler']     = $reguler;
        $data['username']    = $this->session->userdata('username');
        $nidn                = $data['username'];
        $data['getdosen']    = $this->m_dosen->getselecteddosen($nidn);
        $data['pjmk']        = $this->m_dosen->getdosenpjmk($nidn);
        $data['pembagi']     = $this->m_dosen->pembagi($tahunajaran, $kodematkul);
        $data['get']         = $this->m_dosen->selectedmatkulbykode($tahunajaran, $kodematkul, $reguler);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/pjmk/pjmkbymatkul');
        $this->load->view('dosen/footer');
    }
    public function nilai_semester_by_kelas()
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
        $data['get']         = $this->m_admin->getnilaibykelas($tahunajaran, $kodematkul, $kelas);
        $data['matkul']      = $this->m_admin->getmatkulbypjmk($tahunajaran, $kodematkul, $reguler);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/pjmk/pjmknilai');
        $this->load->view('dosen/footernilai');

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
            $sheet->getStyle("A" . $x)->getNumberFormat()->setFormatCode('0.00');
            $x++;
        }
        $nama_file = $kodematkul . '_' . $kelas;
        // $objWriter = new PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $writer = new Xlsx($spreadsheet);
        ob_end_clean();
        // $writer->save($nama_file.'.xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $nama_file . '.xlsx"');
        $writer->save("php://output");

    }

    public function updatenilai()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $id               = $this->input->post("id");
        $value            = $this->input->post("value");
        $modul            = $this->input->post("modul");
        $this->m_admin->updatenilaimhs($id, $value, $modul);
        date_default_timezone_set('Asia/Jakarta');
        $create = array(
            'nilai'  => $value,
            'source' => $id,
            'input'  => $nidn,
            'date'   => date("Y-m-d H:i:s"),
        );
        //dump($create);
        $this->m_admin->inputakun($create, 'tblognilai');
        echo "{}";
    }

    // add by akbar - Fungsi Upload Excel
    public function upload()
    {
        // $data = array();
        // $data['title'] = 'Import Excel Sheet | TechArise';
        // $data['breadcrumbs'] = array('Home' => '#');
        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        if ($this->form_validation->run() == false) {

            $this->load->view('spreadsheet/index', $data);
        } else {

            // START For Import Excel
            // If file uploaded
            if (!empty($_FILES['fileURL']['name'])) {
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

                if ($extension == 'csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif ($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet    = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // array Count
                $arrayCount   = count($allDataInSheet);
                $flag         = 0;
                $createArray  = array('ID', 'NIM', 'NAMA', 'NILAI');
                $makeArray    = array('ID' => 'ID', 'NIM' => 'NIM', 'NAMA' => 'NAMA', 'NILAI' => 'NILAI');
                $SheetDataKey = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value                      = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        }
                    }
                }
                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                // match excel sheet column
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $idmatkul  = $SheetDataKey['ID'];
                        $nim       = $SheetDataKey['NIM'];
                        $nama      = $SheetDataKey['NAMA'];
                        $nilai     = $SheetDataKey['NILAI'];
                        // echo $nim;
                        $idmatkul    = filter_var(trim($allDataInSheet[$i][$idmatkul]), FILTER_SANITIZE_STRING);
                        $nim         = filter_var(trim($allDataInSheet[$i][$nim]), FILTER_SANITIZE_STRING);
                        $nama        = filter_var(trim($allDataInSheet[$i][$nama]), FILTER_SANITIZE_STRING);
                        $nilai       = filter_var(trim($allDataInSheet[$i][$nilai]), FILTER_SANITIZE_EMAIL);
                        $fetchData[] = array('ID' => $idmatkul, 'NIM' => $nim, 'NAMA' => $nama, 'NILAI' => $nilai);
                    }
                    $data['dataInfo'] = $fetchData;
                    // $this->madmin->setBatchImport($fetchData);
                    // $this->madmin->importData();
                    foreach ($fetchData as $key => $element) {
                        $this->madmin->saveNilaiExcel($element['ID'], $element['NIM'], $element['NILAI']);
                    }
                } else {
                    echo "Please import correct file, did not match excel sheet column";
                };
                // $this->load->view('dosen/pjmk/display', $data);
                $get_last_url = $_SERVER['HTTP_REFERER'];
                redirect($get_last_url);
            }
        }
    }

    // checkFileValidation
    public function checkFileValidation($string)
    {
        $file_mimes = array('text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        );
        if (isset($_FILES['fileURL']['name'])) {
            $arr_file  = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
                return true;
            } else {
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }

    public function cetakkhsperkelas()
    {
        $data['username']    = $this->session->userdata('username');
        $nidn                = $data['username'];
        $tahunajaran         = $this->uri->segment(3);
        $kodematkul          = $this->uri->segment(4);
        $kelas               = $this->uri->segment(5);
        $data['tahunajaran'] = $tahunajaran;
        $data['kodematkul']  = $kodematkul;
        $data['kelas']       = $kelas;
        $str                 = $kelas;
        $chars               = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
        $reguler             = $chars[0];
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

    public function nilai_kpm()
    {
        $data['username']     = $this->session->userdata('username');
        $nidn                 = $data['username'];
        $data['getdosen']     = $this->m_dosen->getselecteddosen($nidn);
        $data['get_data_kpm'] = $this->m_dosen->get_data_kpm();
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/kpm/index');
        $this->load->view('dosen/footer');
    }

    public function data_mhs_kpm()
    {
        $data['username']     = $this->session->userdata('username');
        $nidn                 = $data['username'];
        $tahunajaran          = $this->uri->segment(3);
        $data['getdosen']     = $this->m_dosen->getselecteddosen($nidn);
        $data['get_data_kpm'] = $this->m_dosen->get_data_mhs_kpm($nidn, $tahunajaran);
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/kpm/list_mhs');
        $this->load->view('dosen/footer');
    }

    public function input_nilai_kpm()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $nim              = $this->uri->segment(3);
        $tahunajaran      = $this->uri->segment(4);
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $data['nilai']    = $this->m_dosen->get_nilai_kpm($nim);
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        if ($this->input->post('sbmt')) {
            $this->m_dosen->edit_nilai_kpm($nim);
            redirect("dosen/data_mhs_kpm/$tahunajaran");
        }

        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/kpm/input');
        $this->load->view('dosen/footer');
    }

    public function input_khs_kpm()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $nim              = $this->uri->segment(3);
        $kodematkul       = $this->uri->segment(4);
        $tahunajaran      = $this->uri->segment(5);
        $nilai            = $this->uri->segment(6);
        // $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        // $data['nilai']    = $this->m_dosen->get_nilai_kpm($nim);
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);

        $data = array(
            'nilai' => $nilai,
        );
        // dump($data);
        $this->m_dosen->input_khs_kpm($data, $nim, $kodematkul, $tahunajaran);
        redirect("dosen/data_mhs_kpm/$tahunajaran");

    }

    public function hasil_ekd()
    {
        $data['username']    = $this->session->userdata('username');
        $nidn                = $data['username'];
        $data['getdosen']    = $this->m_dosen->getselecteddosen($nidn);
        $data['matkul_list'] = $this->m_dosen->get_data_list_ekd($nidn);
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/ekd/index');
        $this->load->view('dosen/footer');
    }

    public function detil_hasil_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $kode_ekd         = $this->uri->segment(3);
        $kodematkul       = $this->uri->segment(4);
        // $data['ekd_selected'] = $this->m_admin->ekd_dosen_selected($kode_ekd, $nidn);
        $data['get_ekd']   = $this->m_admin->get_detil_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        $data['hasil_ekd'] = $this->m_admin->get_nilai_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/ekd/detil_ekd');
        $this->load->view('dosen/footer');
    }

    public function cetak_hasil_ekd()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
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

    public function validasi_proposal_kti()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        // $data['ekd_selected'] = $this->m_admin->ekd_dosen_selected($kode_ekd, $nidn);
        $data['waiting_kti'] = $this->m_dosen->get_waiting_validasi_proposal_kti($nidn);
        $data['all_kti']     = $this->m_dosen->get_all_validasi_proposal_kti($nidn);
        // $data['hasil_ekd']      = $this->m_admin->get_nilai_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/kti/list');
        $this->load->view('dosen/footer');
    }

    public function validasi_kti()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        // $data['ekd_selected'] = $this->m_admin->ekd_dosen_selected($kode_ekd, $nidn);
        $data['waiting_kti'] = $this->m_dosen->get_waiting_validasi($nidn);
        $data['all_kti']     = $this->m_dosen->get_all_validasi($nidn);
        // $data['hasil_ekd']      = $this->m_admin->get_nilai_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul);
        // $data['pjmk']     = $this->m_dosen->getdosenpjmk($nidn);
        // dump($data);
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/kti/list');
        $this->load->view('dosen/footer');
    }

    public function gantipassword()
    {
        $data['username'] = $this->session->userdata('username');
        $nidn             = $data['username'];
        $data['getdosen'] = $this->m_dosen->getselecteddosen($nidn);
        $data['login']    = $this->db->get_where('tbuser', array('username' => $nidn))->row();
        $truepassword     = $data['login'];
        $getpassword      = $truepassword->password;
        $data['hasil']    = array('getpassword' => $getpassword,
            'oldpassword'                           => md5($this->input->post('password', true)),
            'newpassword'                           => md5($this->input->post('newpassword', true)),
            'newpassword2'                          => md5($this->input->post('newpassword2', true)));
        $oldpassword  = md5($this->input->post('password', true));
        $newpassword  = md5($this->input->post('newpassword', true));
        $newpassword2 = md5($this->input->post('newpassword2', true));
        // dump($data['hasil']);
        if ($this->input->post('submit')) {
            if (strtoupper($oldpassword) != strtoupper($getpassword)) {

                $this->session->set_flashdata('message', 'Maaf Password Lama Anda Salah');
                redirect("dosen/gantipassword");
            } else {
                if ($newpassword != $newpassword2) {

                    $this->session->set_flashdata('message', 'Maaf Ketikan Ulang Password Anda Berbeda');
                    redirect("dosen/gantipassword");
                } else {
                    $data = array(
                        'password' => $newpassword,
                    );
                    // dump($data);

                    $res_insert = $this->db->update('tbuser', $data, array('username' => $nidn));
                    redirect("dosen");
                }

            }
        }
        $this->load->view('dosen/navbar', $data);
        $this->load->view('dosen/gantipassword');
        $this->load->view('dosen/footer');
    }

    public function setujui_kti($nim)
    {   
        $data['username']     = $this->session->userdata('username');
        $nidn                 = $data['username'];     
        $id = $this->uri->segment(3);
        $rel_nim = $this->uri->segment(4);
        $hashkey      = md5($nidn.$rel_nim.$id);        
        $this->m_dosen->setujuikti($id, $hashkey);
        redirect('dosen/validasi_kti');
    }

    public function tolak_kti($nim)
    {                
        $id = $this->uri->segment(3);                    
        $this->m_dosen->tolakkti($id);
        redirect('dosen/validasi_kti');
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('login');
    }

}
