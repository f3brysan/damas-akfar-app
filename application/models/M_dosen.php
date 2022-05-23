<?php
class M_dosen extends CI_Model
{
// CRUD Data Mata Kuliah
    public function getallmatkul()
    {
        $query = rst2Array("SELECT tbmatakuliah.nidn, tbmatakuliah.id, tbmatakuliah.kode, tbmatakuliah.nama, sks, semester, tbdosen.nama as dosen,
            tbdosen.gelardepan as depan, tbdosen.gelarbelakang as belakang
            FROM tbmatakuliah
            LEFT JOIN tbdosen
            on tbmatakuliah.nidn = tbdosen.nidn");
        return $query;
    }
    public function addmatkul()
    {
        $data = array(
            'kode'     => $this->input->post('kode'),
            'nama'     => $this->input->post('nama'),
            'sks'      => $this->input->post('sks'),
            'semester' => $this->input->post('semester'),
            'nidn'     => $this->input->post('nidn'),
        );
        $res_insert = $this->db->insert('tbmatakuliah', $data);
    }
    public function getselectedmatkul($kode)
    {
        $query = rst2Array("SELECT tbmatakuliah.nidn, tbmatakuliah.id, tbmatakuliah.kode, tbmatakuliah.nama, sks, semester, tbdosen.nama as dosen,
            tbdosen.gelardepan as depan, tbdosen.gelarbelakang as belakang
            FROM tbmatakuliah
            LEFT JOIN tbdosen
            on tbmatakuliah.nidn = tbdosen.nidn
            where tbmatakuliah.id = '$kode'");
        return $query;
    }
    public function updatematkul($kode)
    {
        $data = array(
            'kode'     => $this->input->post('kode'),
            'nama'     => $this->input->post('nama'),
            'sks'      => $this->input->post('sks'),
            'semester' => $this->input->post('semester'),
            'nidn'     => $this->input->post('nidn'),
        );
        $res_insert = $this->db->update('tbmatakuliah', $data, array('id' => $kode));
    }
    public function getotherdosenmatkul($nidn)
    {
        $query = rst2Array("SELECT tbdosen.nidn, tbdosen.gelardepan as depan, tbdosen.nama, tbdosen.gelarbelakang as belakang
            FROM tbdosen
            WHERE NOT EXISTS (
            SELECT *
            FROM tbmatakuliah
            WHERE tbdosen.nidn = '$nidn'
        )");
        return $query;
    }
// CRUD Data Dosen
    public function getalldosen()
    {
        $query = rst2Array("SELECT id,nidn, nama, gelardepan, gelarbelakang, tempatlahir, tanggallahir, nip
            FROM tbdosen ORDER BY nama ASC");
        return $query;
    }
    public function getselecteddosen($nidn)
    {
        $query = rst2Array("SELECT tbdosen.id, tbdosen.nama, tbdosen.nidn, tbdosen.nip, tbdosen.tanggallahir, tbdosen.tempatlahir, tbdosen.jeniskelamin, tbkelamin.nama as kelamin, tbdosen.agama, tbagama.nama as agamavalue, tbdosen.gelardepan, tbdosen.gelarbelakang, tbdosen.foto
            FROM tbdosen
            LEFT JOIN tbkelamin
            on tbdosen.jeniskelamin = tbkelamin.`value`
            LEFT JOIN tbagama
            on tbdosen.agama = tbagama.`value`
            WHERE tbdosen.nidn='$nidn'");
        return $query;
    }
    public function getdatamahasiswadosen($nidn)
    {
        $query = rst2Array("SELECT tbdosenwali.id as kode, tbmahasiswa.nim, tbmahasiswa.id, tbmahasiswa.namalengkap, tbmahasiswa.reguler, tbdosen.nidn, tbkelas.kelas, tbvalidasikrs.status as status_krs, tbvalidasikrs.tahun_ajaran
            FROM tbdosen, tbdosenwali, tbmahasiswa
            LEFT JOIN tbkelas on tbkelas.nim =  tbmahasiswa.nim
            LEFT JOIN tbvalidasikrs on tbvalidasikrs.nim = tbmahasiswa.nim
            WHERE tbdosen.nidn='$nidn' AND tbdosen.nidn=tbdosenwali.nidn AND tbdosenwali.nim=tbmahasiswa.nim ORDER BY tbmahasiswa.nim DESC");
        return $query;
    }
    public function getdatamahasiswadosen2($nidn)
    {
        $query = rst2Array("SELECT tbdosenwali.id as kode, tbmahasiswa.nim, tbmahasiswa.id, tbmahasiswa.namalengkap, tbmahasiswa.reguler, tbdosen.nidn, tbkelas.kelas, tbvalidasikrs.status as status_krs, tbvalidasikrs.tahun_ajaran
            FROM tbdosen, tbdosenwali, tbmahasiswa
            LEFT JOIN tbkelas on tbkelas.nim =  tbmahasiswa.nim
            LEFT JOIN tbvalidasikrs on tbvalidasikrs.nim = tbmahasiswa.nim
            WHERE tbdosen.nidn='$nidn' AND tbdosen.nidn=tbdosenwali.nidn AND tbdosenwali.nim=tbmahasiswa.nim AND tbvalidasikrs.status = 0 ORDER BY tbmahasiswa.nim ASC");
        return $query;
    }
    public function getselectedmahasiswadosen($nim, $nidn)
    {
        $query = rst2Array("SELECT DISTINCT tbmahasiswa.nim, tbmahasiswa.id, tbmahasiswa.namalengkap, tbmahasiswa.reguler, tbdosen.nidn
            FROM tbdosen, tbmahasiswa
            WHERE tbmahasiswa.nim='$nim' and tbdosen.nidn='$nidn'");
        return $query;
    }
    public function getotherdatamahasiswa()
    {
        $query = rst2Array("SELECT DISTINCT tbmahasiswa.nim, tbmahasiswa.namalengkap, tbmahasiswa.reguler
            FROM tbmahasiswa
            WHERE tbmahasiswa.nim is not null AND NOT EXISTS (
            SELECT * FROM tbdosenwali WHERE tbmahasiswa.nim=tbdosenwali.nim) ORDER BY tbmahasiswa.nim ASC ");
        return $query;
    }
    public function adddatadosen()
    {
        $data = array(
            'nidn'          => $this->input->post('nidn'),
            'nama'          => $this->input->post('nama'),
            'nip'           => $this->input->post('nip'),
            'tanggallahir'  => $this->input->post('tanggallahir'),
            'tempatlahir'   => $this->input->post('tempatlahir'),
            'gelardepan'    => $this->input->post('gelardepan'),
            'gelarbelakang' => $this->input->post('gelarbelakang'),
            'jeniskelamin'  => $this->input->post('jeniskelamin'),
            'agama'         => $this->input->post('agama'),
        );
        $res_insert = $this->db->insert('tbdosen', $data);
    }
    public function updatedatadosen($nidn)
    {
        $data = array(
            'nidn'         => $this->input->post('nidn'),
            'nama'         => $this->input->post('nama'),
            'nip'          => $this->input->post('nip'),
            'tanggallahir' => $this->input->post('tanggallahir'),
            'tempatlahir'  => $this->input->post('tempatlahir'),
            'jeniskelamin' => $this->input->post('jeniskelamin'),
            'agama'        => $this->input->post('agama'),
        );
//dump($data);
        $res_insert = $this->db->update('tbdosen', $data, array('nidn' => $nidn));
    }
    public function inputdatamahasiswawali($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

// HALAMAN DOSEN

    public function getdatalogindosen($login)
    {
        $query = rst2Array("SELECT * FROM tbdosen WHERE tbdosen.nidn = '$login'");
        return $query;
    }
    public function countdosennilai($nidn)
    {
        $query = rst2Array("SELECT COUNT(
            CASE
            when tbstudi.nilai IS NULL
            THEN NULL
            when tbstudi.nilai <= 0 then null
            else 2
            END) as done,
            COUNT(tbstudi.id) as total, tbajar.permit
            FROM tbajar
            INNER JOIN tbmatakuliah on tbmatakuliah.kode = tbajar.kode
            INNER JOIN tbdosen on tbdosen.nidn = tbajar.nidn
            INNER JOIN tbstudi on tbstudi.kodematkul = tbajar.kode
            WHERE tbdosen.nidn = '$nidn' and tbstudi.tahunajaran = tbajar.tahunajaran and tbajar.permit = '1'");
        return $query;
    }

    public function pembagi($tahunajaran, $kodematkul)
    {
        $query = rst2Array("SELECT COUNT(kode) as perdosen
            FROM tbajar
            WHERE tbajar.kode = '$kodematkul' and tbajar.tahunajaran = '$tahunajaran'");
        return $query;
    }

    public function get_data_kpm()
    {
        $query = rst2Array("SELECT tbstudi.tahunajaran as kode_semester, tbmatakuliah.nama, tbstudi.kodematkul, tbpembayaran.tahunajaran, tbpembayaran.semester
            FROM tbstudi
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbstudi.kodematkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbstudi.kodematkul = 'A606805317'
            GROUP BY tbstudi.tahunajaran
            ORDER BY tbstudi.tahunajaran DESC");
        return $query;
    }

    public function get_kode_ta_proposal_kti()
    {
        $query = rst2Array("SELECT
    tb_proposal_kti.rel_tahunajaran,
    tbpembayaran.tahunajaran,
    tbpembayaran.semester
    FROM
    tb_proposal_kti
    LEFT JOIN tbpembayaran ON tbpembayaran.kode = tb_proposal_kti.rel_tahunajaran
    GROUP BY
    tb_proposal_kti.rel_tahunajaran
    ORDER BY tbpembayaran.id DESC");
        return $query;
    }

    public function get_kode_ta_kti()
    {
        $query = rst2Array("SELECT
    tb_kti.rel_tahunajaran,
    tbpembayaran.tahunajaran,
    tbpembayaran.semester
    FROM
    tb_kti
    LEFT JOIN tbpembayaran ON tbpembayaran.kode = tb_kti.rel_tahunajaran
    WHERE tb_kti.rel_tahunajaran is not null
    GROUP BY
    tb_kti.rel_tahunajaran
    ORDER BY tbpembayaran.id DESC");
        return $query;
    }

    public function input_khs_kpm($data, $nim, $kodematkul, $tahunajaran)
    {
        $this->db->where('nim', $nim);
        $this->db->where('tahunajaran', $tahunajaran);
        $this->db->where('kodematkul', $kodematkul);
        $this->db->update('tbstudi', $data);
        return true;
    }

    public function get_data_mhs_kpm($nidn, $tahunajaran)
    {
        $query = rst2Array("SELECT nim_rel, tbmahasiswa.namalengkap, a1, a2, a3, b1, b2, b3, c1, c2, d1, d2, e1, e2, f1, f2, g1, g2, g3, tbstudi.nilai, tbstudi.tahunajaran
        FROM tb_nilai_kpm
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_nilai_kpm.nim_rel
        RIGHT JOIN tbstudi on tbstudi.nim = tb_nilai_kpm.nim_rel
        WHERE tb_nilai_kpm.nidn_rel = '$nidn' and tbstudi.tahunajaran = '$tahunajaran' and tbstudi.kodematkul = 'A606805317'
        ORDER BY nim_rel ASC");
        return $query;
    }

    public function get_nilai_kpm($nim)
    {
        $query = rst2Array("SELECT nim_rel, tbmahasiswa.namalengkap, a1, a2, a3, b1, b2, b3, c1, c2, d1, d2, e1, e2, f1, f2, g1, g2, g3, tbstudi.tahunajaran
        FROM tb_nilai_kpm
        LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_nilai_kpm.nim_rel
        LEFT JOIN tbstudi on tbstudi.nim = tb_nilai_kpm.nim_rel
        WHERE tb_nilai_kpm.nim_rel = '$nim' and tbstudi.kodematkul = 'A606805317'
        ORDER BY nim_rel ASC");
        return $query;
    }

    public function edit_nilai_kpm($nim)
    {

        $data = array(
            'a1' => $this->input->post('a1'),
            'a2' => $this->input->post('a2'),
            'a3' => $this->input->post('a3'),
            'b1' => $this->input->post('b1'),
            'b2' => $this->input->post('b2'),
            'b3' => $this->input->post('b3'),
            'c1' => $this->input->post('c1'),
            'c2' => $this->input->post('c2'),
            'd1' => $this->input->post('d1'),
            'd2' => $this->input->post('d2'),
            'e1' => $this->input->post('e1'),
            'e2' => $this->input->post('e2'),
            'f1' => $this->input->post('f1'),
            'f2' => $this->input->post('f2'),
            'g1' => $this->input->post('g1'),
            'g2' => $this->input->post('g2'),
            'g3' => $this->input->post('g3'),
        );
        // dump($data);
        $res_insert = $this->db->update('tb_nilai_kpm', $data, array('nim_rel' => $nim));
    }

    public function getdosenpjmk($nidn)
    {
        $query = rst2Array("SELECT tbajar.id, tbstudi.tahunajaran, tbmatakuliah.kode, tbmatakuliah.nama as matkul, tbdosen.nama as dosen, tbajar.reguler, tbpembayaran.semester, tbpembayaran.tahunajaran as ta, tbpembayaran.id as sort, COUNT(
            CASE
            when tbstudi.nilai IS NULL
            THEN NULL
            when tbstudi.nilai <= 0 then null
            else 2
            END) as done,
            COUNT(tbstudi.id) as total, tbajar.permit
            FROM tbajar
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tbajar.kode
            LEFT JOIN tbdosen on tbdosen.nidn = tbajar.nidn
            LEFT JOIN tbstudi on tbstudi.kodematkul = tbajar.kode
            LEFT JOIN tbpembayaran  on tbpembayaran.kode = tbstudi.tahunajaran
            WHERE tbdosen.nidn = '$nidn' and tbstudi.tahunajaran = tbajar.tahunajaran
            GROUP BY tbmatakuliah.kode ,  tbajar.reguler, tbajar.tahunajaran
            ORDER BY sort DESC, matkul, tbajar.reguler DESC
            ");
        return $query;
    }
    public function selectedmatkulbykode($tahunajaran, $kodematkul, $reguler)
    {
        $query = rst2Array("SELECT tbstudi.id, tbstudi.kodematkul, tbmatakuliah.nama, tbstudi.nim, tbstudi.tahunajaran, tbstudi.nilai, tbkelas.kelas, tbpembayaran.semester, tbpembayaran.tahunajaran as ta, tbajar.koor,
            COUNT(
            CASE
            when tbstudi.nilai IS NULL
            THEN NULL
            when tbstudi.nilai < 1 then null
            else 2
            END) as done,
            COUNT(tbstudi.id) as total
            FROM tbstudi
            LEFT JOIN tbmatakuliah on tbstudi.kodematkul = tbmatakuliah.kode
            LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbstudi.nim
            LEFT JOIN tbkelas on tbkelas.nim = tbstudi.nim
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tbstudi.tahunajaran
            LEFT JOIN tbajar on tbajar.kode = tbmatakuliah.kode
            WHERE tbstudi.tahunajaran ='$tahunajaran' and kodematkul = '$kodematkul' and tbkelas.kelas like '$reguler%' GROUP BY tbkelas.kelas");
        return $query;
    }

    public function setujuikrs($nim, $token, $tahun_ajaran)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'tanggal_disetujui' => date('Y-m-d H:i:s'),
            'status'            => 1,
            'token'             => $token,
        );
        $this->db->update('tbvalidasikrs', $data, array('nim' => $nim, 'tahun_ajaran' => $tahun_ajaran));
    }

    public function batalkankrs($nim, $tahun_ajaran)
    {
        $data = array(
            'tanggal_disetujui' => null,
            'status'            => 0,
            'token'             => null,
        );
        $this->db->update('tbvalidasikrs', $data, array('nim' => $nim, 'tahun_ajaran' => $tahun_ajaran));
    }

    public function getMhs()
    {
        $query = rst2Array("SELECT *, COUNT(nim) as total_nim FROM tbvalidasikrs WHERE `status` = 1 AND token IS NULL GROUP BY nim HAVING 1 = COUNT(nim) ");
        return $query;
    }

    public function generateUID($nim, $token)
    {
        $data = array(
            'token' => $token,
        );
        $this->db->update('tbvalidasikrs', $data, array('nim' => $nim));
    }

    public function get_data_laboran($nidn)
    {
        $query = rst2Array("SELECT *
        FROM tbstaff
        WHERE tbstaff.nidn = '$nidn'
        ");
        return $query;
    }

    public function get_data_kti_pppm_unapprove($kode)
    {
        $query = rst2Array("
            SELECT tb_peserta_yudisium.id, tb_peserta_yudisium.nim, tbmahasiswa.namalengkap, tb_peserta_yudisium.upload_kti, tb_bebas_kti.`status`, tb_peserta_yudisium.created_at
            FROM tb_peserta_yudisium
            LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_peserta_yudisium.nim
            LEFT JOIN tb_bebas_kti on tb_bebas_kti.nim = tb_peserta_yudisium.nim
            WHERE tb_peserta_yudisium.kode LIKE '$kode%' and tb_bebas_kti.`status` is NULL
        ");
        return $query;
    }

    public function get_data_kti_pppm_approve($kode)
    {
        $query = rst2Array("
            SELECT
    tb_peserta_yudisium.id, tb_peserta_yudisium.nim, tbmahasiswa.namalengkap, tb_peserta_yudisium.upload_kti, tb_bebas_kti.`status`, tb_peserta_yudisium.created_at, tb_bebas_kti.created_at as approve_at
FROM
    tb_peserta_yudisium
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_peserta_yudisium.nim
    LEFT JOIN tb_bebas_kti on tb_bebas_kti.nim = tb_peserta_yudisium.nim
WHERE
    tb_peserta_yudisium.kode LIKE '$kode%' and tb_bebas_kti.`status` is not NULL
    ORDER BY tb_peserta_yudisium.id
        ");
        return $query;
    }

    public function get_data_kti_perpus_unapprove($kode)
    {
        $query = rst2Array("
            SELECT
    tb_peserta_yudisium.id,
    tb_peserta_yudisium.nim,
    tbmahasiswa.namalengkap,
    tb_peserta_yudisium.bukti_perpus,
    tb_bebas_perpus.`status`,
    tb_peserta_yudisium.created_at
FROM
    tb_peserta_yudisium
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_peserta_yudisium.nim
    LEFT JOIN tb_bebas_perpus on tb_bebas_perpus.nim = tb_peserta_yudisium.nim
WHERE
    tb_peserta_yudisium.kode LIKE '$kode%'
    AND tb_bebas_perpus.`status` IS NULL
        ");
        return $query;
    }

    public function get_data_kti_perpus_approve($kode)
    {
        $query = rst2Array("
            SELECT
    tb_peserta_yudisium.id,
    tb_peserta_yudisium.nim,
    tbmahasiswa.namalengkap,
    tb_peserta_yudisium.bukti_perpus,
    tb_bebas_perpus.`status`,
    tb_peserta_yudisium.created_at,
    tb_bebas_perpus.created_at AS approve_at
FROM
    tb_peserta_yudisium
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_peserta_yudisium.nim
    LEFT JOIN tb_bebas_perpus ON tb_bebas_perpus.nim = tb_peserta_yudisium.nim
WHERE
    tb_peserta_yudisium.kode LIKE '$kode%'
    AND tb_bebas_perpus.`status` IS NOT NULL
ORDER BY
    tb_peserta_yudisium.id
        ");
        return $query;
    }

    public function get_data_list_ekd($nidn)
    {
        $query = rst2Array("SELECT tb_dosen_ekd.rel_matkul, tbmatakuliah.nama, tb_ekd.rel_tahunajaran, tb_dosen_ekd.rel_nidn, tbpembayaran.semester, tbpembayaran.tahunajaran
            FROM tb_dosen_ekd
            LEFT JOIN tb_ekd on tb_ekd.kode_ekd = tb_dosen_ekd.rel_kode_ekd
            LEFT JOIN tbmatakuliah on tbmatakuliah.kode = tb_dosen_ekd.rel_matkul
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tb_ekd.rel_tahunajaran
            WHERE tb_dosen_ekd.rel_nidn = '$nidn'
            GROUP BY tb_dosen_ekd.rel_matkul
            ORDER BY tbpembayaran.id DESC");
        return $query;
    }

    public function get_data_wisuda2021()
    {
        $query = rst2Array("SELECT tbmhs_no_surat.nim, tbmahasiswa.namalengkap, tbmahasiswa.lahirmahasiswa, tbmahasiswa.tgllahirmahasiswa, tbmahasiswa.wa, tbmahasiswa.alamatktp, tbmahasiswa.rtktp, tbmahasiswa.rwktp, tbmahasiswa.kecamatanktp, tbmahasiswa.kodeposktp, tbmahasiswa.email, tb_kti.kti
FROM tbmhs_no_surat
LEFT JOIN tb_kti on tb_kti.nim = tbmhs_no_surat.nim
LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tbmhs_no_surat.nim
WHERE tbmhs_no_surat.tahun = '2021'
GROUP BY tbmhs_no_surat.nim
ORDER BY tbmhs_no_surat.nim ASC");
        return $query;
    }

    public function get_waiting_validasi_proposal_kti($nidn)
    {
        $query = rst2Array("
            SELECT
            tb_validasi_proposal.id,
    tb_validasi_proposal.rel_nim,
    tbmahasiswa.namalengkap,
    tb_proposal_kti.judul,
    tb_proposal_kti.sub_judul,
    tb_validasi_proposal.qrcode_id,
    tb_proposal_kti.acc_at,
    tb_validasi_proposal.tipe,
    tb_validasi_proposal.created_at,
    tb_proposal_kti.attachment,
    tb_proposal_kti.attachment_2
FROM
    tb_validasi_proposal
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_validasi_proposal.rel_nim
    LEFT JOIN tb_proposal_kti on tb_proposal_kti.rel_nim = tb_validasi_proposal.rel_nim
WHERE
    tb_validasi_proposal.rel_nidn = '$nidn' and tb_validasi_proposal.qrcode_id is NULL AND tb_validasi_proposal.tipe like '%Proposal%'
            ");
        return $query;
    }

    public function get_all_validasi_proposal_kti($nidn)
    {
        $query = rst2Array("
            SELECT
            tb_validasi_proposal.id,
    tb_validasi_proposal.rel_nim,
    tbmahasiswa.namalengkap,
    tb_proposal_kti.judul,
    tb_proposal_kti.sub_judul,
    tb_validasi_proposal.qrcode_id,
    tb_proposal_kti.acc_at,
    tb_validasi_proposal.tipe,
    tb_validasi_proposal.created_at,
    tb_proposal_kti.attachment,
    tb_proposal_kti.attachment_2
FROM
    tb_validasi_proposal
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_validasi_proposal.rel_nim
    RIGHT JOIN tb_proposal_kti on tb_proposal_kti.rel_nim = tb_validasi_proposal.rel_nim
WHERE
    tb_validasi_proposal.rel_nidn = '$nidn' and tb_validasi_proposal.qrcode_id is not NULL AND tb_validasi_proposal.tipe like '%Proposal%'
            ");
        return $query;
    }

    public function get_waiting_validasi($nidn)
    {
        $query = rst2Array("
            SELECT
            tb_validasi_proposal.id,
    tb_validasi_proposal.rel_nim,
    tbmahasiswa.namalengkap,
    tb_kti.judul,
    tb_kti.sub_judul,
    tb_validasi_proposal.qrcode_id,
    tb_kti.acc_at,
    tb_validasi_proposal.tipe,
    tb_validasi_proposal.created_at,
    tb_kti.attachment,
    tb_kti.attachment_2
FROM
    tb_validasi_proposal
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_validasi_proposal.rel_nim
    RIGHT JOIN tb_kti on tb_kti.rel_nim = tb_validasi_proposal.rel_nim
WHERE
    tb_validasi_proposal.rel_nidn = '$nidn' and tb_validasi_proposal.qrcode_id is NULL AND tb_validasi_proposal.tipe not like '%Proposal%'
            ");
        return $query;
    }

    public function get_all_validasi($nidn)
    {
        $query = rst2Array("
            SELECT
            tb_validasi_proposal.id,
    tb_validasi_proposal.rel_nim,
    tbmahasiswa.namalengkap,
    tb_kti.judul,
    tb_kti.sub_judul,
    tb_validasi_proposal.qrcode_id,
    tb_kti.acc_at,
    tb_validasi_proposal.tipe,
    tb_validasi_proposal.created_at,
    tb_kti.attachment,
    tb_kti.attachment_2
FROM
    tb_validasi_proposal
    LEFT JOIN tbmahasiswa ON tbmahasiswa.nim = tb_validasi_proposal.rel_nim
    RIGHT JOIN tb_kti on tb_kti.rel_nim = tb_validasi_proposal.rel_nim
WHERE
    tb_validasi_proposal.rel_nidn = '$nidn' and tb_validasi_proposal.qrcode_id is not NULL AND tb_validasi_proposal.tipe not like '%Proposal%'
            ");
        return $query;
    }

    public function get_waiting_validasi_by_ta($kode_ta)
    {
        $query = rst2Array("
            SELECT tb_proposal_kti.rel_nim, tbmahasiswa.namalengkap, tb_proposal_kti.judul, tb_proposal_kti.sub_judul, tb_proposal_kti.data_created, COUNT(tb_dosen_proposal.id) as dosen, tb_proposal_kti.acc_at, tb_proposal_kti.rel_tahunajaran
            FROM tb_proposal_kti
            LEFT JOIN tb_dosen_proposal on tb_dosen_proposal.rel_nim = tb_proposal_kti.rel_nim
            LEFT join tbmahasiswa on tbmahasiswa.nim = tb_proposal_kti.rel_nim
            WHERE tb_proposal_kti.rel_tahunajaran = '$kode_ta'  and tb_proposal_kti.acc_at is null
            GROUP by tb_proposal_kti.rel_nim
            ");
        return $query;
    }

    public function get_all_validasi_by_ta($kode_ta)
    {
        $query = rst2Array("
            SELECT tb_proposal_kti.rel_nim, tbmahasiswa.namalengkap, tb_proposal_kti.judul, tb_proposal_kti.sub_judul, tb_proposal_kti.data_created, COUNT(tb_dosen_proposal.id) as dosen, tb_proposal_kti.acc_at, tb_proposal_kti.rel_tahunajaran
            FROM tb_proposal_kti
            LEFT JOIN tb_dosen_proposal on tb_dosen_proposal.rel_nim = tb_proposal_kti.rel_nim
            LEFT join tbmahasiswa on tbmahasiswa.nim = tb_proposal_kti.rel_nim
            WHERE tb_proposal_kti.rel_tahunajaran = '$kode_ta'  and tb_proposal_kti.acc_at is not null
            GROUP by tb_proposal_kti.rel_nim
            ");
        return $query;
    }

    public function get_waiting_validasi_kti_by_ta($kode_ta)
    {
        $query = rst2Array("
            SELECT tb_kti.rel_nim, tbmahasiswa.namalengkap, tb_kti.judul, tb_kti.sub_judul, tb_kti.data_created, COUNT(tb_dosen_proposal.id) as dosen, tb_kti.acc_at, tb_kti.rel_tahunajaran
            FROM tb_kti
            LEFT JOIN tb_dosen_proposal on tb_dosen_proposal.rel_nim = tb_kti.rel_nim
            LEFT join tbmahasiswa on tbmahasiswa.nim = tb_kti.rel_nim
            WHERE tb_kti.rel_tahunajaran = '$kode_ta'  and tb_kti.acc_at is null
            GROUP by tb_kti.rel_nim
            ");
        return $query;
    }

    public function get_all_validasi_kti_by_ta($kode_ta)
    {
        $query = rst2Array("
            SELECT tb_kti.rel_nim, tbmahasiswa.namalengkap, tb_kti.judul, tb_kti.sub_judul, tb_kti.data_created, COUNT(tb_dosen_proposal.id) as dosen, tb_kti.acc_at, tb_kti.rel_tahunajaran
            FROM tb_kti
            LEFT JOIN tb_dosen_proposal on tb_dosen_proposal.rel_nim = tb_kti.rel_nim
            LEFT join tbmahasiswa on tbmahasiswa.nim = tb_kti.rel_nim
            WHERE tb_kti.rel_tahunajaran = '$kode_ta'  
            GROUP by tb_kti.rel_nim
            ");
        return $query;
    }

    public function setujuikti($id, $hashkey)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'created_at' => date('Y-m-d H:i:s'),
            'qrcode_id'  => $hashkey,
        );
        // dump($data);
        $this->db->update('tb_validasi_proposal', $data, array('id' => $id));
    }

    public function tolakkti($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'created_at' => null,
            'qrcode_id'  => null,
        );
        // dump($data);
        $this->db->update('tb_validasi_proposal', $data, array('id' => $id));
    }

    public function get_detil_proposal_kti($nim)
    {
        $query = rst2Array("
            SELECT tb_proposal_kti.unique_id, tb_proposal_kti.rel_nim, tb_proposal_kti.judul, tb_proposal_kti.sub_judul, tb_proposal_kti.data_created, tb_proposal_kti.acc_at, tb_proposal_kti.attachment, tbpembayaran.semester, tbpembayaran.tahunajaran
            FROM tb_proposal_kti 
            LEFT JOIN tbpembayaran on tbpembayaran.kode = tb_proposal_kti.rel_tahunajaran
            WHERE tb_proposal_kti.rel_nim = '$nim'
            ");
        return $query;
    }

    public function get_detil_dosen_proposal_kti($nim)
    {
        $query = rst2Array("
            SELECT tb_dosen_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_dosen_proposal.jenis
            FROM tb_dosen_proposal
            LEFT JOIN tbdosen on tbdosen.nidn = tb_dosen_proposal.rel_nidn
            WHERE tb_dosen_proposal.rel_nim = '$nim'
            ");
        return $query;
    }

    public function get_detil_dosen_pengesahan_proposal_kti($nim)
    {
        $query = rst2Array("
            SELECT tb_validasi_proposal.rel_id_proposal, tb_validasi_proposal.rel_nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang, tb_validasi_proposal.tipe, tb_validasi_proposal.created_at
FROM tb_validasi_proposal
LEFT JOIN tbdosen on tbdosen.nidn = tb_validasi_proposal.rel_nidn
WHERE tb_validasi_proposal.rel_nim = '$nim'

            ");
        return $query;
    }


    // HALAMAN HASIL QRCODE

    public function get_qrcode_kti($qrcode){
        $query = rst2Array("
            SELECT DISTINCT tbmahasiswa.nim, tbmahasiswa.namalengkap, tb_dosen_proposal.jenis, tbdosen.nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang,  tb_kti.unique_id, tb_kti.judul, tb_kti.sub_judul, tb_validasi_proposal.tipe, tb_validasi_proposal.created_at, tb_validasi_proposal.qrcode_id
FROM tb_validasi_proposal
LEFT JOIN tb_kti on tb_kti.unique_id =  tb_validasi_proposal.rel_id_proposal
LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_validasi_proposal.rel_nim
LEFT JOIN tbdosen on tbdosen.nidn =  tb_validasi_proposal.rel_nidn
LEFT JOIN tb_dosen_proposal on tb_dosen_proposal.rel_nidn = tb_validasi_proposal.rel_nidn and tb_dosen_proposal.rel_nim = tb_validasi_proposal.rel_nim
WHERE tb_validasi_proposal.qrcode_id = '$qrcode' 
            ");
        return $query;
    }

    public function get_qrcode_proposal_kti($qrcode){
        $query = rst2Array("
            SELECT DISTINCT tbmahasiswa.nim, tbmahasiswa.namalengkap, tb_dosen_proposal.jenis, tbdosen.nidn, tbdosen.nama, tbdosen.gelardepan, tbdosen.gelarbelakang,  tb_proposal_kti.unique_id, tb_proposal_kti.judul, tb_proposal_kti.sub_judul, tb_validasi_proposal.tipe, tb_validasi_proposal.created_at, tb_validasi_proposal.qrcode_id
FROM tb_validasi_proposal
LEFT JOIN tb_proposal_kti on tb_proposal_kti.unique_id =  tb_validasi_proposal.rel_id_proposal
LEFT JOIN tbmahasiswa on tbmahasiswa.nim = tb_validasi_proposal.rel_nim
LEFT JOIN tbdosen on tbdosen.nidn =  tb_validasi_proposal.rel_nidn
LEFT JOIN tb_dosen_proposal on tb_dosen_proposal.rel_nidn = tb_validasi_proposal.rel_nidn and tb_dosen_proposal.rel_nim = tb_validasi_proposal.rel_nim
WHERE tb_validasi_proposal.qrcode_id = '$qrcode' 
            ");
        return $query;
    }

}
