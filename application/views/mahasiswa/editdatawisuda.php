
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title text-center">Edit Data Pribadi</h4>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <div class="box-body">
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">NIM</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->nim ?>" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Nama Lengkap</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namalengkap" name="namalengkap" class="form-control" placeholder="Contoh : Dewi Setyowati" value="<?php echo $getmhs->namalengkap ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tempat Lahir</label>
                                                        <div class="col-10">
                                                            <input type="text" id="lahirmahasiswa" name="lahirmahasiswa" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $getmhs->lahirmahasiswa ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tanggal Lahir</label>
                                                        <div class="col-10">
                                                            <input type="date" id="tgllahirmahasiswa" name="tgllahirmahasiswa" class="form-control" placeholder="Contoh : 1 Januari 1996" value="<?php echo $getmhs->tgllahirmahasiswa ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">No Handphone</label>
                                                        <div class="col-10">
                                                            <input type="text" id="hp" name="hp" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $getmhs->hp ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Email</label>
                                                        <div class="col-10">
                                                            <input type="text" id="email" name="email" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $getmhs->email ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Pesan</label>
                                                        <div class="col-10">
                                                            <input type="text" id="pesan" name="pesan" maxlength="225" class="form-control" placeholder="Contoh : Saya senang . . . ." value="<?php echo $getmhs->pesan ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Kesan</label>
                                                        <div class="col-10">
                                                            <input type="text" id="kesan" name="kesan" maxlength="225" class="form-control" placeholder="Contoh : Semoga . . . ." value="<?php echo $getmhs->kesan ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Judul KTI</label>
                                                        <div class="col-10">
                                                            <input type="text" id="kti" name="kti" maxlength="225" class="form-control" placeholder="Contoh : Ekstrak . . . ." value="<?php echo $getmhs->kti ?>">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("mahasiswa/data_wisuda");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Simpan">
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
