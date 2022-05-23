
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
                                                        <label class="col-2 col-form-label">Jenis Reguler</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->reguler ?>" name="reguler" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tahun Angkatan</label>
                                                        <div class="col-10">
                                                            <input type="text" id="tgllahirmahasiswa" name="angkatan" class="form-control" placeholder="Contoh : 2018" value="<?php echo $getmhs->angkatan ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Jenis Pendaftaran</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="jenisdaftar">
                                                                <option value="<?php echo $getmhs->jenisdaftar ?>"><?php echo $getmhs->jenisdaftar ?></option>
                                                              <?php foreach ($jenisdaftar as $a): ?>
                                                                <option value="<?php echo $a['value'] ?>"><?php echo $a['nama'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Nama Lengkap</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namalengkap" name="namalengkap" class="form-control" placeholder="Contoh : Dewi Setyowati" value="<?php echo $getmhs->namalengkap ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Nama Panggilan</label>
                                                        <div class="col-10">
                                                            <input type="text" id="namapanggil" name="namapanggil" class="form-control" placeholder="Contoh : Dewi" value="<?php echo $getmhs->namapanggil ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">NIK</label>
                                                        <div class="col-10">
                                                            <input type="number" id="nik" name="nik" class="form-control" placeholder="Contoh : 956766xxxxxx" value="<?php echo $getmhs->nik ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tempat Lahir</label>
                                                        <div class="col-10">
                                                            <input type="text" id="lahirmahasiswa" name="lahirmahasiswa" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $getmhs->lahirmahasiswa ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tanggal Lahir</label>
                                                        <div class="col-10">
                                                            <input type="date" id="tgllahirmahasiswa" name="tgllahirmahasiswa" class="form-control" placeholder="Contoh : 1 Januari 1996" value="<?php echo $getmhs->tgllahirmahasiswa ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="kelaminmhs">
                                                                <option value="<?php echo $getmhs->kelaminmhs ?>"><?php
                                                                $a = $getmhs->kelaminmhs;
                                                                if ($a<'2') {
                                                                  echo "Laki - Laki";
                                                                }
                                                                else {
                                                                  echo "Perempuan";
                                                                }?></option>
                                                              <?php foreach ($kelamin as $k): ?>
                                                                <option value="<?php echo $k['value'] ?>"><?php echo $k['nama'] ?></option>
                                                                      <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Agama</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="agamamahasiswa">
                                                              <?php foreach ($agama as $a): ?>
                                                                <option value="<?php echo $a['value'] ?>"><?php echo $a['nama'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Kewarganegaraan</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="warganegara">
                                                                <option value="<?php echo $getmhs->warganegara ?>"> <?php echo $getmhs->warganegara ?></option>
                                                                <option value="ID">WNI</option>
                                                                <option value="IA">WNA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Jumlah Saudara</label>
                                                        <div class="col-10">
                                                            <input type="number" id="saudara" name="saudara" class="form-control" placeholder="Contoh : 3" value="<?php echo $getmhs->saudara ?>">
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
