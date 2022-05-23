<?php
class M_mahasiswa extends CI_Model
{

    public function get_rand_id()
    {
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 10) as $k) {
            $rand .= $seed[$k];
        }
        return $rand;
    }

    public function cekmhs($cek)
    {
        $query = $this->db->get_where('tbmahasiswa', $cek);
        return $query;
    }
    public function getsemestermhs($id)
    {
        $query = rst2Array(" SELECT COUNT(tbverifikasipembayaran.nim) as total FROM tbverifikasipembayaran WHERE tbverifikasipembayaran.nim = '$id'");
        return $query;
    }
    public function getdosenwalimhs($id)
    {
        $query = rst2Array("SELECT
            tbdosen.nidn,
            tbdosen.nama,
            tbdosen.gelardepan AS depan,
            tbdosen.gelarbelakang AS belakang
            FROM
            tbdosenwali
            JOIN
            tbmahasiswa on tbmahasiswa.nim = tbdosenwali.nim
            JOIN
            tbdosen on tbdosen.nidn = tbdosenwali.nidn
            WHERE tbmahasiswa.nim = '$id'");
        return $query;
    }
    public function input_data($injek, $table)
    {
        $this->db->insert($table, $injek);
    }
    public function input_sertifikasi($create, $table)
    {
        $this->db->insert($table, $create);
    }
    public function updatedatadiri($id)
    {
        $data = array(
            'namalengkap'       => $this->input->post('namalengkap'),
            'reguler'           => $this->input->post('reguler'),
            'jenisdaftar'       => $this->input->post('jenisdaftar'),
            'angkatan'          => $this->input->post('angkatan'),
            'namapanggil'       => $this->input->post('namapanggil'),
            'nik'               => $this->input->post('nik'),
            'lahirmahasiswa'    => $this->input->post('lahirmahasiswa'),
            'tgllahirmahasiswa' => $this->input->post('tgllahirmahasiswa'),
            'agamamahasiswa'    => $this->input->post('agamamahasiswa'),
            'kelaminmhs'        => $this->input->post('kelaminmhs'),
            'warganegara'       => $this->input->post('warganegara'),
            'agamamahasiswa'    => $this->input->post('agamamahasiswa'),
            'saudara'           => $this->input->post('saudara'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
    }
    public function updatedatatempat($id)
    {
        $data = array(
            'alamatktp'    => $this->input->post('alamatktp'),
            'transportasi' => $this->input->post('transportasi'),
            'rtktp'        => $this->input->post('rtktp'),
            'rwktp'        => $this->input->post('rwktp'),
            'kelurahanktp' => $this->input->post('kelurahanktp'),
            'kecamatanktp' => $this->input->post('kecamatanktp'),
            'kodeposktp'   => $this->input->post('kodeposktp'),
            'alamatdom'    => $this->input->post('alamatdom'),
            'rtdom'        => $this->input->post('rtdom'),
            'rwdom'        => $this->input->post('rwdom'),
            'kelurahandom' => $this->input->post('kelurahandom'),
            'kecamatandom' => $this->input->post('kecamatandom'),
            'kodeposdom'   => $this->input->post('kodeposdom'),
            'jenisdom'     => $this->input->post('jenisdom'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
    }
    public function updatedatakontak($id)
    {
        $data = array(
            'email' => $this->input->post('email'),
            'hp'    => $this->input->post('hp'),
            'wa'    => $this->input->post('wa'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
    }
    public function updatedatapendidikan($id)
    {
        $data = array(
            'sekolah'        => $this->input->post('sekolah'),
            'skkerja'        => $this->input->post('skkerja'),
            'lulus'          => $this->input->post('lulus'),
            'profesimhs'     => $this->input->post('profesimhs'),
            'tempatkerjamhs' => $this->input->post('tempatkerjamhs'),
            'alamatkerjamhs' => $this->input->post('alamatkerjamhs'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
    }
    public function updatedatawali($id)
    {
        $data = array(
            'nikayah'         => $this->input->post('nikayah'),
            'nikibu'          => $this->input->post('nikibu'),
            'namaayah'        => $this->input->post('namaayah'),
            'tempatayah'      => $this->input->post('tempatayah'),
            'tglayah'         => $this->input->post('tglayah'),
            'pendidikanayah'  => $this->input->post('pendidikanayah'),
            'profesiayah'     => $this->input->post('profesiayah'),
            'agamaayah'       => $this->input->post('agamaayah'),
            'penghasilanayah' => $this->input->post('penghasilanayah'),
            'statusayah'      => $this->input->post('statusayah'),
            'namaibu'         => $this->input->post('namaibu'),
            'tempatibu'       => $this->input->post('tempatibu'),
            'tglibu'          => $this->input->post('tglibu'),
            'pendidikanibu'   => $this->input->post('pendidikanibu'),
            'profesiibu'      => $this->input->post('profesiibu'),
            'agamaibu'        => $this->input->post('agamaibu'),
            'penghasilanibu'  => $this->input->post('penghasilanibu'),
            'statusibu'       => $this->input->post('statusibu'),
            'namawali'        => $this->input->post('namawali'),
            'tempatwali'      => $this->input->post('tempatwali'),
            'tglwali'         => $this->input->post('tglwali'),
            'pendidikanwali'  => $this->input->post('pendidikanwali'),
            'profesiwali'     => $this->input->post('profesiwali'),
            'agamawali'       => $this->input->post('agamawali'),
            'penghasilanwali' => $this->input->post('penghasilanwali'),
            'statuswali'      => $this->input->post('statuswali'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
    }
    public function updatedatainfo($id)
    {
        $data = array(
            'rencanamhs'    => $this->input->post('rencanamhs'),
            'sksehat'       => $this->input->post('sksehat'),
            'tempatrencana' => $this->input->post('tempatrencana'),
            'darah'         => $this->input->post('darah'),
            'penyakit'      => $this->input->post('penyakit'),
            'tinggi'        => $this->input->post('tinggi'),
            'berat'         => $this->input->post('berat'),
            'olahraga'      => $this->input->post('olahraga'),
            'kesenian'      => $this->input->post('kesenian'),
            'organisasi'    => $this->input->post('organisasi'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
    }
    public function updategambarsertifikasi($id)
    {
        $nmFile  = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $data    = array(
            'gambar' => time() . "_" . $nmFile,
        );
        $res_insert = $this->db->update('tbsertifikasi', $data, array('id' => $id));
        move_uploaded_file($tmpFile, './uploads/sertifikasi/' . time() . "_" . $nmFile);
    }
    public function updatedatasertifikasi($id)
    {
        $data = array(
            'jenis'   => $this->input->post('jenis'),
            'nama'    => $this->input->post('nama'),
            'sebagai' => $this->input->post('sebagai'),
            'mulai'   => $this->input->post('mulai'),
            'selesai' => $this->input->post('selesai'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbsertifikasi', $data, array('id' => $id));
    }
    public function edit_wisuda($id)
    {
        $data = array(
            'pesan' => $this->input->post('pesan'),
            'kesan' => $this->input->post('kesan'),
            'kti'   => $this->input->post('kti'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
    }
    public function upload_bebas_kuliah($id)
    {
        $nmFile  = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $date    = date("Y");
        $data    = array(
            'bebaskuliah' => $date . "_" . $nmFile,
        );
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
        move_uploaded_file($tmpFile, './uploads/bebaskuliah/' . $date . "_" . $nmFile);
    }
    public function getselectedkelamin($id)
    {
        $query = rst2Array("SELECT tbkelamin.nama
            FROM tbmahasiswa, tbkelamin
            WHERE tbmahasiswa.nim='$id' AND tbkelamin.value=tbmahasiswa.kelaminmhs");
        return $query;
    }
    public function getselectedpenghasilanayah($id)
    {
        $query = rst2Array("SELECT tbpenghasilan.nama
            FROM tbmahasiswa, tbpenghasilan
            WHERE tbmahasiswa.nim='$id' AND tbpenghasilan.value=tbmahasiswa.penghasilanayah");
        return $query;
    }
    public function getselectedpenghasilanibu($id)
    {
        $query = rst2Array("SELECT tbpenghasilan.nama
            FROM tbmahasiswa, tbpenghasilan
            WHERE tbmahasiswa.nim='$id' AND tbpenghasilan.value=tbmahasiswa.penghasilanibu");
        return $query;
    }
    public function getselectedpenghasilanwali($id)
    {
        $query = rst2Array("SELECT tbpenghasilan.nama
            FROM tbmahasiswa, tbpenghasilan
            WHERE tbmahasiswa.nim='$id' AND tbpenghasilan.value=tbmahasiswa.penghasilanwali");
        return $query;
    }
    public function getselecteddidikayah($id)
    {
        $query = rst2Array("SELECT tbpendidikan.nama
            FROM tbmahasiswa, tbpendidikan
            WHERE tbmahasiswa.nim='$id' AND tbpendidikan.value=tbmahasiswa.pendidikanayah");
        return $query;
    }
    public function getselecteddidikibu($id)
    {
        $query = rst2Array("SELECT tbpendidikan.nama
            FROM tbmahasiswa, tbpendidikan
            WHERE tbmahasiswa.nim='$id' AND tbpendidikan.value=tbmahasiswa.pendidikanibu");
        return $query;
    }
    public function getselecteddidikwali($id)
    {
        $query = rst2Array("SELECT tbpendidikan.nama
            FROM tbmahasiswa, tbpendidikan
            WHERE tbmahasiswa.nim='$id' AND tbpendidikan.value=tbmahasiswa.pendidikanwali");
        return $query;
    }
    public function getselectedproayah($id)
    {
        $query = rst2Array("SELECT tbprofesi.nama
            FROM tbmahasiswa, tbprofesi
            WHERE tbmahasiswa.nim='$id' AND tbprofesi.value=tbmahasiswa.profesiayah");
        return $query;
    }
    public function getselectedproibu($id)
    {
        $query = rst2Array("SELECT tbprofesi.nama
            FROM tbmahasiswa, tbprofesi
            WHERE tbmahasiswa.nim='$id' AND tbprofesi.value=tbmahasiswa.profesiibu");
        return $query;
    }
    public function getselectedprowali($id)
    {
        $query = rst2Array("SELECT tbprofesi.nama
            FROM tbmahasiswa, tbprofesi
            WHERE tbmahasiswa.nim='$id' AND tbprofesi.value=tbmahasiswa.profesiibu");
        return $query;
    }
    public function getselectedagama($id)
    {
        $query = rst2Array("SELECT tbagama.nama
            FROM tbmahasiswa, tbagama
            WHERE tbmahasiswa.nim='$id' and tbagama.value=tbmahasiswa.agamamahasiswa");
        return $query;
    }
    public function getselectedjenisdaftar($id)
    {
        $query = rst2Array("SELECT tbjenisdaftar.nama
            FROM tbmahasiswa, tbjenisdaftar
            WHERE tbmahasiswa.nim='$id' and tbjenisdaftar.value=tbmahasiswa.jenisdaftar");
        return $query;
    }
    public function getselecteddom($id)
    {
        $query = rst2Array("SELECT tbjenistinggal.nama
            FROM tbmahasiswa, tbjenistinggal
            WHERE tbmahasiswa.nim='$id' and tbjenistinggal.value=tbmahasiswa.jenisdom");
        return $query;
    }
    public function getselectedagamaayah($id)
    {
        $query = rst2Array("SELECT tbagama.nama
            FROM tbmahasiswa, tbagama
            WHERE tbmahasiswa.nim='$id' AND tbagama.value=tbmahasiswa.agamaayah");
        return $query;
    }
    public function getselectedagamaibu($id)
    {
        $query = rst2Array("SELECT tbagama.nama
            FROM tbmahasiswa, tbagama
            WHERE tbmahasiswa.nim='$id' AND tbagama.value=tbmahasiswa.agamaibu");
        return $query;
    }
    public function getselectedagamawali($id)
    {
        $query = rst2Array("SELECT tbagama.nama
            FROM tbmahasiswa, tbagama
            WHERE tbmahasiswa.nim='$id' AND tbagama.value=tbmahasiswa.agamawali");
        return $query;
    }
    public function getselectedsertifikasi($id)
    {
        $query = rst2Array("SELECT DISTINCT tbsertifikasi.id, tbsertifikasi.jenis, tbsertifikasi.nama, tbsertifikasi.mulai, tbsertifikasi.sebagai, tbsertifikasi.selesai, tbsertifikasi.gambar
            FROM tbsertifikasi, tbmahasiswa
            WHERE tbsertifikasi.nim='$id'
            ORDER BY tbsertifikasi.Selesai DESC ");
        return $query;
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getselectedwisuda($id)
    {
        $query = rst2Array(" SELECT DISTINCT id, namalengkap, nim, lahirmahasiswa, hp, tgllahirmahasiswa, email, pesan, kesan, kti FROM tbmahasiswa WHERE nim='$id'");
        return $query;
    }

    public function check_kti_submited($id)
    {
        $query = rst2Array("SELECT *, tb_kti.judul as kti FROM tb_kti WHERE tb_kti.rel_nim = '$id'");
        return $query;
    }

    public function check_yudisium_submited($id)
    {
        $query = rst2Array("SELECT * FROM tb_document WHERE tb_document.nim = '$id'");
        return $query;
    }
    public function check_ijazah_approved($id)
    {
        $query = rst2Array("SELECT * FROM tb_approval WHERE tb_approval.nim = '$id' AND tb_approval.jenis = 'ijazah'");
        return $query;
    }

    public function get_no_surat($id)
    {
        $query = rst2Array("SELECT * FROM tbmhs_no_surat WHERE tbmhs_no_surat.nim = '$id'");
        return $query;
    }

    public function count_if_up_semester_5($id)
    {
        $query = rst2Array("SELECT count(tbstudi.kodematkul) as nilai
        FROM tbstudi
        JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
        WHERE tbstudi.nim = '$id' AND tbmatakuliah.semester >= '5'");
        return $query;
    }

    public function check_transkrip_approved($id)
    {
        $query = rst2Array("SELECT * FROM tb_approval WHERE tb_approval.nim = '$id' AND tb_approval.jenis = 'transkrip'");
        return $query;
    }

    public function check_nilai_sementara_approved($id)
    {
        $query = rst2Array("SELECT * FROM tb_approval WHERE tb_approval.nim = '$id' AND tb_approval.jenis = 'nilai_sementara'");
        return $query;
    }
    // Kartu Rencana Studi
    public function cekverifikasibayar($id)
    {
        $query = rst2Array("SELECT tbagama.nama
            FROM tbmahasiswa, tbagama
            WHERE tbmahasiswa.nim='$id' AND tbagama.value=tbmahasiswa.agamawali");
        return $query;
    }

    public function datapickedkrsbysemester($id, $kodesemester)
    {
        $query = rst2Array("SELECT DISTINCT tbstudi.id as idstudi, tbmatakuliah.id as idmatkul, tbmatakuliah.kode, tbmatakuliah.nama, tbmatakuliah.sks, tbmatakuliah.semester, tbmatakuliah.nidn FROM tbmatakuliah
            INNER JOIN tbstudi on tbstudi.kodematkul =  tbmatakuliah.kode
            WHERE tbstudi.tahunajaran = '$kodesemester' AND tbstudi.nim = '$id' AND EXISTS (
            SELECT tbstudi.kodematkul, tbstudi.nim
            FROM tbstudi
            JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbmahasiswa.nim = '$id' and tbpembayaran.kode = '$kodesemester' AND tbmatakuliah.kode = tbstudi.kodematkul
            )
            ORDER BY semester, tbmatakuliah.kode ASC");
        return $query;
    }

    public function qrcodekrs($id, $kodesemester)
    {
        $query = rst2Array("SELECT tbmahasiswa.nim, tbmahasiswa.namalengkap, tbdosen.gelardepan, tbdosen.gelarbelakang, tbdosen.nama, tbdosen.nidn, tbvalidasikrs.tahun_ajaran, tbvalidasikrs.tanggal_disetujui
            FROM tbvalidasikrs
            LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbvalidasikrs.nim
            LEFT JOIN tbdosenwali on tbdosenwali.nim = tbvalidasikrs.nim
            LEFT JOIN tbdosen on tbdosen.nidn = tbdosenwali.nidn
            WHERE tbvalidasikrs.nim = '$id' and tbvalidasikrs.tahun_ajaran = '$kodesemester'
            ");
        return $query;
    }
    public function totalsksbysemester($id, $kodeselected)
    {
        $query = rst2Array("SELECT sum(tbmatakuliah.sks) as total FROM tbmatakuliah
            WHERE EXISTS (
            SELECT tbstudi.kodematkul, tbstudi.nim
            FROM tbstudi
            JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbmahasiswa.nim = '$id' and tbpembayaran.kode = '$kodeselected' AND tbmatakuliah.kode = tbstudi.kodematkul
            )
            ORDER BY semester ASC");
        return $query;
    }
    public function datakrsodd($id, $kodesemester)
    {
        $query = rst2Array("SELECT * FROM tbmatakuliah
            WHERE tbmatakuliah.semester%2 != 0 and tbmatakuliah.nidn = 1
            AND NOT EXISTS (
            SELECT tbstudi.kodematkul, tbstudi.nim
            FROM tbstudi
            JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbmahasiswa.nim = '$id' and tbpembayaran.kode = '$kodesemester' AND tbmatakuliah.kode = tbstudi.kodematkul
            )
            ORDER BY semester ASC");
        return $query;
    }
    public function datakrseven($id, $kodesemester)
    {
        $query = rst2Array("SELECT * FROM tbmatakuliah
            WHERE tbmatakuliah.semester%2 = 0 and tbmatakuliah.nidn = 1
            AND NOT EXISTS (
            SELECT tbstudi.kodematkul, tbstudi.nim
            FROM tbstudi
            JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbmahasiswa.nim = '$id' and tbpembayaran.kode = '$kodesemester' AND tbmatakuliah.kode = tbstudi.kodematkul
            )
            ORDER BY semester ASC");
        return $query;
    }

    public function insertkrs($create, $get)
    {
        $i = 0;
        foreach ($create['kode'] as $kode) {
            $insert = array(
                'nim'         => $create['nim'],
                'kodematkul'  => $kode,
                'tahunajaran' => $get,
            );
            // dump($insert);
            $this->db->insert('tbstudi', $insert);
            $i++;
        }
    }

    public function insert_ekd($create, $get)
    {
        $code = $this->get_rand_id();
        $i    = 0;

        foreach (array_combine($create['rel_soal'], $create['bobot']) as $rel_soal => $bobot) {
            $insert = array(
                'rel_nim'      => $create['rel_nim'],
                'rel_nidn'     => $create['rel_nidn'],
                'rel_soal'     => $rel_soal,
                'rel_matkul'   => $create['rel_matkul'],
                'bobot'        => $bobot,
                'created_at'   => $create['created_at'],
                'rel_kode_ekd' => $get,
            );
            $this->db->insert('tb_responden_ekd', $insert);
            $i++;

        }
    }

    public function ajukankrs($nim, $tahunajaran)
    {
        date_default_timezone_set('Asia/Jakarta');
        $insert = array(
            'nim'            => $nim,
            'tahun_ajaran'   => $tahunajaran,
            'tanggal_ajukan' => date('Y-m-d H:i:s'),
            'status'         => 0,
        );
        $this->db->insert('tbvalidasikrs', $insert);

    }

    public function getprintedkrs($id, $getsemestermhs)
    {
        $query = rst2Array("SELECT tbstudi.kodematkul, tbstudi.nim, tbmatakuliah.nama
            FROM tbstudi
            JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            WHERE tbstudi.nim = '$id' and tbmatakuliah.semester = '$getsemestermhs'");
        return $query;
    }

    public function cek_ta_riwayatkrs($id, $kodeselected)
    {
        $query = rst2Array("SELECT COUNT(tbpembayaran.id) as semester
        FROM tbpembayaran
        LEFT JOIN tbverifikasipembayaran on tbverifikasipembayaran.tahunajaran = tbpembayaran.kode
        WHERE tbpembayaran.id  <= (SELECT MAX(id) FROM tbpembayaran WHERE tbpembayaran.kode like '$kodeselected') and tbverifikasipembayaran.nim = '$id'");
        return $query;
    }

    public function riwayat_krs_by_ta($id, $kodeselected)
    {
        $query = rst2Array("SELECT DISTINCT
    tbstudi.id AS idstudi,
    tbmatakuliah.id AS idmatkul,
    tbmatakuliah.kode,
    tbmatakuliah.nama,
    tbmatakuliah.sks,
    tbmatakuliah.semester,
    tbmatakuliah.nidn
FROM
    tbmatakuliah
    INNER JOIN tbstudi ON tbstudi.kodematkul = tbmatakuliah.kode
WHERE
    tbstudi.tahunajaran = '$kodeselected'
    AND tbstudi.nim = '$id'
ORDER BY
    semester,
    tbmatakuliah.kode ASC");
        return $query;
    }
// KARTU HASIL STUDI
    public function getkrsbysemester($nim)
    {
        $query = rst2Array("SELECT DISTINCT tbstudi.tahunajaran as kode, tbpembayaran.semester, tbpembayaran.tahunajaran
            FROM tbstudi
            LEFT JOIN tbmahasiswa on tbmahasiswa.nim =  tbstudi.nim
            LEFT JOIN tbverifikasipembayaran on tbverifikasipembayaran.tahunajaran =  tbstudi.tahunajaran
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tbverifikasipembayaran.tahunajaran
            WHERE tbmahasiswa.nim = '$nim' AND  tbpembayaran.jenis = 'semester' ORDER BY tbpembayaran.id DESC ");
        return $query;
    }
    public function getdetailkhs($id, $kodeselected)
    {
        $query = rst2Array("SELECT DISTINCT tbstudi.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks, tbstudi.nilai
            FROM tbstudi
            LEFT JOIN tbmahasiswa on tbmahasiswa.nim =  tbstudi.nim
            LEFT JOIN tbverifikasipembayaran on tbverifikasipembayaran.tahunajaran =  tbstudi.tahunajaran
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            WHERE tbmahasiswa.nim = '$id' AND tbstudi.tahunajaran = '$kodeselected' ORDER BY tbstudi.kodematkul, tbmatakuliah.nama ASC
            ");
        return $query;
    }
    // QUERY V2 UNTUK HASIL KHS
    public function getdetailkhsv2($id, $kodeselected)
    {
        $query = rst2Array("SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks, a.nilai as nilai, a.tahunajaran as kode1, b.nilai as nilai_remed, b.tahunajaran as kode2
            FROM (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran = '$kodeselected' AND tbstudi.nim = '$id' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran = 'RMD$kodeselected' AND tbstudi.nim = '$id' ) AS b
            on a.kodematkul = b.kodematkul
            GROUP BY a.kodematkul
            ORDER BY a.kodematkul, tbmatakuliah.nama ASC
            ");
        return $query;
    }
    public function getips($id, $kodeselected)
    {
        $query = rst2Array("SELECT SUM(CASE
            WHEN tbstudi.nilai is NULL THEN 0.00*tbmatakuliah.sks
            WHEN tbstudi.nilai < 39.99 THEN 0.00*tbmatakuliah.sks
            WHEN tbstudi.nilai > 40.00 && tbstudi.nilai < 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN tbstudi.nilai > 51.00 && tbstudi.nilai < 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN tbstudi.nilai > 66.00 && tbstudi.nilai < 75.99 THEN 3.00*tbmatakuliah.sks
            ELSE 4.00*tbmatakuliah.sks
            END)
            AS bobot, SUM(tbmatakuliah.sks) as totalsks
            FROM tbstudi
            LEFT JOIN tbmahasiswa on tbmahasiswa.nim =  tbstudi.nim
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            WHERE tbmahasiswa.nim = '$id' AND tbstudi.tahunajaran = '$kodeselected' ORDER BY tbmatakuliah.nama ASC
            ");
        return $query;
    }
// QUERY V2 UNTUK IPS
    public function getipsV2($id, $kodeselected)
    {
        $query = rst2Array("
            SELECT SUM(bobot) as bobot, sum(sks) AS totalsks FROM (
            SELECT tbmatakuliah.sks,
            max(case
            WHEN a.nilai >= 76.00 THEN 4.00*tbmatakuliah.sks
            WHEN a.nilai >= 66.00 && a.nilai <= 75.99 THEN 3.00*tbmatakuliah.sks
            WHEN b.nilai >= 66.00 THEN 3.00*tbmatakuliah.sks
            WHEN a.nilai >= 51.00 && a.nilai <= 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN b.nilai >= 51.00 && b.nilai <= 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN a.nilai >= 40.00 && a.nilai <= 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN b.nilai >= 40.00 && b.nilai <= 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN a.nilai < 39.99 && a.nilai <= 39.99 THEN 0.00*tbmatakuliah.sks
            ELSE 0*tbmatakuliah.sks END)
            AS bobot

            FROM (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran = '$kodeselected' AND tbstudi.nim = '$id' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran = 'RMD$kodeselected' AND tbstudi.nim = '$id' ) AS b
            on a.kodematkul = b.kodematkul
            GROUP BY a.kodematkul
            ORDER BY tbmatakuliah.nama, a.kodematkul ASC ) X
            ");
        return $query;
    }
    public function getipk($id, $semesternow)
    {
        $query = rst2Array("SELECT SUM(CASE
            WHEN tbstudi.nilai is NULL THEN 0.00*tbmatakuliah.sks
            WHEN tbstudi.nilai < 39.99 THEN 0.00*tbmatakuliah.sks
            WHEN tbstudi.nilai > 40.00 && tbstudi.nilai < 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN tbstudi.nilai > 51.00 && tbstudi.nilai < 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN tbstudi.nilai > 66.00 && tbstudi.nilai < 75.99 THEN 3.00*tbmatakuliah.sks
            ELSE 4.00*tbmatakuliah.sks
            END)
            AS bobot, SUM(tbmatakuliah.sks) as totalsks
            FROM tbstudi
            LEFT JOIN tbmahasiswa on tbmahasiswa.nim =  tbstudi.nim
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbmahasiswa.nim = '$id' AND tbpembayaran.jenis = 'semester'
            AND tbpembayaran.id  <= (SELECT id FROM tbpembayaran WHERE tbpembayaran.kode = '$semesternow')
            ORDER BY tbmatakuliah.nama ASC
            ");
        return $query;
    }
    // QUERY V2 UNTUK IPK MAHASISWA
    public function getipkv2($id, $semesternow)
    {
        $query = rst2Array("SELECT SUM(bobot) as bobot, sum(sks) totalsks FROM (
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks, a.nilai as nilai, a.tahunajaran as kode1,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00*tbmatakuliah.sks
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00*tbmatakuliah.sks
            WHEN max(b.nilai) >= 66.00 THEN 3.00*tbmatakuliah.sks
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00*tbmatakuliah.sks
            END
            AS bobot

            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$id' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$id' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbpembayaran.id  <= (SELECT MAX(id) FROM tbpembayaran WHERE tbpembayaran.kode like '%$semesternow')
            GROUP BY a.kodematkul
            ORDER BY a.kodematkul ASC ) x
            ");
        return $query;
    }
    public function getdataforremedial($id, $koderemedial, $kodesemester)
    {
        $query = rst2Array("SELECT DISTINCT tbstudi.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks, tbstudi.nilai, COUNT(tbstudi.kodematkul) as banyak
            FROM tbstudi
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            WHERE tbstudi.nim = '$id' AND (tbstudi.tahunajaran = '$kodesemester' OR tbstudi.tahunajaran = '$koderemedial')
            GROUP BY tbstudi.kodematkul
            HAVING COUNT(tbstudi.kodematkul)<2
            ORDER BY tbstudi.kodematkul ASC
            ");
        return $query;
    }
// GET LOG NILAI
    public function getlognilai($nim)
    {
        $query = rst2Array("SELECT
            tbstudi.kodematkul, tbmatakuliah.nama
            FROM
            tbstudi
            JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            WHERE
            tbstudi.nim = '$nim' and tbstudi.kodematkul IN (
            SELECT
            *
            FROM
            (SELECT tbstudi.kodematkul FROM tbstudi WHERE tbstudi.nim = '$nim'  GROUP BY tbstudi. kodematkul HAVING COUNT(tbstudi.kodematkul) > 1 ) AS a)
            GROUP BY tbstudi.kodematkul
            ORDER BY tbstudi.kodematkul asc
            ");
        return $query;
    }
    public function detail_lognilai($nim, $kodeselected)
    {
        $query = rst2Array("SELECT tbstudi.kodematkul, tbmatakuliah.nama, tbstudi.tahunajaran, tbstudi.nilai FROM tbstudi
            JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            WHERE
            tbstudi.nim = '$nim' and tbstudi.kodematkul IN (
            SELECT * FROM
            (SELECT tbstudi.kodematkul FROM tbstudi WHERE tbstudi.nim = '$nim' and tbstudi.kodematkul = '$kodeselected' GROUP BY tbstudi. kodematkul HAVING COUNT(tbstudi.kodematkul) > 1 ) AS a)
            ORDER BY kodematkul asc
            ");
        return $query;
    }

    // REMEDIAL
    public function cekpermitprintremedial($id, $koderemedial)
    {
        $query = rst2Array("SELECT * FROM tbstudi WHERE tbstudi.nim = '1351710044' AND tbstudi.tahunajaran = '$koderemedial' AND tbstudi.aprove_by is not NULL");
        return $query;
    }
    public function dataremedialpicked($id, $koderemedial)
    {
        $query = rst2Array("SELECT DISTINCT tbstudi.id as idstudi, tbmatakuliah.id as idmatkul, tbmatakuliah.kode, tbmatakuliah.nama, tbmatakuliah.sks, tbmatakuliah.semester, tbmatakuliah.nidn FROM tbmatakuliah
            INNER JOIN tbstudi on tbstudi.kodematkul =  tbmatakuliah.kode
            WHERE tbstudi.tahunajaran = '$koderemedial' AND tbstudi.nim = '$id' AND EXISTS (
            SELECT tbstudi.kodematkul, tbstudi.nim
            FROM tbstudi
            JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            JOIN tbremedial on tbremedial.rel_kodepembayaran = tbpembayaran.kode
            WHERE tbmahasiswa.nim = '$id' and tbremedial.kode = '$koderemedial' AND tbmatakuliah.kode = tbstudi.kodematkul
            )
            ORDER BY semester, tbmatakuliah.kode ASC");
        return $query;
    }
    public function dataremedialprinted($id, $koderemedial)
    {
        $query = rst2Array("SELECT tbstudi.id AS idstudi, tbmatakuliah.id AS idmatkul, tbmatakuliah.kode, tbmatakuliah.nama, tbmatakuliah.sks, tbmatakuliah.semester, tbmatakuliah.nidn, tbstudi.tahunajaran, tbstudi.nilai, COUNT( tbmatakuliah.kode ) AS matkul_get
            FROM tbmatakuliah
            INNER JOIN tbstudi ON tbstudi.kodematkul = tbmatakuliah.kode
            WHERE tbstudi.nim = '$id'
            AND EXISTS (SELECT tbstudi.kodematkul, tbstudi.nim
            FROM tbstudi
            JOIN tbmahasiswa ON tbmahasiswa.nim = tbstudi.nim
            JOIN tbpembayaran ON tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbmahasiswa.nim = '$id'  AND tbstudi.tahunajaran = '$koderemedial' AND tbmatakuliah.kode = tbstudi.kodematkul)
            GROUP BY tbstudi.kodematkul
            HAVING COUNT( tbstudi.kodematkul )> 1
            ORDER BY semester, tbmatakuliah.kode ASC");
        return $query;
    }
    public function totalsksremedial($id, $koderemedial)
    {
        $query = rst2Array("SELECT sum(tbmatakuliah.sks) as total FROM tbmatakuliah
            WHERE EXISTS (
            SELECT tbstudi.kodematkul, tbstudi.nim
            FROM tbstudi
            JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            join tbremedial on tbremedial.kode = tbstudi.tahunajaran
            WHERE tbmahasiswa.nim = '$id' and tbremedial.kode = '$koderemedial' AND tbmatakuliah.kode = tbstudi.kodematkul
            )
            ORDER BY semester ASC");
        return $query;
    }

    public function get_status_bayar($nim)
    {

        $query = $this->db->query('
            SELECT * FROM tbstudi WHERE nim = "' . $nim . '" AND tahunajaran = "RMDGA1920" GROUP BY nim
            ');
        return $query->row_array();
    }

    public function wisuda_register_check($id)
    {

        $query = rst2Array("SELECT * FROM tb_peserta_wisuda WHERE tb_peserta_wisuda.nim = '$id'");
        return $query;
    }

    // CHECK KELENGKAPAN YUDISIUM

    public function yudisium_spp_check($id)
    {

        $query = rst2Array("SELECT * FROM tb_pembayaran_yudisium WHERE tb_pembayaran_yudisium.nim = '$id'");
        return $query;
    }

    public function yudisium_perpus_check($id)
    {

        $query = rst2Array("SELECT * FROM tb_bebas_perpus WHERE tb_bebas_perpus.nim = '$id'");
        return $query;
    }

    public function yudisium_lab_check($id)
    {

        $query = rst2Array("SELECT * FROM tb_bebas_lab WHERE tb_bebas_lab.nim = '$id'");
        return $query;
    }

    public function yudisium_lab_uncheck($id)
    {

        $query = rst2Array("SELECT tbstaff.jenis
        FROM tbstaff
        WHERE tbstaff.jenis not in (SELECT tb_bebas_lab.jenis_lab FROM tb_bebas_lab WHERE tb_bebas_lab.nim = '$id') and tbstaff.jenis is not null AND tbstaff.jenis != ''");
        return $query;
    }

    public function yudisium_kti_check($id)
    {

        $query = rst2Array("SELECT * FROM tb_bebas_kti WHERE tb_bebas_kti.nim = '$id'");
        return $query;
    }

    public function yudisium_se_check($id)
    {

        $query = rst2Array("SELECT * FROM tbstudi WHERE tbstudi.kodematkul = 'A606705517' AND tbstudi.nim = '$id'");
        return $query;
    }

    public function yudisium_kpm_check($id)
    {

        $query = rst2Array("SELECT * FROM tbstudi WHERE tbstudi.kodematkul = 'A606805317' AND tbstudi.nim = '$id'");
        return $query;
    }

    public function yudisium_check($id)
    {
        $query = rst2Array("SELECT
            tb_peserta_yudisium.id,
            tb_peserta_yudisium.kode,
            tb_peserta_yudisium.nim,
            tb_pembayaran_yudisium.`status`,
            tb_peserta_yudisium.bukti_perpus,
            tb_peserta_yudisium.upload_kti,
            tb_peserta_yudisium.acc_bukti_perpus,
            tb_bebas_kti.nim as kti,
            pkl.nilai AS nilaipkl,
            kpm.nilai AS nilaikpm,
            lab.jumlah AS bebas_lab,
            SUM( CASE WHEN DE.bobot <= 1 THEN 1 ELSE 0 END ) AS bobot
            FROM
            tb_peserta_yudisium
            LEFT JOIN tb_bebas_kti on tb_bebas_kti.nim = tb_peserta_yudisium.nim
            LEFT JOIN ( SELECT * ,COUNT(tb_bebas_lab.nim) as jumlah FROM tb_bebas_lab WHERE tb_bebas_lab.`status` = 'allow' and tb_bebas_lab.nim = '$id') as lab on lab.nim = tb_peserta_yudisium.nim
            LEFT JOIN tb_pembayaran_yudisium on tb_pembayaran_yudisium.nim = tb_peserta_yudisium.nim
            LEFT JOIN ( SELECT * FROM tbstudi WHERE tbstudi.nim = '$id' AND tbstudi.kodematkul = 'A606705517' ) AS pkl ON pkl.nim = tb_peserta_yudisium.nim
            LEFT JOIN ( SELECT * FROM tbstudi WHERE tbstudi.nim = '$id' AND tbstudi.kodematkul = 'A606805317' ) AS kpm ON kpm.nim = tb_peserta_yudisium.nim
            LEFT JOIN (
            SELECT DISTINCT
            a.nim,
            a.kodematkul,
            tbmatakuliah.nama,
            tbmatakuliah.sks,
            a.nilai AS nilai,
            a.tahunajaran AS kode1,
            CASE    WHEN max(a.nilai) is null THEN 0.00
            WHEN max( a.nilai ) >= 76.00 THEN
            4.00
            WHEN max( a.nilai ) >= 66.00 && max( a.nilai ) <= 75.99 THEN 3.00
            WHEN max( b.nilai ) >= 66.00 THEN 3.00
            WHEN max( a.nilai ) >= 51.00 && max( a.nilai ) <= 65.99 THEN 2.00
            WHEN max( b.nilai ) >= 51.00 && max( b.nilai ) <= 65.99 THEN 2.00
            WHEN max( a.nilai ) >= 40.00 && max( a.nilai ) <= 50.99 THEN 1.00
            WHEN max( b.nilai ) >= 40.00 && max( b.nilai ) <= 50.99 THEN 1.00
            WHEN max( a.nilai ) < 39.99 && max( a.nilai ) <= 39.99 THEN 0.00
            END AS bobot
            FROM
            ( SELECT * FROM tbstudi WHERE tbstudi.nim = '$id' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah ON tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran ON tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN ( SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$id' ) AS b ON a.kodematkul = b.kodematkul
            WHERE
            tbpembayaran.id <= ( SELECT MAX( id ) FROM tbpembayaran )
            GROUP BY
            a.kodematkul
            ORDER BY
            a.kodematkul ASC
            ) AS DE ON DE.nim = tb_peserta_yudisium.nim
            WHERE
            tb_peserta_yudisium.nim = '$id'");
        return $query;
    }

    public function get_bebas_lab($id)
    {
        $query = rst2Array("SELECT * FROM tb_bebas_lab where tb_bebas_lab.nim = '$id'");
        return $query;
    }

    public function yudisium_nilai_deny($id)
    {
        $query = rst2Array("SELECT * FROM (
            SELECT DISTINCT
            a.nim,
            a.kodematkul,
            tbmatakuliah.nama,
            tbmatakuliah.sks,
            a.nilai AS nilai,
            a.tahunajaran AS kode1,
            CASE
            WHEN max( a.nilai ) >= 76.00 THEN 4.00
            WHEN max( a.nilai ) >= 66.00 && max( a.nilai ) <= 75.99 THEN 3.00
            WHEN max( b.nilai ) >= 66.00 THEN 3.00
            WHEN max( a.nilai ) >= 51.00 && max( a.nilai ) <= 65.99 THEN 2.00
            WHEN max( b.nilai ) >= 51.00 && max( b.nilai ) <= 65.99 THEN 2.00
            WHEN max( a.nilai ) >= 40.00 && max( a.nilai ) <= 50.99 THEN 1.00
            WHEN max( b.nilai ) >= 40.00 && max( b.nilai ) <= 50.99 THEN 1.00
            WHEN max( a.nilai ) < 39.99 && max( a.nilai ) <= 39.99 THEN 0.00
            END AS bobot
            FROM
            ( SELECT * FROM tbstudi WHERE tbstudi.nim = '$id' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah ON tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran ON tbpembayaran.kode = a.tahunajaran
            LEFT JOIN ( SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$id' ) AS b ON a.kodematkul = b.kodematkul
            WHERE
            tbpembayaran.id <= ( SELECT MAX( id ) FROM tbpembayaran )
            GROUP BY
            a.kodematkul
            ORDER BY
            a.kodematkul ASC ) as de
            WHERE de.bobot <= '1' or de.bobot is NULL");
        return $query;
    }

    public function autonum_yudisium_check($kode)
    {
        $query = rst2Array("SELECT COUNT(*) as auto FROM tb_peserta_yudisium WHERE kode = '$kode'");
        return $query;
    }

    public function yudisium_print($id)
    {
        $query = rst2Array("SELECT
            tbmahasiswa.nim,
            tbmahasiswa.namalengkap,
            tbkelas.kelas,
            tbpembayaran.tahunajaran,
            tbmahasiswa.hp,
            tb_peserta_yudisium.acc_at,
            tb_peserta_yudisium.spp as kode_unik
            FROM
            tbmahasiswa
            LEFT JOIN tbkelas ON tbkelas.nim = tbmahasiswa.nim
            LEFT JOIN tbverifikasipembayaran ON tbverifikasipembayaran.nim = tbmahasiswa.nim
            LEFT JOIN tbpembayaran ON tbpembayaran.kode = tbverifikasipembayaran.tahunajaran
            LEFT JOIN tb_peserta_yudisium ON tb_peserta_yudisium.nim = tbmahasiswa.nim
            WHERE
            tbmahasiswa.nim = '$id'
            ORDER BY
            tbpembayaran.tahunajaran DESC
            LIMIT 1");
        return $query;
    }

    public function add_kti($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $nmFile1  = $_FILES['foto1']['name'];
        $tmpFile1 = $_FILES['foto1']['tmp_name'];
        $explode  = explode(".", $nmFile1);
        $ekstensi = end($explode);
        $namafile = "KTI";
        // $code =  $this->input->post('nidn');
        // dump($ekstensi);
        //$nmfile = "file_".time();
        //$tmpFile = "file_".time();
        $code = $this->get_rand_id();
        $data = array(
            // 'id' => $code,
            'nim'       => $id,
            'kti'       => $this->input->post('kti'),
            'picture'   => $id . "_" . $namafile . "." . $ekstensi,
            'create_at' => date("Y-m-d H-i-s"),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_kti', $data);
        move_uploaded_file($tmpFile1, './uploads/wisuda/' . $id . "_" . $namafile . "." . $ekstensi);
    }

    public function edit_kti($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $nmFile1  = $_FILES['foto1']['name'];
        $tmpFile1 = $_FILES['foto1']['tmp_name'];
        $explode  = explode(".", $nmFile1);
        $ekstensi = end($explode);
        $namafile = "KTI";
        // dump($nmFile);
        // dump($get);
        //$tmpFile = "file_".time();
        if (empty($nmFile1)) {
            $data = array(
                'kti'       => $this->input->post('kti'),
                'create_at' => date("Y-m-d H-i-s"),
            );
            // dump($data);
            $res_insert = $this->db->update('tb_kti', $data, array('nim' => $id));

        } else {
            $data = array(
                // 'id' => $code,
                'kti'       => $this->input->post('kti'),
                'picture'   => $id . "_" . $namafile . "." . $ekstensi,
                'create_at' => date("Y-m-d H-i-s"),
            );
            // dump($data);
            $res_insert = $this->db->update('tb_kti', $data, array('nim' => $id));
            move_uploaded_file($tmpFile1, './uploads/wisuda/' . $id . "_" . $namafile . "." . $ekstensi);
        }

    }

    public function register_yudisium($kode, $id, $autonum)
    {
        date_default_timezone_set('Asia/Jakarta');
        $number  = $autonum + 1;
        $no      = str_pad($number, 4, '0', STR_PAD_LEFT);
        $default = 'deny';
        $data    = array(
            'id'               => $kode . $no,
            'kode'             => $kode,
            'nim'              => $id,
            'spp'              => md5($id),
            'acc_bukti_lab'    => $default,
            'acc_bukti_perpus' => $default,
            'created_at'       => date("Y-m-d H:i:s"),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_peserta_yudisium', $data);
    }

    public function acc_yudisium($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(

            'acc_at' => date("Y-m-d H:i:s"),
        );
        // dump($data);
        $res_insert = $this->db->update('tb_peserta_yudisium', $data, array('nim' => $id));
    }

    public function upload_bebas_perpus($id)
    {
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "berkas_perpus";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        // dump($ekstensi);
        if ($ekstensi == 'pdf') {
            $data = array(
                'bukti_perpus' => $id . "_" . $namafile . "." . $ekstensi,
            );
            $res_insert = $this->db->update('tb_peserta_yudisium', $data, array('nim' => $id));
            move_uploaded_file($tmpFile, './uploads/yudisium/' . $id . "_" . $namafile . "." . $ekstensi);
            $this->session->set_flashdata('success_message', 'Data Anda telah tersimpan.');
        } else {
            $this->session->set_flashdata('failed_message', 'Maaf disarankan jenis file yang diupload adalah ".pdf".');
        }

    }

    public function upload_log_kti_before($id)
    {
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "berkas_log_kti_sebelum_sidang";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        date_default_timezone_set('Asia/Jakarta');
        // dump($ekstensi);
        if ($ekstensi == 'pdf') {
            $data = array(
                'attachment'          => $id . "_" . $namafile . "." . $ekstensi,
                'attachment_uploaded' => date("Y-m-d H:i:s"),
            );
            // dump($data);
            $res_insert = $this->db->update('tb_kti', $data, array('rel_nim' => $id));
            move_uploaded_file($tmpFile, './uploads/kti/' . $id . "_" . $namafile . "." . $ekstensi);
            $this->session->set_flashdata('success_message', 'Data Anda telah tersimpan.');
            redirect('mahasiswa/queue_before_kti');
        } else {
            $this->session->set_flashdata('warning_message', 'File harus berekstensi .pdf');
            redirect('mahasiswa/kti');
        }
    }

    public function upload_log_kti_after($id)
    {
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "berkas_log_kti_setelah_sidang";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        date_default_timezone_set('Asia/Jakarta');
        // dump($ekstensi);
        if ($ekstensi == 'pdf') {
            $data = array(
                'attachment_2'          => $id . "_" . $namafile . "." . $ekstensi,
                'attachment_2_uploaded' => date("Y-m-d H:i:s"),
            );
            // dump($data);
            $res_insert = $this->db->update('tb_kti', $data, array('rel_nim' => $id));
            move_uploaded_file($tmpFile, './uploads/kti/' . $id . "_" . $namafile . "." . $ekstensi);
            $this->session->set_flashdata('success_message', 'Data Anda telah tersimpan.');
            redirect('mahasiswa/queue_after_kti');
        } else {
            $this->session->set_flashdata('warning_message', 'File harus berekstensi .pdf');
            redirect('mahasiswa/kti');
        }
    }

    public function upload_log_proposal_kti($id)
    {
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "berkas_log_kti";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        // dump($ekstensi);
        if ($ekstensi == 'pdf') {
            $data = array(
                'attachment' => $id . "_" . $namafile . "." . $ekstensi,
            );
            $res_insert = $this->db->update('tb_proposal_kti', $data, array('rel_nim' => $id));
            move_uploaded_file($tmpFile, './uploads/kti/' . $id . "_" . $namafile . "." . $ekstensi);
            $this->session->set_flashdata('success_message', 'Data Anda telah tersimpan.');
            redirect('mahasiswa/queue_before_proposal_kti');
        } else {
            redirect('mahasiswa/proposal_kti');
        }

    }

    public function upload_log_kti_proposal_after($id)
    {
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "berkas_revisi_naskah_proposal_kti";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        // dump($ekstensi);
        if ($ekstensi == 'pdf') {
            $data = array(
                'attachment_2' => $id . "_" . $namafile . "." . $ekstensi,
            );
            $res_insert = $this->db->update('tb_proposal_kti', $data, array('rel_nim' => $id));
            move_uploaded_file($tmpFile, './uploads/kti/' . $id . "_" . $namafile . "." . $ekstensi);
            $this->session->set_flashdata('success_message', 'Data Anda telah tersimpan.');
            redirect('mahasiswa/queue_after_proposal_kti');
        } else {
            redirect('mahasiswa/proposal_kti');
        }

    }

    public function upload_bebas_kti($id)
    {
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "berkas_pppm";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        // dump($ekstensi);
        if ($ekstensi == 'jpg' || $ekstensi == 'jpeg' || $ekstensi == 'png') {
            $data = array(
                'upload_kti' => $id . "_" . $namafile . "." . $ekstensi,
            );
            $res_insert = $this->db->update('tb_peserta_yudisium', $data, array('nim' => $id));
            move_uploaded_file($tmpFile, './uploads/yudisium/' . $id . "_" . $namafile . "." . $ekstensi);
            $this->session->set_flashdata('success_message', 'Data Anda telah tersimpan.');
        } else {
            $this->session->set_flashdata('failed_message', 'Maaf disarankan jenis ekstensi file yang diupload adalah ".jpg, .jpeg, .png".');
        }

    }

    public function upload_bebas_lab($id)
    {
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "bukti_lab";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        $data     = array(
            'bukti_lab' => $id . "_" . $namafile . "." . $ekstensi,
        );
        $res_insert = $this->db->update('tb_peserta_yudisium', $data, array('nim' => $id));
        move_uploaded_file($tmpFile, './uploads/yudisium/' . $id . "_" . $namafile . "." . $ekstensi);
    }

    public function upload_berkas_yudisium($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $nmFile   = $_FILES['file']['name'];
        $tmpFile  = $_FILES['file']['tmp_name'];
        $namafile = "berkas_yudisium";
        $explode  = explode(".", $nmFile);
        $ekstensi = end($explode);
        $code     = $this->get_rand_id();
        $jenis    = "berkas_yudisium";

        $data = array(
            'id'        => $code,
            'nim'       => $id,
            'jenis'     => $jenis,
            'nama_file' => $id . "_" . $namafile . "." . $ekstensi,
            'upload_at' => date("Y-m-d H-i-s"),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_document', $data);
        move_uploaded_file($tmpFile, './uploads/wisuda/' . $id . "_" . $namafile . "." . $ekstensi);
    }
    public function get_nilai_semester_1($nim)
    {
        $query = rst2Array("
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks,
            case
            WHEN max(a.nilai) >= 76.00 THEN 'A'
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 'B'
            WHEN max(b.nilai) >= 66.00 THEN 'B'
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 'C'
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 'C'
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 'D'
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 'D'
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 'E'
            END
            AS huruf,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00
            WHEN max(b.nilai) >= 66.00 THEN 3.00
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00
            END
            AS bobot
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester = '1'
            GROUP BY a.kodematkul
            ORDER BY nama, kodematkul ASC
            ");
        return $query;
    }
    public function get_nilai_semester_2($nim)
    {
        $query = rst2Array("
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks,
            case
            WHEN max(a.nilai) >= 76.00 THEN 'A'
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 'B'
            WHEN max(b.nilai) >= 66.00 THEN 'B'
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 'C'
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 'C'
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 'D'
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 'D'
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 'E'
            END
            AS huruf,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00
            WHEN max(b.nilai) >= 66.00 THEN 3.00
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00
            END
            AS bobot
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester = '2'
            GROUP BY a.kodematkul
            ORDER BY nama, kodematkul ASC
            ");
        return $query;
    }

    public function get_nilai_semester_3($nim)
    {
        $query = rst2Array("
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks,
            case
            WHEN max(a.nilai) >= 76.00 THEN 'A'
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 'B'
            WHEN max(b.nilai) >= 66.00 THEN 'B'
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 'C'
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 'C'
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 'D'
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 'D'
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 'E'
            END
            AS huruf,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00
            WHEN max(b.nilai) >= 66.00 THEN 3.00
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00
            END
            AS bobot
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester = '3'
            GROUP BY a.kodematkul
            ORDER BY nama, kodematkul ASC
            ");
        return $query;
    }

    public function get_nilai_semester_4($nim)
    {
        $query = rst2Array("
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks,
            case
            WHEN max(a.nilai) >= 76.00 THEN 'A'
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 'B'
            WHEN max(b.nilai) >= 66.00 THEN 'B'
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 'C'
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 'C'
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 'D'
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 'D'
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 'E'
            END
            AS huruf,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00
            WHEN max(b.nilai) >= 66.00 THEN 3.00
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00
            END
            AS bobot
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester = '4'
            GROUP BY a.kodematkul
            ORDER BY nama, kodematkul ASC
            ");
        return $query;
    }
    public function get_nilai_semester_5($nim)
    {
        $query = rst2Array("
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks,
            case
            WHEN max(a.nilai) >= 76.00 THEN 'A'
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 'B'
            WHEN max(b.nilai) >= 66.00 THEN 'B'
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 'C'
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 'C'
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 'D'
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 'D'
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 'E'
            END
            AS huruf,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00
            WHEN max(b.nilai) >= 66.00 THEN 3.00
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00
            END
            AS bobot
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester = '5'
            GROUP BY a.kodematkul
            ORDER BY nama, kodematkul ASC
            ");
        return $query;
    }

    public function get_nilai_semester_6($nim)
    {
        $query = rst2Array("
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks,
            case
            WHEN max(a.nilai) >= 76.00 THEN 'A'
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 'B'
            WHEN max(b.nilai) >= 66.00 THEN 'B'
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 'C'
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 'C'
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 'D'
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 'D'
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 'E'
            END
            AS huruf,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00
            WHEN max(b.nilai) >= 66.00 THEN 3.00
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00
            END
            AS bobot
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester = '6'
            GROUP BY a.kodematkul
            ORDER BY nama, kodematkul ASC
            ");
        return $query;
    }

    public function get_all_nilai_semester($nim)
    {
        $query = rst2Array("
            SELECT SUM(bobot) as bobot, sum(sks) totalsks FROM (
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks, a.nilai as nilai, a.tahunajaran as kode1,
            case
            WHEN max(a.nilai) >= 76.00 THEN 4.00*tbmatakuliah.sks
            WHEN max(a.nilai) >= 66.00 && max(a.nilai) <= 75.99 THEN 3.00*tbmatakuliah.sks
            WHEN max(b.nilai) >= 66.00 THEN 3.00*tbmatakuliah.sks
            WHEN max(a.nilai) >= 51.00 && max(a.nilai) <= 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN max(b.nilai) >= 51.00 && max(b.nilai) <= 65.99 THEN 2.00*tbmatakuliah.sks
            WHEN max(a.nilai) >= 40.00 && max(a.nilai) <= 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN max(b.nilai) >= 40.00 && max(b.nilai) <= 50.99 THEN 1.00*tbmatakuliah.sks
            WHEN max(a.nilai) < 39.99 && max(a.nilai) <= 39.99 THEN 0.00*tbmatakuliah.sks
            END
            AS bobot
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester <= '6'
            GROUP BY a.kodematkul
            ORDER BY a.kodematkul ASC ) x
            ");
        return $query;
    }

    public function get_sks_1_3($nim)
    {
        $query = rst2Array("
            SELECT SUM(sks) as total FROM (
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester <= '3'
            GROUP BY kodematkul ) x
            ");
        return $query;
    }
    public function get_sks_4_6($nim)
    {
        $query = rst2Array("
            SELECT SUM(sks) as total FROM (
            SELECT DISTINCT a.kodematkul, tbmatakuliah.nama, tbmatakuliah.sks
            FROM (SELECT * FROM tbstudi WHERE tbstudi.nim = '$nim' AND tbstudi.tahunajaran LIKE 'G%' ) AS a
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = a.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = a.tahunajaran
            LEFT OUTER JOIN (SELECT * FROM tbstudi WHERE tbstudi.tahunajaran LIKE 'RMD%' AND tbstudi.nim = '$nim' ) AS b
            on a.kodematkul = b.kodematkul
            WHERE tbmatakuliah.semester >= '4'
            GROUP BY kodematkul ) x
            ");
        return $query;
    }

    public function get_notif($id)
    {
        $query = rst2Array("
            SELECT *
            FROM tb_notif
            WHERE create_at
            IN (
            SELECT MAX(create_at)
            FROM tb_notif
            GROUP BY tb_notif.nim
            ) AND tb_notif.nim = '$id'
            ");
        return $query;
    }

    public function jenis_ekd()
    {
        $query = rst2Array("SELECT * FROM tb_soal_ekd GROUP BY tb_soal_ekd.type");
        return $query;
    }

    public function get_ekd($id, $ekd)
    // perlu optimasi
    {
        $query = rst2Array("SELECT
            tbkelas.nim,
            tbdosen.jenis_status,
            count(tb_dosen_ekd.id) as total
            FROM
            tbdosen
            LEFT JOIN
            tb_dosen_ekd
            ON
            tb_dosen_ekd.rel_nidn = tbdosen.nidn
            LEFT JOIN
            tbkelas
            ON
            tbkelas.kelas = tb_dosen_ekd.rel_kelas
            LEFT JOIN
            tb_soal_ekd
            ON
            tb_soal_ekd.type = tbdosen.jenis_status
            LEFT JOIN tbstudi on tbstudi.kodematkul = tb_dosen_ekd.rel_matkul
            LEFT JOIN
            tb_ekd
            ON
            tb_ekd.kode_ekd = tb_dosen_ekd.rel_kode_ekd
            WHERE
            tbkelas.nim = '$id' AND tbstudi.nim = '$id' AND
            tbstudi.tahunajaran = '$ekd' AND tb_ekd.rel_tahunajaran = '$ekd'
            GROUP BY
            tbdosen.jenis_status");
        return $query;
    }

    public function get_ekd_type($id, $ekd)
    // perlu optimasi
    {
        $query = rst2Array("SELECT
            tbkelas.nim,
            tbdosen.jenis_status
            FROM
            tbdosen
            LEFT JOIN
            tb_dosen_ekd
            ON
            tb_dosen_ekd.rel_nidn = tbdosen.nidn
            LEFT JOIN
            tbkelas
            ON
            tbkelas.kelas = tb_dosen_ekd.rel_kelas
            LEFT JOIN
            tb_soal_ekd
            ON
            tb_soal_ekd.type = tbdosen.jenis_status
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            LEFT JOIN
            tb_ekd
            ON
            tb_ekd.kode_ekd = tb_dosen_ekd.rel_kode_ekd
            WHERE
            tbkelas.nim = '$id' AND
            tb_ekd.rel_tahunajaran = '$ekd'
            GROUP BY
            tbdosen.jenis_status");
        return $query;
    }

    public function count_ekd_dosen($id, $ekd)
    {
        $query = rst2Array("
            SELECT SUM(A.TOTAL) as filled
FROM (
SELECT tbdosen.nidn, tbdosen.nama, tbmatakuliah.kode, tbmatakuliah.nama as matkul, COUNT(DISTINCT tb_responden_ekd.rel_soal) as TOTAL
FROM tb_responden_ekd
LEFT JOIN tbdosen on tbdosen.nidn = tb_responden_ekd.rel_nidn
LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_responden_ekd.rel_matkul
WHERE tb_responden_ekd.rel_nim = '$id' and tbdosen.jenis_status = 'dosen' and tb_responden_ekd.rel_kode_ekd like '%$ekd'
GROUP BY tb_responden_ekd.rel_nidn, rel_matkul
ORDER BY tbmatakuliah.nama) AS A");
        return $query;
    }

    public function count_ekd_laboran($id, $ekd)
    {
        $query = rst2Array("SELECT SUM(A.TOTAL) as filled
FROM (
SELECT tbdosen.nidn, tbdosen.nama, tbmatakuliah.kode, tbmatakuliah.nama as matkul, COUNT(DISTINCT tb_responden_ekd.rel_soal) as TOTAL
FROM tb_responden_ekd
LEFT JOIN tbdosen on tbdosen.nidn = tb_responden_ekd.rel_nidn
LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_responden_ekd.rel_matkul
WHERE tb_responden_ekd.rel_nim = '$id' and tbdosen.jenis_status = 'laboran' and tb_responden_ekd.rel_kode_ekd like '%$ekd'
GROUP BY tb_responden_ekd.rel_nidn, rel_matkul
ORDER BY tbmatakuliah.nama) AS A");
        return $query;
    }

    public function count_ekd_perpus($id, $ekd)
    {
        $query = rst2Array("SELECT SUM(A.TOTAL) as filled
FROM (
SELECT tbdosen.nidn, tbdosen.nama, tbmatakuliah.kode, tbmatakuliah.nama as matkul, COUNT(DISTINCT tb_responden_ekd.rel_soal) as TOTAL
FROM tb_responden_ekd
LEFT JOIN tbdosen on tbdosen.nidn = tb_responden_ekd.rel_nidn
LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_responden_ekd.rel_matkul
WHERE tb_responden_ekd.rel_nim = '$id' and tbdosen.jenis_status = 'pustakawan' and tb_responden_ekd.rel_kode_ekd like '%$ekd'
GROUP BY tb_responden_ekd.rel_nidn, rel_matkul
ORDER BY tbmatakuliah.nama) AS A");
        return $query;
    }

    public function ekd_perpus($id, $ekd)
    {
        $query = rst2Array("SELECT
            tbkelas.nim,
            tbdosen.jenis_status,
            count(tb_dosen_ekd.id) as total
            FROM
            tbdosen
            LEFT JOIN
            tb_dosen_ekd
            ON
            tb_dosen_ekd.rel_nidn = tbdosen.nidn
            LEFT JOIN
            tbkelas
            ON
            tbkelas.kelas = tb_dosen_ekd.rel_kelas
            LEFT JOIN
            tb_soal_ekd
            ON
            tb_soal_ekd.type = tbdosen.jenis_status
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            LEFT JOIN
            tb_ekd
            ON
            tb_ekd.kode_ekd = tb_dosen_ekd.rel_kode_ekd
            WHERE
            tbkelas.nim = '$id' AND tbdosen.jenis_status = 'pustakawan' and
            tb_ekd.rel_tahunajaran = '$ekd'
            GROUP BY
            tbdosen.jenis_status");
        return $query;
    }

    public function ekd_perpus_by_mhs($id, $subjek_ekd, $ekd)
    {
        $query = rst2Array("SELECT
            tbdosen.nama AS nama_dosen,
            tbmatakuliah.nama AS nama_matkul,
            tb_dosen_ekd.rel_nidn,
            tb_dosen_ekd.rel_matkul,
            tbdosen.gelardepan,
            tbdosen.gelarbelakang
            FROM
            tb_dosen_ekd
            JOIN tb_ekd ON tb_ekd.kode_ekd = tb_dosen_ekd.rel_kode_ekd
            JOIN tbdosen ON tbdosen.nidn = tb_dosen_ekd.rel_nidn
            JOIN tbkelas ON tbkelas.kelas = tb_dosen_ekd.rel_kelas
            JOIN tbmatakuliah ON tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            JOIN tb_soal_ekd ON tb_soal_ekd.type = tbdosen.jenis_status
            LEFT JOIN tb_responden_ekd ON tb_responden_ekd.rel_nim = tbkelas.nim
            AND tb_responden_ekd.rel_nidn = tbdosen.nidn
            AND tb_responden_ekd.rel_soal = tb_soal_ekd.id
            AND tb_responden_ekd.rel_kode_ekd = tb_ekd.kode_ekd
            AND tb_responden_ekd.rel_matkul = tbmatakuliah.kode
            WHERE
            tbkelas.nim = '$id'
            AND tbdosen.jenis_status = '$subjek_ekd'
            AND tb_responden_ekd.id IS NULL
            GROUP BY
            tb_dosen_ekd.rel_matkul,
            tb_dosen_ekd.rel_nidn
            ORDER BY
            tbmatakuliah.nama ASC");
        return $query;
    }

    public function ekd_matkul_by_mhs($id, $subjek_ekd, $ekd)
    {
        $query = rst2Array("SELECT
            tbdosen.nama AS nama_dosen,
            tbmatakuliah.nama AS nama_matkul,
            tb_dosen_ekd.rel_nidn,
            tb_dosen_ekd.rel_matkul,
            tbdosen.gelardepan,
            tbdosen.gelarbelakang
            FROM
            tb_dosen_ekd
            JOIN ( SELECT * FROM tbstudi WHERE tbstudi.tahunajaran = '$ekd' AND tbstudi.nim = '$id' ) AS KHS ON KHS.kodematkul = tb_dosen_ekd.rel_matkul
            JOIN tbdosen ON tbdosen.nidn = tb_dosen_ekd.rel_nidn
            JOIN tbkelas ON tbkelas.kelas = tb_dosen_ekd.rel_kelas
            JOIN tbmatakuliah ON tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            LEFT JOIN tb_ekd ON tb_ekd.kode_ekd = tb_dosen_ekd.rel_kode_ekd
            LEFT OUTER JOIN tb_responden_ekd ON tb_responden_ekd.rel_nim = tbkelas.nim
            AND tb_responden_ekd.rel_nidn = tbdosen.nidn
            AND tb_responden_ekd.rel_kode_ekd = tb_ekd.kode_ekd
            AND tb_responden_ekd.rel_matkul = tbmatakuliah.kode
            WHERE
            tbkelas.nim = '$id'
            AND tbdosen.jenis_status = '$subjek_ekd'
            AND tb_responden_ekd.id IS NULL
            GROUP BY
            tb_dosen_ekd.rel_matkul,
            tb_dosen_ekd.rel_nidn
            ORDER BY
            tbmatakuliah.nama ASC");
        return $query;
    }

    public function ekd_matkul_by_mhs_v2($id, $subjek_ekd, $ekd)
    {
        $query = rst2Array("SELECT
    tbstudi.kodematkul,
    tbmatakuliah.nama as nama_matkul,
    tbdosen.gelardepan,
    tbdosen.nama as nama_dosen,
    tbdosen.gelarbelakang,
    tb_dosen_ekd.rel_nidn,
    responden.total
FROM
    tbstudi
    LEFT JOIN tb_dosen_ekd ON tb_dosen_ekd.rel_matkul = tbstudi.kodematkul
    LEFT JOIN tbkelas ON tbkelas.kelas = tb_dosen_ekd.rel_kelas
    LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
    LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_ekd.rel_nidn
    LEFT JOIN (
    SELECT
        tb_responden_ekd.rel_nidn,
        tb_responden_ekd.rel_matkul,
        count( tb_responden_ekd.id ) AS total
    FROM
        tb_responden_ekd
    WHERE
        tb_responden_ekd.rel_nim = '$id'
        AND tb_responden_ekd.rel_kode_ekd = 'EKD$ekd'
    GROUP BY
        tb_responden_ekd.rel_nidn,
        tb_responden_ekd.rel_matkul
    ) AS responden ON responden.rel_nidn = tb_dosen_ekd.rel_nidn AND responden.rel_matkul = tb_dosen_ekd.rel_matkul
WHERE
    tbstudi.nim = '$id'
    AND tbstudi.tahunajaran = '$ekd'
    AND tbkelas.nim = '$id'
    AND tb_dosen_ekd.rel_kode_ekd = 'EKD$ekd'
GROUP BY
    tbstudi.kodematkul,
    tb_dosen_ekd.rel_nidn
ORDER BY
    tbmatakuliah.nama");
        return $query;
    }

    public function kuisioner_ekd($nidn)
    {
        $query = rst2Array("SELECT DISTINCT tb_soal_ekd.id, tb_soal_ekd.soal, tb_dosen_ekd.rel_kode_ekd, tbdosen.nidn
            FROM tb_soal_ekd
            LEFT JOIN tbdosen on tbdosen.jenis_status = tb_soal_ekd.type
            LEFT JOIN tb_dosen_ekd on tb_dosen_ekd.rel_nidn = tbdosen.nidn
            WHERE tbdosen.nidn = '$nidn'
            GROUP BY tb_soal_ekd.id
            ORDER BY RAND(tb_soal_ekd.soal)");
        return $query;
    }

    public function nilai_ekd()
    {
        $query = rst2Array("SELECT *
            FROM tb_bobot_ekd
            ORDER BY nilai ASC");
        return $query;
    }

    public function get_jenis_sertifikasi($id)
    {
        $query = rst2Array("SELECT * FROM tb_jenis_sertifikasi
        WHERE tb_jenis_sertifikasi.kode NOT IN (SELECT tbsertifikasi.jenis FROM tbsertifikasi WHERE tbsertifikasi.nim = '$id') and tb_jenis_sertifikasi.urgent = '1'");
        return $query;
    }

    public function selected_kuisioner($nidn, $matkul)
    {
        $query = rst2Array("SELECT DISTINCT tbdosen.nidn, tbdosen.nama as nama_dosen, tbdosen.gelardepan, tbdosen.gelarbelakang, tbmatakuliah.kode, tbmatakuliah.nama as nama_matkul
            from tbdosen
            JOIN tb_dosen_ekd on tb_dosen_ekd.rel_nidn = tbdosen.nidn
            JOIN tbmatakuliah on tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            WHERE tb_dosen_ekd.rel_nidn = '$nidn' and tb_dosen_ekd.rel_matkul = '$matkul'");
        return $query;
    }

    public function test_hitung_ekd($id, $ekd)
    {
        $query = rst2Array("SELECT tbdosen.nidn, tbdosen.nama, tbmatakuliah.nama as matkul, COUNT( DISTINCT tb_responden_ekd.rel_soal)
            FROM tb_responden_ekd
            LEFT JOIN tbdosen on tbdosen.nidn = tb_responden_ekd.rel_nidn
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_responden_ekd.rel_matkul
            WHERE tb_responden_ekd.rel_nim = '$id' and tbdosen.jenis_status = 'dosen'
            GROUP BY tb_responden_ekd.rel_nidn, rel_matkul
            ORDER BY tbmatakuliah.nama");
        return $query;
    }

    public function check_proposal_or_kti_picked($id)
    {
        $query = rst2Array("SELECT * FROM tbstudi WHERE tbstudi.nim = '$id' AND (tbstudi.kodematkul = 'A606905517' OR tbstudi.kodematkul = 'A606605317')");
        return $query;
    }

    public function check_proposal_picked($id)
    {
        $query = rst2Array("SELECT * FROM tbstudi WHERE tbstudi.nim = '$id' and tbstudi.kodematkul = 'A606605317'");
        return $query;
    }

    public function check_proposal_apply($id)
    {
        $query = rst2Array("SELECT * FROM tb_proposal_kti WHERE tb_proposal_kti.rel_nim = '$id'");
        return $query;
    }

    public function check_dosen($id)
    {
        $query = rst2Array("SELECT *
        FROM tb_dosen_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_proposal.rel_nidn
        WHERE tb_dosen_proposal.rel_nim = '$id'
        ORDER BY tb_dosen_proposal.jenis ASC");
        return $query;
    }

    public function check_dosen_kti($id)
    {
        $query = rst2Array("SELECT *
        FROM tb_dosen_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_proposal.rel_nidn
        WHERE tb_dosen_proposal.rel_nim = '$id'
        ORDER BY tb_dosen_proposal.jenis ASC");
        return $query;
    }

    public function check_queue_validation($id)
    {
        $query = rst2Array("SELECT tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id, tb_validasi_proposal.created_at
        FROM tb_validasi_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_validasi_proposal.rel_nidn
        WHERE tb_validasi_proposal.rel_nim = '$id' and (tb_validasi_proposal.tipe = 'Pengesahan Sebelum Sidang Proposal KTI' or tb_validasi_proposal.tipe = 'Pengesahan Sebelum Sidang')");
        return $query;
    }

    public function check_queue_validation_after($id)
    {
        $query = rst2Array("SELECT
    tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id,tb_validasi_proposal.created_at, tb_validasi_proposal.tipe,
    tb_dosen_proposal.jenis
FROM
    tb_validasi_proposal
    LEFT JOIN
    tbdosen
    ON
        tbdosen.nidn = tb_validasi_proposal.rel_nidn
    LEFT JOIN
    tb_dosen_proposal
    ON
        tb_dosen_proposal.rel_nidn = tb_validasi_proposal.rel_nidn AND
        tb_validasi_proposal.rel_nim = tb_dosen_proposal.rel_nim
WHERE
    tb_validasi_proposal.rel_nim = '$id' AND
   (tb_validasi_proposal.tipe = 'Pengesahan Sesudah Sidang Proposal KTI' or tb_validasi_proposal.tipe = 'Pengesahan Sesudah Sidang')
    ORDER BY tb_dosen_proposal.jenis");
        return $query;
    }

    public function check_queue_kti_validation_before($id)
    {
        $query = rst2Array("SELECT
    tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id,tb_validasi_proposal.created_at, tb_validasi_proposal.tipe,
    tb_dosen_proposal.jenis
FROM
    tb_validasi_proposal
    LEFT JOIN
    tbdosen
    ON
        tbdosen.nidn = tb_validasi_proposal.rel_nidn
    LEFT JOIN
    tb_dosen_proposal
    ON
        tb_dosen_proposal.rel_nidn = tb_validasi_proposal.rel_nidn AND
        tb_validasi_proposal.rel_nim = tb_dosen_proposal.rel_nim
WHERE
    tb_validasi_proposal.rel_nim = '$id' AND
    tb_validasi_proposal.tipe = 'Pengesahan Sebelum Sidang KTI'
    ORDER BY tb_dosen_proposal.jenis");
        return $query;
    }

    public function check_queue_kti_validation_after($id)
    {
        $query = rst2Array("SELECT
    tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id,tb_validasi_proposal.created_at, tb_validasi_proposal.tipe,
    tb_dosen_proposal.jenis
FROM
    tb_validasi_proposal
    LEFT JOIN
    tbdosen
    ON
        tbdosen.nidn = tb_validasi_proposal.rel_nidn
    LEFT JOIN
    tb_dosen_proposal
    ON
        tb_dosen_proposal.rel_nidn = tb_validasi_proposal.rel_nidn AND
        tb_validasi_proposal.rel_nim = tb_dosen_proposal.rel_nim
WHERE
    tb_validasi_proposal.rel_nim = '$id' AND
    tb_validasi_proposal.tipe = 'Pengesahan Sesudah Sidang KTI'
    ORDER BY tb_dosen_proposal.jenis");
        return $query;
    }

    public function get_kti_before_validation_queue($id)
    {
        $query = rst2Array("SELECT tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id, tb_validasi_proposal.created_at
        FROM tb_validasi_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_validasi_proposal.rel_nidn
        WHERE tb_validasi_proposal.rel_nim = '$id' and tb_validasi_proposal.tipe = 'Pengesahan Sebelum Sidang KTI' and tb_validasi_proposal.qrcode_id is not null");
        return $query;
    }

    public function get_kti_after_validation_queue($id)
    {
        $query = rst2Array("SELECT tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id, tb_validasi_proposal.created_at
        FROM tb_validasi_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_validasi_proposal.rel_nidn
        WHERE tb_validasi_proposal.rel_nim = '$id' and tb_validasi_proposal.tipe = 'Pengesahan Sesudah Sidang KTI' and tb_validasi_proposal.qrcode_id is not null");
        return $query;
    }

    public function get_proposal_before_validation_queue($id)
    {
        $query = rst2Array("SELECT tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id, tb_validasi_proposal.created_at
        FROM tb_validasi_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_validasi_proposal.rel_nidn
        WHERE tb_validasi_proposal.rel_nim = '$id' and (tb_validasi_proposal.tipe = 'Pengesahan Sebelum Sidang' or tb_validasi_proposal.tipe = 'Pengesahan Sebelum Sidang Proposal KTI') and tb_validasi_proposal.qrcode_id is not null");
        return $query;
    }

    public function get_proposal_after_validation_queue($id)
    {
        $query = rst2Array("SELECT tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.qrcode_id, tb_validasi_proposal.created_at
        FROM tb_validasi_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_validasi_proposal.rel_nidn
        WHERE tb_validasi_proposal.rel_nim = '$id' and (tb_validasi_proposal.tipe = 'Pengesahan Sesudah Sidang' or tb_validasi_proposal.tipe = 'Pengesahan Sesudah Sidang Proposal KTI') and tb_validasi_proposal.qrcode_id is not null");
        return $query;
    }

    public function check_dosen_sblm_kti($id)
    {
        $query = rst2Array("SELECT *
        FROM tb_dosen_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_proposal.rel_nidn
        WHERE tb_dosen_proposal.rel_nim = '$id' and tb_dosen_proposal.jenis LIKE 'Pembimbing%'");
        return $query;
    }

    public function check_dosen_stlh_kti($id)
    {
        $query = rst2Array("SELECT *
        FROM tb_dosen_proposal
        LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_proposal.rel_nidn
        WHERE tb_dosen_proposal.rel_nim = '$id'");
        return $query;
    }

    public function get_dosen()
    {
        $query = rst2Array("SELECT * FROM tbdosen WHERE tbdosen.jenis_status = 'dosen'");
        return $query;
    }

    public function register_kti($id, $judul_proposal, $subjudul_proposal, $semesternow)
    {

        date_default_timezone_set('Asia/Jakarta');
        $hash = 'kti' . $semesternow;
        $data = array(
            'unique_id'       => md5($hash . $id),
            'judul'           => $judul_proposal,
            'rel_nim'         => $id,
            'sub_judul'       => $sub_judul,
            'rel_tahunajaran' => $semesternow,
            'data_created'    => date("Y-m-d H:i:s"),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_kti', $data);
    }

    public function register_proposal_kti($id, $semesternow)
    {

        date_default_timezone_set('Asia/Jakarta');
        $hash = 'proposal_kti';
        $data = array(
            'unique_id'       => md5($hash . $id),
            'judul'           => $this->input->post('judul'),
            'rel_nim'         => $id,
            'sub_judul'       => $this->input->post('sub_judul'),
            'rel_tahunajaran' => $semesternow,
            'data_created'    => date("Y-m-d H:i:s"),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_proposal_kti', $data);
    }

    public function edit_judul_kti($id)
    {
        $data = array(
            'judul'     => $this->input->post('judul'),
            'sub_judul' => $this->input->post('sub_judul'),
        );
        // dump($data);
        $res_insert = $this->db->update('tb_proposal_kti', $data, array('rel_nim' => $id));
    }

    public function kti_add_dosen($id)
    {

        date_default_timezone_set('Asia/Jakarta');
        $hash = 'kti';
        $data = array(
            'rel_nim'    => $id,
            'rel_nidn'   => $this->input->post('rel_nidn'),
            'jenis'      => $this->input->post('jenis'),
            'created_at' => date("Y-m-d H:i:s"),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_dosen_proposal', $data);
    }

}
