
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="text-right">
                              <a class="btn btn-link" href="<?php echo site_url("admin");?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                          </div>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="card-box">

                                    <div class="">
                                      <h4 style="text-align:center" class="header-title m-t-0 m-b-30">Foto Mahasiswa</h4>
                                    </div>
                                    <p align="center"><img src="<?php echo base_url(); ?>uploads/foto/<?php echo $mhs->foto;  ?>" width="160" height="200"></p>
                                    <div class="text-right">
                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_foto/$mhs->id");?>"><i class="fa fa-camera"></i> Edit</a>
                                        </div>
                              </div>
                              <div class="card-box">

                                    <div class="">
                                      <h4 style="text-align:center" class="header-title m-t-0 m-b-30">Hubungi</h4>
                                    </div>
                                    <div class="text-center">

                                        <?php  $nomor = $mhs->wa;
                                         $rest = substr($nomor, 1);?>
                                            <a class="btn btn-link" href="https://wa.me/<?php echo "62".$rest ?>?text=&source=&data=#" target="_blank"><i class="fa fa-whatsapp"></i> Whatsapp</a>
                                            <a class="btn btn-link" href="<?php echo site_url("admin/cetakdetilmhs/$mhs->id") ?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                                        </div>
                              </div>

                                </div>
                                  <div class="col-md-9">
                                      <div class="card-box">
                                          <h4 class="header-title m-t-0 m-b-30">Data Mahasiswa</h4>
                                          <div class="tabs-vertical-env">
                                              <ul class="nav tabs-vertical">
                                                  <li class="nav-item">
                                                      <a href="#diri" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                          <span class="fa fa-user"></span> Data Diri
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#home" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-home"></span> Tempat Tinggal
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#kontak" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-phone"></span> Kontak
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#pendidikan" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-institution"></span> Pendidikan/Pekerjaan
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#orangtua" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-users"></span> Data Orang Tua
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#info" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-info"></span> Lain - Lain
                                                      </a>
                                                  </li>
                                              </ul>
                                              <div class="tab-content">
                                                  <div class="tab-pane active" id="diri">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_diri/$mhs->id");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                     <table class="table-sm">
                                                    <tbody>
                                         <tr>
                                             <th>NIM</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->nim ?></td>
                                         </tr>
                                         <tr>
                                             <th>Nama Lengkap</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->namalengkap ?></td>
                                         </tr>
                                         <tr>
                                             <th>Nama Panggilan</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->namapanggil ?></td>
                                         </tr>
                                         <tr>
                                             <th>Jenis Reguler</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->reguler ?></td>
                                         </tr>
                                         <tr>
                                             <th>Tahun Angkatan</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->angkatan ?></td>
                                         </tr>
                                         <tr>
                                             <th>Jenis Pendaftaran</th>
                                             <td>:</td>
                                             <td>
                                               <?php //dump($agama);
    if (is_array($jenisdaftar) && count($jenisdaftar) > 0) {
    foreach($jenisdaftar as $j): ?>
     <?php echo $j['nama']; ?>
    <?php endforeach; } else { ?>
    <?php echo "-" ?>
    <?php } ?>
                                            </td>
                                         </tr>
                                         <tr>
                                             <th>NIK</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->nik ?></td>
                                         </tr>
                                         <tr>
                                             <th>Tempat Tgl Lahir</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->lahirmahasiswa ?>, <?php echo $mhs->tgllahirmahasiswa ?></td>
                                         </tr>
                                         <tr>
                                             <th>Jenis Kelamin</th>
                                             <td>:</td>
                                             <td>
                                               <?php //dump($agama);
    if (is_array($jkl) && count($jkl) > 0) {
    foreach($jkl as $j): ?>
     <?php echo $j['nama']; ?>
    <?php endforeach; } else { ?>
    <?php echo "-" ?>
    <?php } ?>
                                            </td>
                                         </tr>
                                         <tr>
                                             <th>Agama</th>
                                             <td>:</td>
                                             <td>
                                               <?php //dump($agama);
    if (is_array($agama) && count($agama) > 0) {
    foreach($agama as $j): ?>
     <?php echo $j['nama']; ?>
    <?php endforeach; } else { ?>
    <?php echo "-" ?>
    <?php } ?>
                                            </td>
                                         </tr>
                                         <tr>
                                             <th>Kewarganegaraan</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->warganegara ?></td>
                                         </tr>
                                         <tr>
                                           <tr>
                                               <th>Usia</th>
                                               <td>:</td>
                                               <td><?php
                                               $today = new DateTime('today');
                                               $tanggal = new DateTime($mhs->tgllahirmahasiswa);
                                                $y = $today->diff($tanggal)->y; ?> <?php echo $y ?> Tahun</td>
                                           </tr>
                                             <th>Jumlah Saudara</th>
                                             <td>:</td>
                                             <td><?php echo $mhs->saudara ?></td>
                                         </tr>
                                       </table>
                                     </tbody>


                                                  </div>
                                                  <div class="tab-pane" id="home">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_tempat_tinggal/$mhs->id");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                    <p class="center">Alamat Sesuai KTP</p>
                                                    <table class="table-sm">
                                                      <tr>
                                                          <th>Nama Jalan</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->alamatktp ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>RT/RW</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->rtktp ?>/<?php echo $mhs->rwktp ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Kelurahan/Kecamatan</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->kelurahanktp ?>/<?php echo $mhs->kecamatanktp ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Kodepos</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->kodeposktp ?></td>
                                                      </tr>
                                                    </table>
                                                    <br>
                                                    <table class="table-sm">
                                                      <p> Alamat Domisili</p>
                                                      <tr>
                                                          <th>Alamat (Nama Jalan)</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->alamatdom ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>RT/RW</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->rtdom ?>/<?php echo $mhs->rwdom ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Kelurahan/Kecamatan</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->kelurahandom ?>/<?php echo $mhs->kecamatandom ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Kodepos</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->kodeposdom ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Jenis Tempat Tinggal</th>
                                                          <td>:</td>
                                                          <td>
                                                            <?php //dump($agama);
                 if (is_array($tinggal) && count($tinggal) > 0) {
                 foreach($tinggal as $j): ?>
                  <?php echo $j['nama']; ?>
                 <?php endforeach; } else { ?>
                 <?php echo "-" ?>
                 <?php } ?>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                          <th>Transportasi</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->transportasi ?></td>
                                                      </tr>
                                                    </table>
                                                  </div>
                                                  <div class="tab-pane" id="kontak">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_kontak/$mhs->id");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                    <table class="table-sm">
                                                      <tr>
                                                          <th>Email</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->email ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>No Handphone</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->hp ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>No Whatsapp</th>
                                                          <td>:</td>
                                                          <td><?php echo $mhs->wa ?></td>
                                                      </tr>
                                                    </table>
                                                  </div>

                                                  <div class="tab-pane" id="pendidikan">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_pendidikan/$mhs->id");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                    <p>Pendidikan Terakhir</p>
                                                      <table class="table-sm">
                                                        <tr>
                                                            <th>NISN</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->nisn ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Sekolah/Institusi</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->sekolah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tahun Lulus</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->lulus ?></td>
                                                        </tr>
                                                      </table>
                                                      <br>
                                                      <p>Pekerjaan</p>
                                                      <table class="table-sm">
                                                        <tr>
                                                            <th>Jenis Profesi</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->profesimhs ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Perusahaan</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->tempatkerjamhs ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat Kerja</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->alamatkerjamhs ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Surat Keterangan Kerja</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->skkerja ?></td>
                                                        </tr>
                                                      </table>
                                                  </div>

                                                  <div class="tab-pane" id="orangtua">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_wali/$mhs->id");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                    <p>Data Ayah</p>
                                                      <table class="table-sm">
                                                        <tr>
                                                            <th>NIK Ayah</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->nikayah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Ayah</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->namaayah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tempat, Tanggal Lahir</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->tempatayah ?>, <?php echo $mhs->tglayah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Agama</th>
                                                            <td>:</td>
                                                            <td>
                                                              <?php //dump($didikwali);
                   if (is_array($aayah) && count($aayah) > 0) {
                   foreach($aayah as $a): ?>
                    <?php echo $a['nama']; ?>
                   <?php endforeach; } else { ?>
                   <?php echo "-" ?>
                   <?php } ?>
                                                           </td>
                                                            <tr>
                                                                <th>Pendidikan Terakhir</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($didikayah) && count($didikayah) > 0) {
                       foreach($didikayah as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Profesi</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($kayah) && count($kayah) > 0) {
                       foreach($kayah as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Penghasilan</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($payah) && count($payah) > 0) {
                       foreach($payah as $p): ?>
                        <?php echo $p['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status</th>
                                                                <td>:</td>
                                                                <td><?php echo $mhs->statusayah ?></td>
                                                            </tr>
                                                        </tr>
                                                      </table>
                                                      <br>
                                                      <p>Data Ibu</p>
                                                      <table class="table-sm">
                                                        <tr>
                                                            <th>NIK Ibu</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->nikibu ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Ibu</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->namaibu ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tempat, Tanggal Lahir</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->tempatibu ?>, <?php echo $mhs->tglibu ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Agama</th>
                                                            <td>:</td>
                                                            <td>
                                                              <?php //dump($didikwali);
                   if (is_array($aibu) && count($aibu) > 0) {
                   foreach($aibu as $a): ?>
                    <?php echo $a['nama']; ?>
                   <?php endforeach; } else { ?>
                   <?php echo "-" ?>
                   <?php } ?>
                                                           </td>
                                                            <tr>
                                                                <th>Pendidikan Terakhir</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($didikibu) && count($didikibu) > 0) {
                       foreach($didikibu as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Profesi</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($kibu) && count($kibu) > 0) {
                       foreach($kibu as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Penghasilan</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($pibu) && count($pibu) > 0) {
                       foreach($pibu as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status</th>
                                                                <td>:</td>
                                                                <td><?php echo $mhs->statusibu ?></td>
                                                            </tr>
                                                      </table>
                                                      <br>
                                                      <p>Data Wali</p>
                                                      <table class="table-sm">
                                                        <tr>
                                                            <th>Nama Wali</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->namawali ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tempat, Tanggal Lahir</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->tempatwali ?>, <?php echo $mhs->tglwali ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Agama</th>
                                                            <td>:</td>
                                                            <td>
                                                              <?php //dump($didikwali);
                   if (is_array($awali) && count($awali) > 0) {
                   foreach($awali as $j): ?>
                    <?php echo $j['nama']; ?>
                   <?php endforeach; } else { ?>
                   <?php echo "-" ?>
                   <?php } ?>
                                                           </td>
                                                            <tr>
                                                                <th>Pendidikan Terakhir</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($didikwali);
                       if (is_array($didikwali) && count($didikwali) > 0) {
                       foreach($didikwali as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Profesi</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($kwali) && count($kwali) > 0) {
                       foreach($kwali as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Penghasilan</th>
                                                                <td>:</td>
                                                                <td>
                                                                  <?php //dump($agama);
                       if (is_array($pwali) && count($pwali) > 0) {
                       foreach($pwali as $j): ?>
                        <?php echo $j['nama']; ?>
                       <?php endforeach; } else { ?>
                       <?php echo "-" ?>
                       <?php } ?>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Status</th>
                                                                <td>:</td>
                                                                <td><?php echo $mhs->statuswali ?></td>
                                                            </tr>
                                                        </tr>
                                                      </table>
                                                  </div>
                                                  <div class="tab-pane" id="info">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_info/$mhs->id");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                    <p>Rencana Setelah Pendidikan</p>
                                                      <table class="table-sm">
                                                        <tr>
                                                            <th>Bekerja</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->rencanamhs ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Tempat Bekerja</th>
                                                            <td>:</td>
                                                            <td><?php echo $mhs->tempatrencana ?></td>
                                                        </tr>
                                                      </table>
                                                      <br>
                                                      <p>Informasi Kesehatan</p>
                                                        <table class="table-sm">
                                                          <tr>
                                                              <th>Gol. Darah</th>
                                                              <td>:</td>
                                                              <td><?php echo $mhs->darah ?></td>
                                                          </tr>
                                                          <tr>
                                                              <th>Surat Sehat</th>
                                                              <td>:</td>
                                                              <td><?php echo $mhs->sksehat ?></td>
                                                          </tr>
                                                          <tr>
                                                              <th>Riwayat Penyakit</th>
                                                              <td>:</td>
                                                              <td><?php echo $mhs->penyakit ?></td>
                                                          </tr>
                                                          <tr>
                                                              <th>Tinggi/Berat</th>
                                                              <td>:</td>
                                                              <td><?php echo $mhs->tinggi ?> / <?php echo $mhs->berat ?></td>
                                                          </tr>
                                                        </table>
                                                        <br>
                                                        <p>Kegemaran</p>
                                                          <table class="table-sm">
                                                            <tr>
                                                                <th>Olahraga</th>
                                                                <td>:</td>
                                                                <td><?php echo $mhs->olahraga ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kesenian</th>
                                                                <td>:</td>
                                                                <td><?php echo $mhs->kesenian ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Organisasi</th>
                                                                <td>:</td>
                                                                <td><?php echo $mhs->organisasi ?></td>
                                                            </tr>
                                                          </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                   <!-- end col -->








                        </div> <!-- container -->

                    </div> <!-- content -->
