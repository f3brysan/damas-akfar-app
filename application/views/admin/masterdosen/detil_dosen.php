
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="text-right">
                              <a class="btn btn-link" href="<?php echo site_url("admin");?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                          </div>
                          <?php foreach ($dosen as $d): ?>


                          <div class="row">
                            <div class="col-md-3">
                              <div class="card-box">
                                    <div class="">
                                      <h4 style="text-align:center" class="header-title m-t-0 m-b-30">Foto Dosen</h4>
                                    </div>
                                    <p align="center"><img src="<?php echo base_url(); ?>uploads/foto/<?php echo $d['foto'];  ?>" width="160" height="200"></p>
                                    <div class="text-right">
                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_foto/$d[foto]");?>"><i class="fa fa-camera"></i> Edit</a>
                                        </div>
                              </div>

                                </div>
                                  <div class="col-md-9">
                                      <div class="card-box">
                                          <h4 class="header-title m-t-0 m-b-30">Data Dosen</h4>
                                          <div class="tabs-vertical-env">
                                              <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                                  <li class="nav-item">
                                                      <a href="#diri" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                          <span class="fa fa-user"></span> Data Dosen
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#home" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-home"></span> Daftar Mahasiswa Wali
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#kontak" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-phone"></span> Jadwal Mengajar
                                                      </a>
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="#pendidikan" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                          <span class="fa fa-institution"></span> Data Nilai Mahasiswa
                                                      </a>
                                                  </li>
                                              </ul>
                                              <div class="tab-content">
                                                  <div class="tab-pane active" id="diri">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_diri_dosen/$d[nidn]");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                     <table class="table-sm">
                                                    <tbody>
                                         <tr>
                                             <th>NIDN</th>
                                             <td>:</td>
                                             <td><?php echo $d['nidn'] ?></td>
                                         </tr>
                                         <tr>
                                             <th>Nama Lengkap</th>
                                             <td>:</td>
                                             <td><?php echo $d['nama'] ?></td>
                                         </tr>
                                         <tr>
                                             <th>Gelar</th>
                                             <td>:</td>
                                             <td><?php echo $d['gelardepan']; echo $d['gelarbelakang']; ?></td>
                                         </tr>
                                         <tr>
                                             <th>NIP</th>
                                             <td>:</td>
                                             <td><?php echo $d['nip'] ?></td>
                                         </tr>
                                         <tr>
                                             <th>Tempat & Tanggal Lahir</th>
                                             <td>:</td>
                                             <td><?php echo $d['tempatlahir']; echo " , "; echo $d['tanggallahir']; ?></td>
                                         </tr>
                                         <tr>
                                             <th>Jenis Kelamin</th>
                                             <td>:</td>
                                             <td><?php echo $d['kelamin'] ?></td>
                                         </tr>
                                         <tr>
                                             <th>Agama</th>
                                             <td>:</td>
                                             <td><?php echo $d['agamavalue']; ?></td>
                                         </tr>

                                     </tbody> </table>


                                                  </div>
                                                  <div class="tab-pane" id="home">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_wali_dosen/$d[nidn]");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                        <table id="datatable" class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>No </th>
                                                                <th>NIM </th>
                                                                <th>Nama Mahasiswa</th>
                                                                <th>Reguler</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                              <?php if (is_array($wali) && count($wali) > 0) { ?>
                                                                <?php $no=1;
                                                                foreach ($wali as $w): ?>


                                                                <tr>
                                                                    <td><?php echo $no++; ?></td>
                                                                    <td><?php echo $w['nim'] ?></td>
                                                                    <td><?php echo $w['namalengkap'] ?></td>
                                                                    <td><?php echo $w['reguler'] ?></td>
                                                                    <td>
                                                                      <a href="<?php echo site_url("admin/detil_dosen/$w[id]")?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-eye"></em></a>
                                                                    </td>
                                                                </tr>
                                                              <?php endforeach; ?>
                                                                <?php    } ?>
                                                            </tbody>

                                                        </table>
                                                  </div>

                                                  <div class="tab-pane" id="pendidikan">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_pendidikan/$d[id]");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                      <table class="table-sm">
                                                      </table>
                                                  </div>

                                                  <div class="tab-pane" id="orangtua">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_wali/$d[id]");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                      <table class="table-sm">
                                                      </table>
                                                  </div>
                                                  <div class="tab-pane" id="info">
                                                    <div class="text-right">
                                                            <a class="btn btn-link" href="<?php echo site_url("admin/edit_data_info/$d[id]");?>"><i class="fa fa-pencil"></i> Edit</a>
                                                        </div>
                                                    <p>Rencana Setelah Pendidikan</p>
                                                      <table class="table-sm">
                                                          </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                   <!-- end col -->








                        </div> <!-- container -->
        <?php endforeach; ?>
                    </div> <!-- content -->
