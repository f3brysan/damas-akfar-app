
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title text-center">Edit Data Tempat Tinggal (KTP)</h4>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <div class="box-body">
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Alamat Sesuai KTP</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->alamatktp ?>" placeholder="Contoh : Banyu Urip Baru Gang 3" name="alamatktp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">RT</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="rtktp" class="form-control" placeholder="Contoh : 3" value="<?php echo $getmhs->rtktp ?>">
                                                        </div><label class="col-2 col-form-label" for="example-email">RW</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="rwktp" class="form-control" placeholder="Contoh : 2" value="<?php echo $getmhs->rwktp ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Kelurahan</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="kelurahanktp" class="form-control" placeholder="Contoh : Medokan Sawah" value="<?php echo $getmhs->kelurahanktp ?>">
                                                        </div><label class="col-2 col-form-label" for="example-email">Kecamatan</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="kecamatanktp" class="form-control" placeholder="Contoh : Rungkut" value="<?php echo $getmhs->kecamatanktp ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Kodepos</label>
                                                        <div class="col-10">
                                                            <input type="number" id="nik" name="kodeposktp" class="form-control" placeholder="Contoh : 60295" value="<?php echo $getmhs->kodeposktp ?>">
                                                        </div>
                                                    </div>
                                                    <h4 class="m-t-0 header-title text-center">Edit Data Domisili Tempat Tinggal</h4>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Alamat Domisili</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->alamatdom ?>" placeholder="Contoh : Banyu Urip Baru Gang 3" name="alamatdom">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">RT</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="rtdom" class="form-control" placeholder="Contoh : 3" value="<?php echo $getmhs->rtdom ?>">
                                                        </div><label class="col-2 col-form-label" for="example-email">RW</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="rwdom" class="form-control" placeholder="Contoh : 2" value="<?php echo $getmhs->rwdom ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Kelurahan</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="kelurahandom" class="form-control" placeholder="Contoh : Medokan Sawah" value="<?php echo $getmhs->kelurahandom ?>">
                                                        </div><label class="col-2 col-form-label" for="example-email">Kecamatan</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="kecamatandom" class="form-control" placeholder="Contoh : Rungkut" value="<?php echo $getmhs->kecamatandom ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Kodepos</label>
                                                        <div class="col-10">
                                                            <input type="number" id="nik" name="kodeposdom" class="form-control" placeholder="Contoh : 60295" value="<?php echo $getmhs->kodeposdom ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Jenis Tempat Tinggal</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="jenisdom">
                                                                <option value="<?php echo $getmhs->jenisdom ?>"> <?php echo $getmhs->jenisdom ?></option>
                                                                <?php foreach ($tinggal as $t): ?>
                                                                    <option value="<?php echo $t['value'] ?>"><?php echo $t['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Jenis Transportasi</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->transportasi ?>" placeholder="Contoh : Sepeda Motor" name="transportasi">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("mahasiswa/index/");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Update">
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
