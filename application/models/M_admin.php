    <?php
class M_admin extends CI_Model
{
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
    public function getallangkatan()
    {
        $query = rst2Array("SELECT tbmahasiswa.angkatan FROM tbmahasiswa GROUP BY tbmahasiswa.angkatan ORDER BY tbmahasiswa.angkatan DESC");
        return $query;
    }
    public function getmahasiswabyangkatan($nim)
    {
        $query = rst2Array("SELECT tbmahasiswa.id, tbmahasiswa.nopeserta, tbmahasiswa.nim, tbmahasiswa.namalengkap, tbvalidasikrs.status as status_krs FROM tbmahasiswa
        LEFT JOIN tbvalidasikrs on tbvalidasikrs.nim = tbmahasiswa.nim
        WHERE tbmahasiswa.angkatan = '$nim'  and tbmahasiswa.nim is not null and tbmahasiswa.nim != '' GROUP BY tbmahasiswa.nim
        ");
        return $query;
    }
    public function get_akademik_mhs_by_angkatan($nim)
    {
        $query = rst2Array("SELECT tbmahasiswa.id, tbmahasiswa.nopeserta, tbmahasiswa.nim, tbmahasiswa.namalengkap, tbmahasiswa.foto FROM tbmahasiswa WHERE tbmahasiswa.angkatan = '$nim'");
        return $query;
    }
    public function getallmhs()
    {
        $query = rst2Array("SELECT * FROM tbmahasiswa ORDER BY nopeserta ASC");
        return $query;
    }
    public function getallagama()
    {
        $query = rst2Array("SELECT * FROM tbagama ORDER BY value ASC");
        return $query;
    }
    public function getallprofesi()
    {
        $query = rst2Array("SELECT * FROM tbprofesi ORDER BY value ASC");
        return $query;
    }
    public function getallpendidikan()
    {
        $query = rst2Array("SELECT * FROM tbpendidikan ORDER BY value ASC");
        return $query;
    }
    public function getallkelamin()
    {
        $query = rst2Array("SELECT * FROM tbkelamin ORDER BY value ASC");
        return $query;
    }
    public function getalljenistinggal()
    {
        $query = rst2Array("SELECT * FROM tbjenistinggal ORDER BY value ASC");
        return $query;
    }
    public function getallpenghasilan()
    {
        $query = rst2Array("SELECT * FROM tbpenghasilan ORDER BY value ASC");
        return $query;
    }
    public function getalljenisdaftar()
    {
        $query = rst2Array("SELECT * FROM tbjenisdaftar ORDER BY value ASC");
        return $query;
    }
    public function getselectedkelamin($id)
    {
        $query = rst2Array("SELECT tbkelamin.nama
        FROM tbmahasiswa, tbkelamin
        WHERE tbmahasiswa.id='$id' AND tbkelamin.value=tbmahasiswa.kelaminmhs");
        return $query;
    }
    public function getselectedpenghasilanayah($id)
    {
        $query = rst2Array("SELECT tbpenghasilan.nama
        FROM tbmahasiswa, tbpenghasilan
        WHERE tbmahasiswa.id='$id' AND tbpenghasilan.value=tbmahasiswa.penghasilanayah");
        return $query;
    }
    public function getselectedpenghasilanibu($id)
    {
        $query = rst2Array("SELECT tbpenghasilan.nama
        FROM tbmahasiswa, tbpenghasilan
        WHERE tbmahasiswa.id='$id' AND tbpenghasilan.value=tbmahasiswa.penghasilanibu");
        return $query;
    }
    public function getselectedpenghasilanwali($id)
    {
        $query = rst2Array("SELECT tbpenghasilan.nama
        FROM tbmahasiswa, tbpenghasilan
        WHERE tbmahasiswa.id='$id' AND tbpenghasilan.value=tbmahasiswa.penghasilanwali");
        return $query;
    }
    public function getselecteddidikayah($id)
    {
        $query = rst2Array("SELECT tbpendidikan.nama
        FROM tbmahasiswa, tbpendidikan
        WHERE tbmahasiswa.id='$id' AND tbpendidikan.value=tbmahasiswa.pendidikanayah");
        return $query;
    }
    public function getselecteddidikibu($id)
    {
        $query = rst2Array("SELECT tbpendidikan.nama
        FROM tbmahasiswa, tbpendidikan
        WHERE tbmahasiswa.id='$id' AND tbpendidikan.value=tbmahasiswa.pendidikanibu");
        return $query;
    }
    public function getselecteddidikwali($id)
    {
        $query = rst2Array("SELECT tbpendidikan.nama
        FROM tbmahasiswa, tbpendidikan
        WHERE tbmahasiswa.id='$id' AND tbpendidikan.value=tbmahasiswa.pendidikanwali");
        return $query;
    }
    public function getselectedproayah($id)
    {
        $query = rst2Array("SELECT tbprofesi.nama
        FROM tbmahasiswa, tbprofesi
        WHERE tbmahasiswa.id='$id' AND tbprofesi.value=tbmahasiswa.profesiayah");
        return $query;
    }
    public function getselectedproibu($id)
    {
        $query = rst2Array("SELECT tbprofesi.nama
        FROM tbmahasiswa, tbprofesi
        WHERE tbmahasiswa.id='$id' AND tbprofesi.value=tbmahasiswa.profesiibu");
        return $query;
    }
    public function getselectedprowali($id)
    {
        $query = rst2Array("SELECT tbprofesi.nama
        FROM tbmahasiswa, tbprofesi
        WHERE tbmahasiswa.id='$id' AND tbprofesi.value=tbmahasiswa.profesiibu");
        return $query;
    }
    public function getselectedagama($id)
    {
        $query = rst2Array("SELECT tbagama.nama
        FROM tbmahasiswa, tbagama
        WHERE tbmahasiswa.id='$id' and tbagama.value=tbmahasiswa.agamamahasiswa");
        return $query;
    }
    public function getselectedjenisdaftar($id)
    {
        $query = rst2Array("SELECT tbjenisdaftar.nama
        FROM tbmahasiswa, tbjenisdaftar
        WHERE tbmahasiswa.id='$id' and tbjenisdaftar.value=tbmahasiswa.jenisdaftar");
        return $query;
    }
    public function getselecteddom($id)
    {
        $query = rst2Array("SELECT tbjenistinggal.nama
        FROM tbmahasiswa, tbjenistinggal
        WHERE tbmahasiswa.id='$id' and tbjenistinggal.value=tbmahasiswa.jenisdom");
        return $query;
    }
    public function getselectedagamaayah($id)
    {
        $query = rst2Array("SELECT tbagama.nama
        FROM tbmahasiswa, tbagama
        WHERE tbmahasiswa.id='$id' AND tbagama.value=tbmahasiswa.agamaayah");
        return $query;
    }
    public function getselectedagamaibu($id)
    {
        $query = rst2Array("SELECT tbagama.nama
        FROM tbmahasiswa, tbagama
        WHERE tbmahasiswa.id='$id' AND tbagama.value=tbmahasiswa.agamaibu");
        return $query;
    }
    public function getselectedagamawali($id)
    {
        $query = rst2Array("SELECT tbagama.nama
        FROM tbmahasiswa, tbagama
        WHERE tbmahasiswa.id='$id' AND tbagama.value=tbmahasiswa.agamawali");
        return $query;
    }
    public function injeknim($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbmahasiswa', $data);
        return true;
    }
    public function inputakun($create, $table)
    {
        $this->db->insert($table, $create);
    }
    public function edit_foto($id)
    {
        $nmFile  = $_FILES['file']['name'];
        $tmpFile = $_FILES['file']['tmp_name'];
        $data    = array(
            'foto' => $nmFile,
        );
        $res_insert = $this->db->update('tbmahasiswa', $data, array('id' => $id));
        move_uploaded_file($tmpFile, './uploads/foto/' . $nmFile);
    }
    // Model Pembayaran //
    public function getbayar()
    {
        $query = rst2Array("SELECT * FROM tbpembayaran ORDER BY id DESC");
        return $query;
    }
    public function getdatasiswabyangkatan($angkatan, $kode)
    {
        $query = rst2Array("SELECT
        nim,
        namalengkap,
        angkatan
        FROM
        tbmahasiswa
        WHERE
        angkatan = '$angkatan' and not EXISTS(
        SELECT *
        FROM tbverifikasipembayaran
        WHERE tbverifikasipembayaran.tahunajaran = '$kode' and tbverifikasipembayaran.nim =  tbmahasiswa.nim)");
        return $query;
    }
    public function getjumlahsiswabyangkatan()
    {
        $query = rst2Array("SELECT
        angkatan,
        COUNT(angkatan) AS jumlah
        FROM
        tbmahasiswa
        GROUP BY
        angkatan
        ORDER BY
        angkatan DESC
        LIMIT 4");
        return $query;
    }
    public function getdatabykodepembayaran($kode, $angkatan)
    {
        $query = rst2Array("SELECT DISTINCT
        tbverifikasipembayaran.id,
        tbmahasiswa.nim,
        tbmahasiswa.namalengkap,
        tbmahasiswa.angkatan
        FROM
        tbmahasiswa
        LEFT OUTER JOIN tbverifikasipembayaran ON tbmahasiswa.nim = tbverifikasipembayaran.nim
        LEFT OUTER JOIN tbpembayaran ON tbverifikasipembayaran.tahunajaran = tbpembayaran.kode
        WHERE
        tbpembayaran.kode = '$kode' AND tbmahasiswa.angkatan = '$angkatan'");
        return $query;
    }
    // SHOW DATA NILAI KHS
    public function countnilaiterisi($last)
    {
        $query = rst2Array("SELECT COUNT(tbstudi.id) AS total, COUNT(CASE
        WHEN tbstudi.nilai >2 THEN tbstudi.nilai END) AS done
        FROM tbstudi
        WHERE tbstudi.tahunajaran = '$last'");
        return $query;
    }
    public function selectedmatkulbyta($tahunajaran)
    {
        $query = rst2Array("SELECT tbstudi.id, tbstudi.kodematkul, tbmatakuliah.nama, tbmatakuliah.semester,
        COUNT(
        CASE
        when tbstudi.nilai IS NULL
        THEN NULL
        when tbstudi.nilai <= 0 then null
        else 2
        END) as done,
        COUNT(tbstudi.id) as total
        FROM tbstudi
        LEFT JOIN tbmatakuliah on tbstudi.kodematkul = tbmatakuliah.kode
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
        LEFT JOIN tbkelas on tbkelas.nim = tbstudi.nim
        WHERE tahunajaran = '$tahunajaran' GROUP BY kodematkul ORDER BY tbmatakuliah.semester ASC, tbmatakuliah.nama ASC");
        return $query;
    }
    public function selectedmatkulbykode($tahunajaran, $kodematkul)
    {
        $query = rst2Array("SELECT tbstudi.id, tbmatakuliah.nama, tbstudi.kodematkul, tbstudi.nim, tbstudi.tahunajaran, tbstudi.nilai, tbkelas.kelas,
        COUNT(
        CASE
        when tbstudi.nilai IS NULL
        THEN NULL
        when tbstudi.nilai <= 0 then null
        else 2
        END) as done,
        COUNT(tbstudi.id) as total
        FROM tbstudi
        LEFT JOIN tbmatakuliah on tbstudi.kodematkul = tbmatakuliah.kode
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
        LEFT JOIN tbkelas on tbkelas.nim = tbstudi.nim
        WHERE tbstudi.tahunajaran ='$tahunajaran' and kodematkul = '$kodematkul' GROUP BY tbkelas.kelas");
        return $query;
    }
    public function getnilaibykelas($tahunajaran, $kodematkul, $kelas)
    {
        $query = rst2Array("SELECT tbstudi.id, tbmahasiswa.namalengkap, tbstudi.kodematkul, tbstudi.nim, tbstudi.tahunajaran, tbmahasiswa.kelaminmhs, tbstudi.nilai, tbkelas.kelas,
        CASE
        WHEN tbstudi.nilai is NULL || tbstudi.nilai <= 39.99 THEN 'E'
        WHEN tbstudi.nilai >= 40.00 && tbstudi.nilai <= 50.99 THEN 'D'
        WHEN tbstudi.nilai >= 51.00 && tbstudi.nilai <= 65.99 THEN 'C'
        WHEN tbstudi.nilai >= 66.00 && tbstudi.nilai <= 75.99 THEN 'B'
        ELSE 'A'
        END
        AS huruf
        FROM tbstudi
        LEFT JOIN tbmatakuliah on tbstudi.kodematkul = tbmatakuliah.kode
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
        LEFT JOIN tbkelas on tbkelas.nim = tbstudi.nim
        WHERE tbstudi.tahunajaran ='$tahunajaran' and kodematkul = '$kodematkul' and tbkelas.kelas = '$kelas' order by tbmahasiswa.nim ASC ");
        return $query;
    }
    public function updatenilaimhs($id, $value, $modul)
    {
        $this->db->where(array("id" => $id));
        $this->db->update("tbstudi", array($modul => $value));
    }

    public function saveNilaiExcel($id, $nim, $nilai)
    {
        $this->db->where(array("kodematkul" => $id, "nim" => $nim));
        $this->db->update("tbstudi", array("nilai" => $nilai));
    }
    public function premitkrs($create, $table)
    {
        $this->db->insert($table, $create);
    }
    // PJMK
    public function getselectedmatkul($kodematkul)
    {
        $query = rst2Array("SELECT *
        FROM tbmatakuliah
        WHERE tbmatakuliah.kode = '$kodematkul'");
        return $query;
    }
    public function getdatapjmk()
    {
        $query = rst2Array("SELECT tbpembayaran.id, tbpembayaran.kode, tbpembayaran.tahunajaran, tbpembayaran.semester, tbajar.permit
        FROM tbpembayaran
        LEFT JOIN tbajar on tbajar.tahunajaran = tbpembayaran.kode
        GROUP BY tbpembayaran.kode ORDER BY tbpembayaran.id DESC");
        return $query;
    }
    public function permitpjmkall($data, $id)
    {
        $this->db->where('tahunajaran', $id);
        $this->db->update('tbajar', $data);
        return true;
    }
    public function autob($data, $id)
    {
        $where = "tahunajaran='$id' AND (tbstudi.nilai = '' or tbstudi.nilai is NULL)";
        // $this->db->where('tahunajaran',$id);
        $this->db->where($where);
        $this->db->update('tbstudi', $data);
        return true;
    }
    public function getdatapjmkbymatkul($tahunajaran, $kodematkul)
    {
        $query = rst2Array("SELECT tbajar.id, tbajar.nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tbajar.reguler, tbajar.permit, tbajar.koor
        FROM tbajar
        LEFT JOIN tbdosen on tbdosen.nidn = tbajar.nidn
        WHERE tbajar.kode = '$kodematkul' and tbajar.tahunajaran = '$tahunajaran' order by tbajar.koor DESC");
        return $query;
    }
    // public function getmatkulbypjmk($tahunajaran,$kodematkul,$reguler) {
    // edited by akbar
    public function getmatkulbypjmk($tahunajaran, $kodematkul, $reguler = null)
    {
        // $query = rst2Array("SELECT tbmatakuliah.kode, tbmatakuliah.nama, tbpembayaran.semester, tbpembayaran.tahunajaran, tbajar.nidn, tbdosen.nama as dosen, tbdosen.gelardepan as dp, tbdosen.gelarbelakang as bk, tbajar.reguler
        //     FROM tbmatakuliah
        //     INNER JOIN tbajar ON tbajar.kode = tbmatakuliah.kode
        //     INNER JOIN tbpembayaran ON tbpembayaran.kode =  tbajar.tahunajaran
        //     LEFT JOIN tbdosen on tbdosen.nidn = tbajar.nidn
        //     WHERE tbmatakuliah.kode = '$kodematkul' AND tbpembayaran.kode = '$tahunajaran' AND tbajar.koor = '1' AND tbajar.reguler like '$reguler'");
        $query = rst2Array("SELECT tbmatakuliah.kode, tbmatakuliah.nama, tbpembayaran.semester, tbpembayaran.tahunajaran, tbajar.nidn, tbdosen.nama as dosen, tbdosen.gelardepan as dp, tbdosen.gelarbelakang as bk, tbajar.reguler
        FROM tbmatakuliah
        INNER JOIN tbajar ON tbajar.kode = tbmatakuliah.kode
        INNER JOIN tbpembayaran ON tbpembayaran.kode =  tbajar.tahunajaran
        LEFT JOIN tbdosen on tbdosen.nidn = tbajar.nidn
        WHERE tbmatakuliah.kode = '$kodematkul' AND tbpembayaran.kode = '$tahunajaran' AND tbajar.koor = '1' and tbajar.reguler like '$reguler%'");
        return $query;
    }
    public function getmatkulbypjmkprodi($kodematkul)
    {
        $query = rst2Array("SELECT DISTINCT tbmatakuliah.kode, tbmatakuliah.nama
        FROM tbmatakuliah
        LEFT JOIN tbajar ON tbajar.kode = tbmatakuliah.kode
        LEFT JOIN tbpembayaran ON tbpembayaran.kode =  tbajar.tahunajaran
        WHERE tbmatakuliah.kode = '$kodematkul'  ");
        return $query;
    }
    public function addpjmk($tahunajaran, $kodematkul)
    {
        $permit = "1";
        $data   = array(
            'kode'        => $kodematkul,
            'nidn'        => $this->input->post('nidn'),
            'reguler'     => $this->input->post('reguler'),
            'permit'      => $permit,
            'koor'        => $this->input->post('koor'),
            'tahunajaran' => $tahunajaran,
        );
        // dump($data);
        $res_insert = $this->db->insert('tbajar', $data);
    }
    public function getselectedpjmk($id)
    {
        $query = rst2Array("SELECT tbajar.id, tbajar.kode, tbajar.nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tbajar.reguler, tbajar.tahunajaran, tbajar.koor
        FROM tbajar
        LEFT JOIN tbdosen on tbdosen.nidn =  tbajar.nidn
        WHERE tbajar.id='$id'");
        return $query;
    }
    public function updatepjmk($id)
    {
        $data = array(
            'kode'        => $this->input->post('kode'),
            'tahunajaran' => $this->input->post('tahunajaran'),
            'nidn'        => $this->input->post('nidn'),
            'koor'        => $this->input->post('koor'),
            'reguler'     => $this->input->post('reguler'),
        );
        //dump($data);
        $res_insert = $this->db->update('tbajar', $data, array('id' => $id));
    }
    public function grafikmatkulbyrega($tahunajaran, $kodematkul)
    {
        $query = rst2Array(" SELECT COUNT(CASE
        WHEN tbstudi.nilai is NULL THEN 0.00*tbmatakuliah.sks
        WHEN tbstudi.nilai < 39.99 THEN 0.00*tbmatakuliah.sks
        WHEN tbstudi.nilai >= 40.00 && tbstudi.nilai <= 50.99 THEN 1.00*tbmatakuliah.sks
        WHEN tbstudi.nilai >= 51.00 && tbstudi.nilai <= 65.99 THEN 2.00*tbmatakuliah.sks
        WHEN tbstudi.nilai >= 66.00 && tbstudi.nilai <= 75.99 THEN 3.00*tbmatakuliah.sks
        ELSE 4.00*tbmatakuliah.sks
        END) AS y,
        CASE
        WHEN tbstudi.nilai is NULL || tbstudi.nilai <= 39.99 THEN 'E'
        WHEN tbstudi.nilai >= 40.00 && tbstudi.nilai <= 50.99 THEN 'D'
        WHEN tbstudi.nilai >= 51.00 && tbstudi.nilai <= 65.99 THEN 'C'
        WHEN tbstudi.nilai >= 66.00 && tbstudi.nilai <= 75.99 THEN 'B'
        ELSE 'A'
        END
        AS name
        FROM tbstudi
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
        LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
        WHERE kodematkul = '$kodematkul' and tbstudi.tahunajaran = '$tahunajaran' and tbmahasiswa.reguler = 'A'
        GROUP BY name");
        return $query;
    }
    public function grafikmatkulbyregb($tahunajaran, $kodematkul)
    {
        $query = rst2Array(" SELECT COUNT(CASE
        WHEN tbstudi.nilai is NULL THEN 0.00*tbmatakuliah.sks
        WHEN tbstudi.nilai < 39.99 THEN 0.00*tbmatakuliah.sks
        WHEN tbstudi.nilai >= 40.00 && tbstudi.nilai <= 50.99 THEN 1.00*tbmatakuliah.sks
        WHEN tbstudi.nilai >= 51.00 && tbstudi.nilai <= 65.99 THEN 2.00*tbmatakuliah.sks
        WHEN tbstudi.nilai >= 66.00 && tbstudi.nilai <= 75.99 THEN 3.00*tbmatakuliah.sks
        ELSE 4.00*tbmatakuliah.sks
        END) AS y,
        CASE
        WHEN tbstudi.nilai is NULL || tbstudi.nilai <= 39.99 THEN 'E'
        WHEN tbstudi.nilai >= 40.00 && tbstudi.nilai <= 50.99 THEN 'D'
        WHEN tbstudi.nilai >= 51.00 && tbstudi.nilai <= 65.99 THEN 'C'
        WHEN tbstudi.nilai >= 66.00 && tbstudi.nilai <= 75.99 THEN 'B'
        ELSE 'A'
        END
        AS name
        FROM tbstudi
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
        LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
        WHERE kodematkul = '$kodematkul' and tbstudi.tahunajaran = '$tahunajaran' and tbmahasiswa.reguler = 'B'
        GROUP BY name");
        return $query;
    }
    public function loginputnilai($tahunajaran, $kodematkul, $nim)
    {
        $query = rst2Array("SELECT tblognilai.id, tbmahasiswa.nim, tbmahasiswa.namalengkap, tbmatakuliah.kode, tbmatakuliah.nama, tbstudi.tahunajaran, tblognilai.nilai, tbdosen.nama, tblognilai.date
        FROM tblognilai
        LEFT JOIN tbstudi on tbstudi.id = tblognilai.source
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
        LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
        LEFT JOIN tbdosen on tbdosen.nidn = tblognilai.input
        LEFT JOIN tbkelas on tbkelas.nim = tbmahasiswa.nim
        WHERE tbstudi.nim = '$nim' and tbstudi.tahunajaran = '$tahunajaran' AND tbstudi.kodematkul = '$kodematkul'
        ORDER BY tblognilai.date DESC");
        // dump($query);
        return $query;
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function gettahunlulus()
    {
        $query = rst2Array("SELECT
        tbwisuda.kode, tbwisuda.nama, tbwisuda.tahun
        FROM tbwisuda
        JOIN tbmhs_wisuda on tbmhs_wisuda.kode_wisuda = tbwisuda.kode
        GROUP BY tbwisuda.tahun DESC");
        return $query;
    }
    public function getdataalumnibytahun($kodewisuda)
    {
        $query = rst2Array("SELECT tbmhs_wisuda.nim, tbmahasiswa.namalengkap, tbmahasiswa.reguler
        FROM tbmhs_wisuda
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbmhs_wisuda.nim
        WHERE tbmhs_wisuda.kode_wisuda = '$kodewisuda'
        ORDER BY tbmahasiswa.nim ASC");
        return $query;
    }
    public function skpibiodata($nim)
    {
        $query = rst2Array("SELECT tbmahasiswa.namalengkap, tbmahasiswa.angkatan, tbmahasiswa.lahirmahasiswa, tbmahasiswa.tgllahirmahasiswa, tbwisuda.tahun, tbmahasiswa.nim, tbmahasiswa.kti, tbmhs_no_surat.no_skpi, tbmhs_no_surat.no_ijazah, tbwisuda.date, tbkti.judul
        from tbmahasiswa
        LEFT JOIN tbkti on tbkti.nim_rel = tbmahasiswa.nim
        LEFT JOIN tbmhs_wisuda on tbmhs_wisuda.nim = tbmahasiswa.nim
        LEFT JOIN tbwisuda on tbwisuda.kode = tbmhs_wisuda.kode_wisuda
        LEFT JOIN tbmhs_no_surat on tbmhs_no_surat.nim =  tbmahasiswa.nim
        WHERE tbmahasiswa.nim = '$nim'");
        return $query;
    }
    public function skpiprestasi($nim)
    {
        $query = rst2Array("SELECT *
        FROM tbsertifikasi
        WHERE tbsertifikasi.nim = '$nim' and (tbsertifikasi.jenis != 'PKL' and tbsertifikasi.jenis != 'ORGANISASI')
        ORDER BY tbsertifikasi.mulai, tbsertifikasi.selesai ASC");
        return $query;
    }
    public function skpiorganisasi($nim)
    {
        $query = rst2Array("SELECT *
        FROM tbsertifikasi
        WHERE tbsertifikasi.nim = '$nim' and (tbsertifikasi.jenis = 'organisasi')
        ORDER BY tbsertifikasi.mulai, tbsertifikasi.selesai ASC");
        return $query;
    }
    public function skpipkl($nim)
    {
        $query = rst2Array("SELECT *
        FROM tbsertifikasi
        WHERE tbsertifikasi.nim = '$nim' and (tbsertifikasi.jenis = 'PKL')
        ORDER BY tbsertifikasi.mulai, tbsertifikasi.selesai ASC");
        return $query;
    }

    public function get_kti($nim)
    {
        $query = rst2Array("SELECT *, tb_kti.judul as kti
        FROM tb_kti
        WHERE tb_kti.rel_nim = '$nim'");
        return $query;
    }

    public function check_yudisium_active()
    {
        $query = rst2Array("SELECT *
        FROM tb_yudisium
        ORDER BY tb_yudisium.id DESC
        limit 1");
        return $query;
    }

    public function check_wisuda_active()
    {
        $query = rst2Array("SELECT *
        FROM tbwisuda
        where tbwisuda.status = 'open'
        ORDER BY tbwisuda.id DESC
        limit 1");
        return $query;
    }
    public function get_list_pendaftar_yudisium($kode)
    {
        $query = rst2Array("SELECT tb_peserta_yudisium.id, tb_peserta_yudisium.nim, tbmahasiswa.namalengkap, tb_peserta_yudisium.created_at, tb_peserta_yudisium.acc_at FROM tb_peserta_yudisium
            LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_peserta_yudisium.nim
        WHERE tb_peserta_yudisium.kode LIKE '$kode%'
        ");
        return $query;
    }

    public function get_laboran_waiting_list($kode,$laboran)
    {
        $query = rst2Array("SELECT DISTINCT
    tb_peserta_yudisium.id,
    tb_peserta_yudisium.nim,
    tbmahasiswa.namalengkap,
    tb_peserta_yudisium.created_at 
FROM
    tb_peserta_yudisium
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_peserta_yudisium.nim 
        LEFT OUTER JOIN (SELECT * FROM tb_bebas_lab WHERE tb_bebas_lab.jenis_lab = '$laboran') as lab ON lab.nim = tb_peserta_yudisium.nim
WHERE
    tb_peserta_yudisium.id LIKE '$kode%'  and lab.jenis_lab is NULL  
ORDER BY
    tb_peserta_yudisium.created_at ASC");
        return $query;
    }

    public function get_laboran_approved_list($kode,$laboran)
    {
        $query = rst2Array("SELECT tb_peserta_yudisium.id, tb_peserta_yudisium.nim, tbmahasiswa.namalengkap, tb_bebas_lab.jenis_lab, tb_peserta_yudisium.created_at, tbstaff.nama, tb_bebas_lab.approve_at as approve, tb_bebas_lab.id as lab_id, tb_bebas_lab.status, tb_bebas_lab.catatan
        FROM tb_peserta_yudisium
        LEFT JOIN tb_bebas_lab on tb_bebas_lab.nim = tb_peserta_yudisium.nim
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_peserta_yudisium.nim
        LEFT JOIN tbstaff on tbstaff.nidn = tb_bebas_lab.approve_by
        WHERE tb_peserta_yudisium.id like '$kode%' AND tb_bebas_lab.jenis_lab = '$laboran'
        ORDER BY tb_peserta_yudisium.created_at ASC");
        return $query;
    }

    public function get_spp_yudisium_list($kode)
    {
        $query = rst2Array("SELECT tb_peserta_yudisium.id, tb_peserta_yudisium.kode, tb_peserta_yudisium.nim, tbmahasiswa.namalengkap, tb_pembayaran_yudisium.`status`, tb_peserta_yudisium.created_at
        FROM tb_peserta_yudisium
        LEFT JOIN tb_pembayaran_yudisium on tb_peserta_yudisium.nim = tb_pembayaran_yudisium.nim
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_peserta_yudisium.nim
        WHERE tb_pembayaran_yudisium.`status` is NULL and tb_peserta_yudisium.id like '$kode%'
        ORDER BY tb_pembayaran_yudisium.`status`, tb_peserta_yudisium.created_at ASC
        ");
        return $query;
    }

    public function get_spp_yudisium_list_allow($kode)
    {
        $query = rst2Array("SELECT tb_peserta_yudisium.id, tb_peserta_yudisium.nim, tbmahasiswa.namalengkap, tb_pembayaran_yudisium.`status`, tb_peserta_yudisium.created_at
        FROM tb_peserta_yudisium
        LEFT JOIN tb_pembayaran_yudisium on tb_peserta_yudisium.nim = tb_pembayaran_yudisium.nim
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_peserta_yudisium.nim
        WHERE tb_pembayaran_yudisium.`status` is not NULL and tb_peserta_yudisium.id like '$kode%'
        ORDER BY tb_pembayaran_yudisium.`status`, tb_peserta_yudisium.created_at ASC
        ");
        return $query;
    }
    public function get_waiting_pendaftar_yudisium($kode)
    {
        $query = rst2Array("SELECT tb_peserta_yudisium.id, tb_peserta_yudisium.nim, tbmahasiswa.namalengkap, tb_peserta_yudisium.bukti_perpus, tb_peserta_yudisium.bukti_lab, tb_yudisium.kode,
        tb_peserta_yudisium.acc_bukti_perpus, tb_peserta_yudisium.acc_bukti_lab
        FROM tb_peserta_yudisium
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_peserta_yudisium.nim
        LEFT JOIN tb_yudisium on concat(tb_yudisium.kode, tb_yudisium.gelombang)  = tb_peserta_yudisium.kode
        where tb_peserta_yudisium.kode like '$kode%' and (tb_peserta_yudisium.bukti_lab is not NULL or tb_peserta_yudisium.bukti_perpus is not NULL) and (tb_peserta_yudisium.acc_bukti_lab = 'deny'  or tb_peserta_yudisium.acc_bukti_perpus = 'deny')
        ORDER BY tb_peserta_yudisium.id asc
        ");
        return $query;
    }
    public function get_data_yudisium()
    {
        $query = rst2Array("SELECT
        tb_yudisium.id,
        tb_yudisium.kode,
        tb_yudisium.gelombang,
        tb_yudisium.tahun_ajaran,
        tb_yudisium.`status`,
        lab.waiting_list_lab,
        perpus.waiting_list_perpus
        FROM
        tb_yudisium
        left JOIN (
        SELECT
        tb_peserta_yudisium.kode,
        SUM( CASE WHEN tb_peserta_yudisium.bukti_lab IS NULL THEN 1 ELSE 0 END ) AS waiting_list_lab
        FROM
        tb_peserta_yudisium
        GROUP BY
        tb_peserta_yudisium.kode) AS lab ON CONCAT( tb_yudisium.kode, tb_yudisium.gelombang ) = lab.kode
        left JOIN (
        SELECT
        tb_peserta_yudisium.kode,
        SUM( CASE WHEN tb_peserta_yudisium.bukti_perpus IS NULL THEN 1 ELSE 0 END ) AS waiting_list_perpus
        FROM
        tb_peserta_yudisium
        GROUP BY
        tb_peserta_yudisium.kode
    ) AS perpus ON CONCAT( tb_yudisium.kode, tb_yudisium.gelombang ) = perpus.kode
    ORDER BY    tb_yudisium.kode DESC");
        return $query;
    }
    public function yudisium_permit($data, $kode)
    {
        $this->db->where('kode', $kode);
        $this->db->update('tb_yudisium', $data);
        return true;
    }
    public function acc_yudisium($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_peserta_yudisium', $data);
        return true;
    }
    public function acc_wisuda($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_peserta_wisuda', $data);
        return true;
    }
    public function get_data_wisuda()
    {
        $query = rst2Array("SELECT * FROM tbwisuda ORDER BY id DESC");
        return $query;
    }
    public function get_data_wisudawan($id)
    {
        $query = rst2Array("SELECT tb_peserta_wisuda.id, tb_peserta_wisuda.wisuda_rel, tb_peserta_wisuda.nim, tbmahasiswa.namalengkap, tb_kti.picture, ijazah.id as id_ijazah, transkrip.id as id_transkrip, berkas.id as id_berkas, berkas.nama_file, skpi.total as total_skpi, tb_peserta_wisuda.approved
        FROM tb_peserta_wisuda
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_peserta_wisuda.nim
        LEFT JOIN tb_kti on tb_kti.rel_nim = tb_peserta_wisuda.nim
        LEFT JOIN (SELECT * FROM tb_approval WHERE tb_approval.jenis = 'ijazah') as ijazah on ijazah.nim = tb_peserta_wisuda.nim
        LEFT JOIN (SELECT * FROM tb_approval WHERE tb_approval.jenis = 'transkrip') as transkrip on transkrip.nim = tb_peserta_wisuda.nim
        LEFT JOIN (SELECT * FROM tb_document WHERE tb_document.jenis = 'berkas_yudisium' ) as berkas on berkas.nim = tb_peserta_wisuda.nim
        LEFT JOIN (SELECT *, COUNT(nim) as total FROM tbsertifikasi GROUP BY nim) as skpi on skpi.nim = tb_peserta_wisuda.nim
        WHERE tb_peserta_wisuda.wisuda_rel = '$id'
        ORDER BY tb_peserta_wisuda.nim ASC");
        return $query;
    }
    public function add_notif()
    {
        date_default_timezone_set('Asia/Jakarta');
        // $code =  $this->input->post('nidn');
        // dump($ekstensi);
        //$nmfile = "file_".time();
        //$tmpFile = "file_".time();
        $code = $this->get_rand_id();
        $data = array(
            // 'id' => $code,
            'id'        => $code,
            'nim'       => $this->input->post('nim'),
            'isi'       => $this->input->post('isi'),
            'create_at' => date("Y-m-d H-i-s"),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_notif', $data);
    }
    public function ekd_add()
    {
        date_default_timezone_set('Asia/Jakarta');
        $default = '1';
        $data    = array(
            // 'id' => $code,
            'kode_ekd'        => $this->input->post('kode_ekd'),
            'rel_tahunajaran' => $this->input->post('rel_tahunajaran'),
            'status'          => $default,
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_ekd', $data);
    }

    public function ekd_add_dosen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $code = $this->get_rand_id();
        $data = array(
            'id'           => $code,
            'rel_nidn'     => $this->input->post('rel_nidn'),
            'rel_matkul'   => $this->input->post('rel_matkul'),
            'rel_kode_ekd' => $this->input->post('rel_kode_ekd'),
            'rel_kelas'    => $this->input->post('rel_kelas'),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_dosen_ekd', $data);
    }

    public function get_data_ekd()
    {
        $query = rst2Array("SELECT tb_ekd.kode_ekd, tb_ekd.rel_tahunajaran, tbpembayaran.semester, tbpembayaran.tahunajaran, tb_ekd.`status`
        FROM tb_ekd
        LEFT JOIN tbpembayaran on tbpembayaran.kode =  tb_ekd.rel_tahunajaran
        ORDER BY tb_ekd.id DESC");
        return $query;
    }

    public function get_soal_ekd()
    {
        $query = rst2Array("SELECT *
        FROM tb_soal_ekd
        ORDER BY type ASC");
        return $query;
    }

    public function get_matkul_ekd($kode)
    {
        $query = rst2Array("SELECT tbmatakuliah.kode, tbmatakuliah.nama, tbmatakuliah.semester, tbmatakuliah.sks, tbstudi.tahunajaran, tb_ekd.kode_ekd
        FROM tbmatakuliah
        JOIN tbstudi on tbstudi.kodematkul = tbmatakuliah.kode
        JOIN tb_ekd on tb_ekd.rel_tahunajaran = tbstudi.tahunajaran
        WHERE tb_ekd.kode_ekd = '$kode'
        GROUP BY tbmatakuliah.kode
        ORDER BY tbmatakuliah.kode, tbmatakuliah.nama ASC");
        return $query;
    }

    public function get_kelas_ekd($kode_ekd, $kodematkul)
    {
        $query = rst2Array("SELECT tbkelas.kelas, tbstudi.kodematkul, tbmatakuliah.nama, tb_ekd.kode_ekd
        FROM tbstudi
        JOIN tbkelas on tbkelas.nim = tbstudi.nim
        JOIN tb_ekd on tb_ekd.rel_tahunajaran = tbstudi.tahunajaran
        LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
        WHERE tbstudi.kodematkul = '$kodematkul' and tb_ekd.kode_ekd = '$kode_ekd'
        GROUP BY tbkelas.kelas
        ORDER BY tbkelas.kelas ASC");
        return $query;
    }

    public function get_dosen_by_kelas_ekd($kode_ekd, $kodematkul, $kelas)
    {
        $query = rst2Array("SELECT tb_dosen_ekd.id, tb_dosen_ekd.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang
        FROM tb_dosen_ekd
        LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_ekd.rel_nidn
        WHERE tb_dosen_ekd.rel_matkul = '$kodematkul' AND tb_dosen_ekd.rel_kode_ekd = '$kode_ekd' AND tb_dosen_ekd.rel_kelas = '$kelas'
        ORDER BY tbdosen.nama ASC ");
        return $query;
    }

    public function ekd_soal_add()
    {
        date_default_timezone_set('Asia/Jakarta');
        $code = $this->get_rand_id();
        $data = array(
            // 'id' => $code,
            'id'   => $code,
            'soal' => $this->input->post('soal'),
            'type' => $this->input->post('type'),
        );
        // dump($data);
        $res_insert = $this->db->insert('tb_soal_ekd', $data);
    }

    public function ekd_selected($kode_ekd)
    {
        $query = rst2Array("
            SELECT tb_ekd.kode_ekd, tbpembayaran.kode, tbpembayaran.tahunajaran, tbpembayaran.semester
            FROM tb_ekd
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tb_ekd.rel_tahunajaran
            WHERE tb_ekd.kode_ekd = 'EKD$kode_ekd'");
        return $query;
    }

    public function ekd_dosen_selected($kode_ekd, $nidn)
    {
        $query = rst2Array("
            SELECT DISTINCT tb_ekd.kode_ekd, tbdosen.nama, tbdosen.gelarbelakang, tbpembayaran.kode, tbpembayaran.tahunajaran, tbpembayaran.semester
            FROM tb_ekd
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tb_ekd.rel_tahunajaran
                        LEFT JOIN tb_dosen_ekd on tb_dosen_ekd.rel_kode_ekd = tb_ekd.kode_ekd
                        LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_ekd.rel_nidn
            WHERE tb_ekd.kode_ekd = 'EKD$kode_ekd' AND tbdosen.nidn = '$nidn'");
        return $query;
    }

    public function get_hasil_dosen_ekd($kode_ekd)
    {
        $query = rst2Array("
            SELECT tb_dosen_ekd.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_dosen_ekd.rel_kode_ekd, tb_ekd.rel_tahunajaran
            FROM tb_dosen_ekd
            LEFT JOIN tbdosen ON tbdosen.nidn = tb_dosen_ekd.rel_nidn
            LEFT JOIN tb_ekd ON tb_ekd.kode_ekd = tb_dosen_ekd.rel_kode_ekd
            WHERE tb_dosen_ekd.rel_kode_ekd = 'EKD$kode_ekd' 
            GROUP BY tb_dosen_ekd.rel_nidn");
        return $query;
    }

    public function get_hasil_ekd_by_matkul_dosen($kode_ekd, $nidn)
    {
        $query = rst2Array("
            SELECT DISTINCT tb_dosen_ekd.rel_nidn, tbstudi.kodematkul, tbmatakuliah.nama, tbstudi.tahunajaran, COUNT(DISTINCT tbstudi.nim) as responden, responden.hasil
            FROM tbmahasiswa 
            LEFT JOIN tbkelas on tbkelas.nim = tbmahasiswa.nim
            LEFT JOIN tbstudi on tbstudi.nim = tbstudi.nim
            LEFT JOIN tb_dosen_ekd on tb_dosen_ekd.rel_kelas = tbkelas.kelas AND tb_dosen_ekd.rel_matkul = tbstudi.kodematkul
            LEFT JOIN (SELECT DISTINCT tb_responden_ekd.rel_matkul, COUNT(DISTINCT tb_responden_ekd.rel_nim) as hasil
            FROM tb_responden_ekd
            WHERE tb_responden_ekd.rel_nidn = '$nidn' AND tb_responden_ekd.rel_kode_ekd = 'EKD$kode_ekd'
            GROUP BY tb_responden_ekd.rel_matkul) as responden on responden.rel_matkul = tbstudi.kodematkul 
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            WHERE tb_dosen_ekd.rel_nidn = '$nidn' AND tb_dosen_ekd.rel_kode_ekd = 'EKD$kode_ekd' AND tbstudi.tahunajaran = '$kode_ekd' AND tbkelas.nim = tbstudi.nim 
            GROUP BY tbstudi.kodematkul
");
        return $query;
    }

    public function get_detil_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul)
    {
        $query = rst2Array("
            SELECT DISTINCT tb_dosen_ekd.rel_nidn, tbdosen.nama, tbdosen.gelarbelakang, tbpembayaran.semester, tbpembayaran.tahunajaran as ta, tbstudi.kodematkul, tbmatakuliah.nama as matkul, tbstudi.tahunajaran, COUNT(DISTINCT tbstudi.nim) as responden, responden.hasil
            FROM tbmahasiswa 
            LEFT JOIN tbkelas on tbkelas.nim = tbmahasiswa.nim
            LEFT JOIN tbstudi on tbstudi.nim = tbstudi.nim
            LEFT JOIN tb_dosen_ekd on tb_dosen_ekd.rel_kelas = tbkelas.kelas AND tb_dosen_ekd.rel_matkul = tbstudi.kodematkul
            LEFT JOIN (SELECT DISTINCT tb_responden_ekd.rel_matkul, COUNT(DISTINCT tb_responden_ekd.rel_nim) as hasil
            FROM tb_responden_ekd
            WHERE tb_responden_ekd.rel_nidn = '$nidn' AND tb_responden_ekd.rel_kode_ekd = 'EKD$kode_ekd' AND tb_responden_ekd.rel_matkul = '$kodematkul'
            GROUP BY tb_responden_ekd.rel_matkul) as responden on responden.rel_matkul = tbstudi.kodematkul 
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_ekd.rel_nidn
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tb_dosen_ekd.rel_nidn = '$nidn' AND tb_dosen_ekd.rel_kode_ekd = 'EKD$kode_ekd' AND tbstudi.tahunajaran = '$kode_ekd' AND tbkelas.nim = tbstudi.nim AND tbstudi.kodematkul = '$kodematkul'
            GROUP BY tbstudi.kodematkul
            ");
        return $query;
    }

    public function get_nilai_ekd_by_matkul_dosen($kode_ekd, $nidn, $kodematkul)
    {
        $query = rst2Array("
            SELECT tb_soal_ekd.id, tb_soal_ekd.klasifikasi, tb_soal_ekd.soal, tb_soal_ekd.`order`, AVG(tb_responden_ekd.bobot) as rata_nilai
            FROM tb_responden_ekd
            LEFT JOIN tb_soal_ekd on tb_soal_ekd.id = tb_responden_ekd.rel_soal
            WHERE tb_responden_ekd.rel_nidn = '$nidn' AND tb_responden_ekd.rel_kode_ekd = 'EKD$kode_ekd' AND tb_responden_ekd.rel_matkul = '$kodematkul'
            GROUP BY tb_responden_ekd.rel_soal
            ORDER BY tb_soal_ekd.`order` ASC
            ");
        return $query;
    }

}