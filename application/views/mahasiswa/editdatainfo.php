
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title text-center">Edit Informasi Lain</h4>
                                    <h5 class="m-t-0 header-title text-center">Rencana Setelah Kuliah</h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <div class="box-body">
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Rencana Bekerja</label>
                                                        <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="rencanamhs" value="Tidak" class="custom-control-input" onclick="hide();">
                                                    <label class="custom-control-label" for="customRadio1">Tidak</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="rencanamhs" value="Iya" class="custom-control-input" onclick="show();">
                                                    <label class="custom-control-label" for="customRadio2">Iya</label>
                                                </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tujuan Perusahaan</label>
                                                        <div class="col-10">
                                                            <input type="text" id="area" style="display: none;" name="tempatrencana" class="form-control" placeholder="Contoh : 3" value="<?php echo $getmhs->tempatrencana ?>">
                                                        </div>
                                                    </div>
                                                    <h5 class="m-t-0 header-title text-center">Edit Data Riwayat Kesehatan</h5>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Gol. Darah</label>
                                                        <div class="col-4">
                                                            <select class="form-control" name="darah">
                                                                <option value="<?php echo $getmhs->darah ?>"> <?php echo $getmhs->darah ?></option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Surat Keterangan Sehat</label>
                                                        <div class="col-10">
                                                            <input type="text" id="nik" name="sksehat" class="form-control" placeholder="" value="<?php echo $getmhs->penyakit ?>">
                                                        </div>
                                                      </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Riwayat Penyakit</label>
                                                        <div class="col-10">
                                                            <textarea class="form-control" rows="5" id="nik" name="penyakit" class="form-control" placeholder="Riwayat Penyakit dapat dipisahkan dengan koma (,). Contoh : Asma, Epilepsi, dll."><?php echo $getmhs->penyakit ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tinggi (cm)</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="tinggi" class="form-control" placeholder="Contoh : 170" value="<?php echo $getmhs->tinggi ?>">
                                                        </div><label class="col-2 col-form-label" for="example-email">Berat (Kg)</label>
                                                        <div class="col-4">
                                                            <input type="text" id="rt" name="berat" class="form-control" placeholder="Contoh : 65" value="<?php echo $getmhs->berat ?>">
                                                        </div>
                                                    </div>
                                                    <h5 class="m-t-0 header-title text-center">Edit Data Bidang Minat</h5>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Minat Bidang Olahraga</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->olahraga ?>" placeholder="Contoh : Basket" name="olahraga">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Minat Bidang Kesenian</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->kesenian ?>" placeholder="Contoh : Drama Teater" name="kesenian">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Minat Bidang Organisasi</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->organisasi ?>" placeholder="Contoh : OSIS" name="organisasi">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("mahasiswa/index");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Update">
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
