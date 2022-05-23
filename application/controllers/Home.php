<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public $data         = array();
    public $page_config  = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_profil');
        $this->load->model('m_post');
        $this->load->model('m_admin');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
    }

    public function set_pagination()
    {
        $this->page_config['first_link']         = '&lsaquo; First';
        $this->page_config['first_tag_open']     = '<li>';
        $this->page_config['first_tag_close']    = '</li>';
        $this->page_config['last_link']          = 'Last &raquo;';
        $this->page_config['last_tag_open']      = '<li>';
        $this->page_config['last_tag_close']     = '</li>';
        $this->page_config['next_link']          = 'Next &rsaquo;';
        $this->page_config['next_tag_open']      = '<li>';
        $this->page_config['next_tag_close']     = '</li>';
        $this->page_config['prev_link']          = '&lsaquo; Prev';
        $this->page_config['prev_tag_open']      = '<li>';
        $this->page_config['prev_tag_close']     = '</li>';
        $this->page_config['cur_tag_open']       = '<li class="active"><a href="javascript://">';
        $this->page_config['cur_tag_close']      = '</a></li>';
        $this->page_config['num_tag_open']       = '<li>';
        $this->page_config['num_tag_close']      = '</li>';
    }

    public function index($start=0)
    {
        $this->page_config['base_url']    = site_url('home/post');
        $this->page_config['uri_segment'] = 3;
        $this->page_config['total_rows']  = $this->db->count_all('tbpost');
        $this->page_config['per_page']    = 10;
        $this->data['allpost'] = $this->m_post->get_all_post($start, $this->page_config['per_page']);
        $this->data['sejarah'] = $this->m_profil->datasejarah()->result();
        $this->data['banner'] = $this->m_post->get_all_banner($start, $this->page_config['per_page']);
        $this->data['kalender'] = $this->m_post->getdatakalender();
        //dump($this->data['kalender']);
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/index.php');
        $this->load->view('frontend/footer.php');
    }
    #sejarah
    public function sejarah()
    {
        $this->data['profil'] = $this->m_profil->datasejarah()->result();
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/sejarah.php');
        $this->load->view('frontend/footer.php');
    }
    #
    public function struktur_organisasi()
    {
        $this->data['profil'] = $this->m_profil->datastrukturorganisasi()->result();
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/sejarah.php');
        $this->load->view('frontend/footer.php');
    }

    #sambutan
    public function sambutan_direktur()
    {
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->data['profil'] = $this->m_profil->datasambutan()->result();
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/sambutan.php');
        $this->load->view('frontend/footer.php');
    }
    public function visimisi()
    {
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->data['profil'] = $this->m_profil->datavisimisi()->result();
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/visimisi.php');
        $this->load->view('frontend/footer.php');
    }
    public function lambang()
    {
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->data['profil'] = $this->m_profil->datalambang()->result();
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/sejarah.php');
        $this->load->view('frontend/footer.php');
    }
    public function dosen($start=0)
    {
        // set pagination
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->page_config['base_url']    = site_url('home/dosen');
        $this->page_config['uri_segment'] = 3;
        $this->page_config['total_rows']  = $this->db->count_all('tbdosen');
        $this->page_config['per_page']    = 10;

        $this->set_pagination();

        $this->pagination->initialize($this->page_config);
        $this->data['alldosen'] = $this->m_admin->getalldosen($start, $this->page_config['per_page']);
        //dump($this->data['alldosen']);
        $this->data['type']    = 'index';
        $this->data['page']    = $this->pagination->create_links();
        #$this->data['post'] = $this->m_post->get_all($start, $this->page_config['per_page']);
        #$this->data['profil'] = $this->m_profil->datasambutan()->result();
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/dosen.php');
        $this->load->view('frontend/footer.php');
    }

    public function post($start=0)
    {
        // set pagination
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->page_config['base_url']    = site_url('home/post');
        $this->page_config['uri_segment'] = 3;
        $this->page_config['total_rows']  = $this->db->count_all('tbpost');
        $this->page_config['per_page']    = 5;

        $this->set_pagination();

        $this->pagination->initialize($this->page_config);

        #dump($this->data['allpost']);
        $this->data['type']    = 'index';
        $this->data['page']    = $this->pagination->create_links();
        #$this->data['post'] = $this->m_post->get_all($start, $this->page_config['per_page']);
        #$this->data['profil'] = $this->m_profil->datasambutan()->result();
        $this->data['allpost'] = $this->m_post->get_all_post($start, $this->page_config['per_page']);
        $this->data['otherpost'] = $this->m_post->otherpost();
        //dump($this->data['allpost']);
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/post.php');
        $this->load->view('frontend/footer.php');
    }
    public function postdetail()
    {
        $id = $this->uri->segment(3);
        $this->data['post'] = $this->db->get_where('tbpost', array('url'=> $id))->row();
        $this->data['otherpost'] = $this->m_post->otherpost();
        $this->data['kalender'] = $this->m_post->getdatakalender();
        //dump($this->data['otherpost']);
        #$this->data['topa'] = $this->m_artikel->topartikel();
        $this->load->view('frontend/header', $this->data);
        $this->load->view('frontend/detailpost');
        $this->load->view('frontend/footer');
    }
    public function kalender_akademik()
    {
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $id = $this->uri->segment(3);
        //$this->data['post'] = $this->db->get_where('tbpost', array('url'=> $id))->row();
        $this->data['kalender'] = $this->m_post->getdatakalender($id);
        $kategori = 'Kalender';
        $this->data['post'] = $this->db->get_where('tbpost', array('url'=> $id, 'kategori'=> $kategori))->row();
        $this->data['otherpost'] = $this->m_post->otherpost();
        //dump($this->data['post']);
        //dump($this->data['otherpost']);
        #$this->data['topa'] = $this->m_artikel->topartikel();
        $this->load->view('frontend/header', $this->data);
        $this->load->view('frontend/detailpost');
        $this->load->view('frontend/footer');
    }
    public function galery($start=0)
    {
        // set pagination
        $this->data['kalender'] = $this->m_post->getdatakalender();
        $this->page_config['base_url']    = site_url('home/post');
        $this->page_config['uri_segment'] = 3;
        $this->page_config['total_rows']  = $this->db->count_all('tbpost');
        $this->page_config['per_page']    = 5;

        $this->set_pagination();

        $this->pagination->initialize($this->page_config);

        #dump($this->data['allpost']);
        $this->data['type']    = 'index';
        $this->data['page']    = $this->pagination->create_links();
        #$this->data['post'] = $this->m_post->get_all($start, $this->page_config['per_page']);
        #$this->data['profil'] = $this->m_profil->datasambutan()->result();
          $this->data['allgalery'] = $this->m_post->get_all_galery($start, $this->page_config['per_page']);
          //$this->data['otherpost'] = $this->m_post->otherpost();
          //dump($this->data['allpost']);
        $this->load->view('frontend/header.php', $this->data);
        $this->load->view('frontend/galery.php');
        $this->load->view('frontend/footer.php');
    }
}
