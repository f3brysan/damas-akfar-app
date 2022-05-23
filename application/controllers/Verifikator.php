<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
// START For Import Excel

// END For Import Excel

class Verifikator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->library('pdf');
        $this->load->helper('tanggal');
        $this->load->model('m_admin');
        $this->load->model('m_mahasiswa');
        $this->load->model('m_dosen');
    }

    public function sebelum_kti()
    {        
        $qrcode  = $this->uri->segment(3);
        $data['get'] = $this->m_dosen->get_qrcode_proposal_kti($qrcode);
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        // $this->load->view('dev/navbar', $data);
        $this->load->view('verifikator/qrcode_kti', $data);
        // $this->load->view('dev/footer');
    }

    public function sesudah_proposal_kti()
    {        
        $qrcode  = $this->uri->segment(3);
        $data['get'] = $this->m_dosen->get_qrcode_proposal_kti($qrcode);
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        // $this->load->view('dev/navbar', $data);
        $this->load->view('verifikator/hasil_qrcode_proposal_ssdh_kti', $data);
        // $this->load->view('dev/footer');
    }

    public function sebelum_proposal_kti()
    {        
        $qrcode  = $this->uri->segment(3);
        $data['get'] = $this->m_dosen->get_qrcode_proposal_kti($qrcode);
        // $data['mhs'] = $this->m_admin->getallmhs();
        // dump($data);
        // $this->load->view('dev/navbar', $data);
        $this->load->view('verifikator/hasil_qrcode_proposal_sblm_kti', $data);
        // $this->load->view('dev/footer');
    }

}
