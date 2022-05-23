<style>
div.a {
text-align: center;
}
div.b {
text-align: left;
}
div.c {
text-align: right;
}
div.d {
text-align: justify;
}
</style>

<style>
table.ttd {
  page-break-inside: avoid;
}
</style>
<style>
td.a {font-size: 12px;color: black;}
table.b {font-size: 14px;color: black;}
p.b {font-size: 14px;color: black;}
table.c {font-size: 13px;color: black;}
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card-box table-responsive">
          <table width="100%" border="0">
            <tr>
              <td width="100%" align="center"><img src="assets/images/kop_transkrip.png" alt="" width="680px""></td>
            </tr>
          </table>
          <div class="row">
            <div class="col-4 offset-4">
              <div class="col-md-4-2">
                <?php if (count($matkul) > 0): ?>
                <?php foreach ($matkul as $m): ?>
                <h4 align="center">Daftar Nilai Mahasiswa Mata Kuliah <?php echo $m['nama'] ?></h4>
                <h4 class="b" align="center"> Semester <?php echo $m['semester'] ?> Tahun Ajaran <?php echo $m['tahunajaran'] ?></h4>
                <?php endforeach?>
                <?php endif?>
              </div>
              </div><!-- end col -->
              <div class="col-md-4">
                <table>
                  <tr>
                    <td>Kelas Reguler</td>
                    <td><div align="center">:</div></td>
                    <td><?php echo $kelas; ?></td>
                  </tr>
                  <tr>
                    <td>Pengampu Mata Kuliah </td>
                    <td><div align="center">:</div></td>
                    <td>Tim Dosen </td>
                  </tr>
                </table>
              </div>
              <hr>
              <!-- end row -->
              <div class="col-md-12">
                <table border="2" bordercolor="#000000">
                  <tr>
                    <td width="20" rowspan="2"><div align="center"><strong>No</strong></div></td>
                    <td width="100" rowspan="2"><div align="center"><strong>NIM</strong></div></td>
                    <td width="200" rowspan="2"><div align="center"><strong>Nama</strong></div></td>
                    <td width="10" rowspan="2"><div align="center"><strong>Jenis Kelamin </strong></div></td>
                    <td width="100" colspan="2"><div align="center"><strong>Nilai</strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><strong>Angka</strong></div></td>
                    <td><div align="center"><strong>Huruf</strong></div></td>
                  </tr>
                  <?php if (count($get) > 0): ?>
                  <?php $no = 1;?>
                  <?php foreach ($get as $g): ?>
                  <tr>
                    <td align="right"><?php echo $no++; ?></td>
                    <td><?php echo $g['nim'] ?></td>
                    <td><?php echo $g['namalengkap'] ?></td>
                    <td align="center"><?php echo $g['kelaminmhs'] ?></td>
                    <td align="right"><?php echo $g['nilai'] ?></td>
                    <td align="center"><?php echo $g['huruf'] ?></td>
                  </tr>
                  <?php endforeach?>
                  <?php endif?>
                </table>
              </div>
              <br>
              <div class="row">
                <div class="col-4 offset-4">
                  <div class="col-md-4-2">                    
                    <table class="ttd">
                      <tr>
                        <?php $date = date('Y-m-d')?>
                        <td width="200"><div align="center">Surabaya, <?php echo tanggal($date) ?></div></td>
                        <td width="100">&nbsp;</td>
                        <td width="200"><div align="center">KAPRODI D-III Farmasi</div></td>
                      </tr>
                      <tr>
                        <td><div align="center">Dosen PJMK</div></td>
                        <td width="100">&nbsp;</td>
                        <td><div align="center">Akademi Farmasi Surabaya</div></td>
                      </tr>
                      <tr>
                        <td height="50"><div align="center"></div></td>
                        <td width="100">&nbsp;</td>
                        <td headers="50"><div align="center"></div></td>
                      </tr>
                      <tr>
                        <td><div align="center"><?php if (count($matkul) > 0): ?>
                          <?php foreach ($matkul as $m): ?>
                          <?php echo $m['dp'] ?> <?php echo $m['dosen'] ?> <?php echo $m['bk'] ?>
                          <?php endforeach?>
                        <?php endif?></div></td>
                        <td width="100">&nbsp;</td>
                        <td><div align="center">Damaranie Dipahayu, S.Farm., M.Farm.,Apt</div></td>
                      </tr>
                      <tr>
                        <td><div align="center"><?php if (count($matkul) > 0): ?>
                          <?php foreach ($matkul as $m): ?>
                          NIDN. <?php echo $m['nidn'] ?>
                          <?php endforeach?>
                        <?php endif?></div></td>
                        <td width="100">&nbsp;</td>
                        <td><div align="center">NIDN. 0703038304</div></td>
                      </tr>
                    </table>
                  </div>
                  </div><!-- end col -->
                </div>
              </div>
            </div>
            <!-- end row -->
            </div> <!-- container -->
            </div> <!-- content -->