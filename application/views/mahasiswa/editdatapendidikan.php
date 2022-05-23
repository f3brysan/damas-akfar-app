
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title text-center">Pendidikan Terakhir</h4>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <div class="box-body">
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Nama Sekolah/Institusi</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->sekolah ?>" placeholder="Contoh : SMAN 1 Surabaya" name="sekolah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Lulus</label>
                                                        <div class="col-10">
                                                            <input type="TEXT" id="rt" name="lulus" class="form-control" value="<?php echo $getmhs->lulus ?>">
                                                        </div>
                                                    </div>
                                                    <h4 class="m-t-0 header-title text-center">Pekerjaan Mahasiswa</h4>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Jenis Profesi</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->profesimhs ?>" placeholder="Contoh : Apoteker" name="profesimhs">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Nama Perushaan</label>
                                                        <div class="col-10">
                                                            <input type="text" id="rt" name="tempatkerjamhs" class="form-control" placeholder="Contoh : Kimia Farma Darmo" value="<?php echo $getmhs->tempatkerjamhs ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Alamat Perusahaan</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="alamatkerjamhs" class="form-control" placeholder="Contoh : Medokan Sawah" value="<?php echo $getmhs->alamatkerjamhs ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Surat Keterangan Kerja</label>
                                                        <div class="col-4">
                                                            <select class="form-control" name="skkerja">
                                                                <option value="<?php echo $getmhs->skkerja ?>"> <?php echo $getmhs->skkerja ?></option>
                                                                <option value="Sudah">Sudah</option>
                                                                <option value="Belum">Belum</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("mahasiswa");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Update">
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
