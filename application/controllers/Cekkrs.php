<?php

require 'vendor/autoload.php';
// START For Import Excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Endroid\QrCode\Qrcode;
// END For Import Excel

class Cekkrs extends CI_Controller {
	public function __construct() {
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
	public function validasi($token) {
        $cekData = $this->db->query("SELECT * FROM tbvalidasikrs WHERE token = '".$token."'");
        if($cekData != NULL) {
            $dataMhs = $cekData->row();
            $data['username'] = $dataMhs->nim;
            $id = $dataMhs->nim;
            $data['mhs'] = $this->db->get_where('tbmahasiswa', array('nim' => $id))->row();
            $namamhs = $data['mhs']->namalengkap;
            $data['semestermhs'] = $this->m_mahasiswa->getsemestermhs($id);
            $semestermhs = $this->m_mahasiswa->getsemestermhs($id);
            $getsemestermhs = $semestermhs['0']['total'];
            $data['dosenwalimhs'] = $this->m_mahasiswa->getdosenwalimhs($id);
            $data['datakrs'] = $this->m_mahasiswa->getprintedkrs($id, $getsemestermhs);
            $getsemester = $this->db->query("SELECT * FROM tbpembayaran where tbpembayaran.jenis = 'semester' ORDER BY id DESC limit 1 ");
            $getvalidasi = $this->db->query("SELECT * FROM tbvalidasikrs WHERE nim = ".$id." AND `status` = 1 ORDER BY id ASC limit 1 ");
            $data['tahunajaran'] = $getsemester->row();
            $kodesemester = $data['tahunajaran']->kode;
            $data['pickedkrs'] = $this->m_mahasiswa->datapickedkrsbysemester($id, $kodesemester);
            $data['totalsks'] = $this->m_mahasiswa->totalsksbysemester($id, $kodesemester);
            $data['validasicode'] = $this->m_mahasiswa->qrcodekrs($id, $kodesemester);
            // $data['qrCode'] = new QrCode();
            $dataValidasi = $getvalidasi->row();
            $data_qr = site_url('cekkrs/').$dataValidasi->token;
    
            $this->load->library('ciqrcode');
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './uploads/'; //string, the default is application/cache/
            $config['errorlog']     = './uploads/'; //string, the default is application/logs/
            $config['imagedir']     = './uploads/qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name='qrcode_krs_'.$id.'.png';
    
            $params['data'] = $data_qr; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; 
            $this->ciqrcode->generate($params);
            // dump($data);
            // $this->load->library('pdf');
    
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "print_krs_'$id'_$namamhs.pdf";
            // $this->pdf->load_view('mahasiswa/navbar', $data);
            $this->pdf->load_view('mahasiswa/cetakkrs', $data);
            // $this->pdf->load_view('mahasiswa/footer');
        } else {

        }

	}

}
