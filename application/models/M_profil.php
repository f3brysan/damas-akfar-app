<?php

class M_profil extends CI_Model{
	// visimisi //
	function datavisimisi(){
	  $this->db->select('*');
	  $this->db->from('tbprofil');
	  $this->db->where('jenis','visimisi');
	  $query = $this->db->get();
	  return $query;
	}
// sejarah //
function datasejarah(){
  $this->db->select('*');
  $this->db->from('tbprofil');
  $this->db->where('jenis','sejarah');
  $query = $this->db->get();
  return $query;
}
#strukturorganisasi
function datastrukturorganisasi(){
  $this->db->select('*');
  $this->db->from('tbprofil');
  $this->db->where('jenis','strukturorganisasi');
  $query = $this->db->get();
  return $query;
}
public function update($id)
{
		$data = array(
			'isi' => $this->input->post('isi')
		);

		$res_insert = $this->db->update('tbprofil', $data, array('id' => $id));
}

public function updateImg($id)
{
		$nmFile = $_FILES['file']['name'];
		$tmpFile = $_FILES['file']['tmp_name'];
		$data = array(
			'gambar' => $nmFile
		);

		$res_insert = $this->db->update('tbprofil', $data, array('id' => $id));
		move_uploaded_file($tmpFile, './uploads/gambar/'.$nmFile);
}

// sambutan //
function datasambutan(){
	$this->db->select('*');
	$this->db->from('tbprofil');
	$this->db->where('jenis','sambutan');
	$query = $this->db->get();
	return $query;
}
// lambang //
function datalambang(){
	$this->db->select('*');
	$this->db->from('tbprofil');
	$this->db->where('jenis','lambang');
	$query = $this->db->get();
	return $query;
}

function editlambang($where,$table){
return $this->db->get_where($table,$where);
}
function updatelambang($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}
//strukturorganisasi//
function datastruktur(){
	return $this->db->get('tbgambar');
}
function updatestruktur($id)
{
		$nmFile = $_FILES['file']['name'];
		$tmpFile = $_FILES['file']['tmp_name'];
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'nama' => $nmFile,
			'struktur' => $this->input->post('struktur')
		);

		$res_insert = $this->db->update('tbgambar', $data, array('id_gambar' => $id));
		move_uploaded_file($tmpFile, './uploads/struktur/'.$nmFile);
}
}
