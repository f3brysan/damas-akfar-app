
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title text-center">Edit Data Dosen</h4>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <div class="box-body">
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                <?php foreach ($getdosen as $gd): ?>
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">NIDN</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $gd['nidn'] ?>" name="nidn">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Nama Lengkap</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namalengkap" name="nama" class="form-control" placeholder="Contoh : Dewi Setyowati" value="<?php echo $gd['nama'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">NIP</label>
                                                        <div class="col-10">
                                                            <input type="number" id="nik" name="nip" class="form-control" placeholder="Contoh : 956766xxxxxx" value="<?php echo $gd['nip'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Gelar Depan</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namalengkap" name="gelardepan" class="form-control" placeholder="Contoh : Ir, Drs, dll" value="<?php echo $gd['gelardepan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Gelar Belakang</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namalengkap" name="gelarbelakang" class="form-control" placeholder="Contoh : S.Farm, S.Pd" value="<?php echo $gd['gelarbelakang'] ?>" >
                                                        </div>
                                                      </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tempat Lahir</label>
                                                        <div class="col-10">
                                                            <input type="text" id="lahirmahasiswa" name="tempatlahir" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $gd['tempatlahir'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tanggal Lahir</label>
                                                        <div class="col-10">
                                                            <input type="date" id="tgllahirmahasiswa" name="tanggallahir" class="form-control" placeholder="Contoh : 1 Januari 1996" value="<?php echo $gd['tanggallahir'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="jeniskelamin">
                                                                <option value="<?php echo $gd['jeniskelamin'] ?>"><?php echo $gd['kelamin'] ?></option>
                                                              <?php foreach ($kelamin as $k): ?>
                                                                <option value="<?php echo $k['value'] ?>"><?php echo $k['nama'] ?></option>
                                                                      <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Agama</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="agama">
                                                                <option value="<?php echo $gd['agama'] ?>"><?php echo $gd['agamavalue'] ?></option>
                                                              <?php foreach ($agama as $a): ?>
                                                                <option value="<?php echo $a['value'] ?>"><?php echo $a['nama'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                            </div>

                                          <?php endforeach; ?>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("admin/detil_dosen/$gd[nidn]");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Update">
                                              </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                      </div>
                                    </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
