<?php

class M_Post extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_id(){
      $char1 = random_string('alpha', 3);
      $char2 = random_string();
      $char3 = random_string('alpha', 1);
      return $char1.$char2.$char3;
    }

    public function get_all_post($start, $limit)
    {
      $sql=("SELECT *
      FROM tbpost
      WHERE NOT tbpost.kategori = 'Kalender' ORDER BY tanggal DESC LIMIT $limit OFFSET $start");
        $query = $this->db->query($sql);
      return $query->result_array();

      $query = $this->db->query($sql);
    }
    public function get_all_kalender($start, $limit)
    {
      $hasil=rst2Array("SELECT *
      FROM tbpost
      WHERE kategori='Kalender' ORDER BY tanggal ASC LIMIT $limit");
      return $hasil;
    }
    public function get_all_galery($start, $limit)
    {
      $hasil=rst2Array("SELECT *
      FROM tbgalery
      ORDER BY tgl DESC LIMIT $limit OFFSET $start");
      return $hasil;
    }

    public function get_all_banner($start, $limit)
    {
      $this->db->select('*');
      $this->db->from('tbbanner');
      $this->db->order_by('tanggal', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      return $query->result_array();
    }

     public function get_search($search = NULL, $start = NULL, $limit = NULL)
    {
      $this->db->select('*');
      $this->db->from('tbpost');
      $this->db->like('judul', $search);
      $this->db->order_by('tanggal', 'DESC');
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      return $query;
    }

    public function getCarou()
    {
      $this->db->select('*');
      $this->db->from('tbpost');
      $this->db->order_by('tanggal', 'DESC');
      $this->db->limit(3);
      $query = $this->db->get();

      return $query->result_array();
    }

    public function getMidle()
    {
      $this->db->select('*');
      $this->db->from('tbpost');
      $this->db->order_by('tanggal', 'DESC');
      $this->db->limit(4);
      $query = $this->db->get();

      return $query->result_array();
    }

    public function getTop()
    {
      $this->db->select('*');
      $this->db->from('tbpost');
      $this->db->order_by('tanggal', 'DESC');
      $this->db->limit(1);
      $query = $this->db->get();

      return $query->row();
    }

    public function getPopu()
    {
      $this->db->select('*');
      $this->db->from('tbpost');
      $this->db->order_by('like_berita', 'DESC');
      $this->db->limit(8);
      $query = $this->db->get();

      return $query->result_array();
    }

    public function update($id)
    {
      $judul = $this->input->post('judul');
      $lowerjudul = strtolower($judul);
      $link = str_replace(' ', '-', $lowerjudul);
        $data = array(
          'judul' => $this->input->post('judul'),
          'isi' => $this->input->post('isi'),
          'kategori' => $this->input->post('kategori'),
          'url' => $link
        );

        $res_insert = $this->db->update('tbpost', $data, array('id' => $id));
    }

    public function updateImg($id)
    {
        $nmFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $data = array(
          'gambar' => $nmFile,
          'tanggal' => date("Y-m-d H:i:s")
        );

        $res_insert = $this->db->update('tbpost', $data, array('id' => $id));
        move_uploaded_file($tmpFile, './uploads/artikel/'.$nmFile);
    }

    public function create()
    {
        $nmFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];

        $judul = $this->input->post('judul');
        $lowerjudul = strtolower($judul);
        $link = str_replace(' ', '-', $lowerjudul);

        $data = array(
          'id' => $this->get_id(),
          'judul' => $this->input->post('judul'),
          'isi' => $this->input->post('isi'),
          'kategori' => $this->input->post('kategori'),
          'author' => $this->input->post('author'),
          'gambar' => $nmFile,
          'url' => $link,
          'tanggal' => date("Y-m-d")
        );

        $res_insert = $this->db->insert('tbpost', $data);
        move_uploaded_file($tmpFile, './uploads/artikel/'.$nmFile);
    }
    public function create_galery()
    {
        $nmFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        //dump($nmFile);
        //$nmfile = "file_".time();
        //$tmpFile = "file_".time();

        $data = array(
          'id' => $this->get_id(),
          'nama' => $this->input->post('judul'),
          'picture' => time()."_".$nmFile,
          'tgl' => date("Y-m-d H-i-s")
        );

        $res_insert = $this->db->insert('tbgalery', $data);
        move_uploaded_file($tmpFile, './uploads/galery/'.time()."_".$nmFile);
    }
    public function updategalery($id)
    {
        $data = array(
          'nama' => $this->input->post('judul')
        );

        $res_insert = $this->db->update('tbgalery', $data, array('id' => $id));
    }

    public function updateimggalery($id)
    {
        $nmFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $data = array(
          'picture' => $nmFile
        );

        $res_insert = $this->db->update('tbgalery', $data, array('id' => $id));
        move_uploaded_file($tmpFile, './uploads/galery/'.$nmFile);
    }
    public function create_banner()
    {
        $nmFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $data = array(
          'id' => $this->get_id(),
            'judul' => $this->input->post('judul'),
          'keterangan' => $this->input->post('keterangan'),
          'gambar' => $nmFile,
          'tanggal' => date("Y-m-d")
        );

        $res_insert = $this->db->insert('tbbanner', $data);
        move_uploaded_file($tmpFile, './uploads/gambar/'.$nmFile);
    }

    public function updatebanner($id)
    {
        $data = array(
          'judul' => $this->input->post('judul'),
          'keterangan' => $this->input->post('keterangan'),
          'tanggal' => date("Y-m-d")
        );

        $res_insert = $this->db->update('tbbanner', $data, array('id' => $id));
    }

    public function updateImgbanner($id)
    {
        $nmFile = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $data = array(
          'gambar' => $nmFile,
          'tanggal' => date("Y-m-d")
        );

        $res_insert = $this->db->update('tbbanner', $data, array('id' => $id));
        move_uploaded_file($tmpFile, './uploads/gambar/'.$nmFile);
    }


    function hapus_data($where,$table){
  		$this->db->where($where);
  		$this->db->delete($table);
  	}

    function otherpost() {
  $query = rst2Array("SELECT *
FROM tbpost
WHERE NOT tbpost.kategori = 'Kalender' ORDER BY tanggal ASC LIMIT 7");
  return $query;
  }

  public function getdatakalender()
  {
    $hasil=rst2Object("SELECT *
    FROM tbpost
    WHERE kategori='Kalender' ORDER BY tanggal DESC LIMIT 1");
    return $hasil;
  }
}
