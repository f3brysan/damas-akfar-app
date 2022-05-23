
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title text-center">Edit Data Orang Tua/Wali</h4>
                                    <br>
                                    <h5 class="m-t-0 header-title text-center">Data Ayah</h5>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <div class="box-body">
                                              <form role="form" action="" method="post" enctype="multipart/form-data">
                                                  <div class="form-group has-feedback">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">NIK Ayah</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->nikayah ?>" placeholder="Contoh : 23456789" name="nikayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Nama Ayah</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->namaayah ?>" placeholder="Contoh : Supeno" name="namaayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tempat Lahir</label>
                                                        <div class="col-10">
                                                            <input type="text" id="lahirmahasiswa" name="tempatayah" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $getmhs->tempatayah ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tanggal Lahir</label>
                                                        <div class="col-10">
                                                            <input type="date" id="tgllahirmahasiswa" name="tglayah" class="form-control" placeholder="Contoh : 1 Jan 1996" value="<?php echo $getmhs->tglayah ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Agama</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="agamaayah">
                                                              <option value="<?php echo $getmhs->agamaayah ?>"> <?php echo $getmhs->agamaayah ?></option>
                                                              <?php foreach ($agama as $a): ?>
                                                                <option value="<?php echo $a['value'] ?>"><?php echo $a['nama'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Pendidikan Terakhir</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="pendidikanayah">
                                                                <option value="<?php echo $getmhs->pendidikanayah ?>"> <?php echo $getmhs->pendidikanayah ?></option>
                                                                <?php foreach ($didik as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Profesi Ayah</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="profesiayah">
                                                                <option value="<?php echo $getmhs->profesiayah ?>"> <?php echo $getmhs->profesiayah ?></option>
                                                                <?php foreach ($profesi as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Penghasilan Ayah</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="penghasilanayah">
                                                                <option value="<?php echo $getmhs->pendidikanwali ?>"> <?php echo $getmhs->pendidikanwali ?></option>
                                                                <?php foreach ($hasil as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Status</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="kelaminmhs">
                                                                <option value="<?php echo $getmhs->statusayah ?>"> <?php echo $getmhs->statusayah ?></option>
                                                                <option value="Masih Ada">Masih Ada</option>
                                                                <option value="Meninggal">Meninggal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <h5 class="m-t-0 header-title text-center">Data Ibu</h5>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">NIK Ibu</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->nikibu ?>" placeholder="Contoh : 345690" name="nikibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Nama Ibu</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->namaibu ?>" placeholder="Contoh : Supeno" name="namaibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tempat Lahir</label>
                                                        <div class="col-10">
                                                            <input type="text" id="lahirmahasiswa" name="tempatibu" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $getmhs->tempatibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tanggal Lahir</label>
                                                        <div class="col-10">
                                                            <input type="date" id="tgllahirmahasiswa" name="tglibu" class="form-control" placeholder="Contoh : 1 Jan 1996" value="<?php echo $getmhs->tglibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Agama</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="agamaibu">
                                                              <option value="<?php echo $getmhs->agamaibu ?>"> <?php echo $getmhs->agamaibu ?></option>
                                                              <?php foreach ($agama as $a): ?>
                                                                <option value="<?php echo $a['value'] ?>"><?php echo $a['nama'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Pendidikan Terakhir</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="pendidikanibu">
                                                                <option value="<?php echo $getmhs->pendidikanibu ?>"> <?php echo $getmhs->pendidikanibu ?></option>
                                                                <?php foreach ($didik as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Profesi Ibu</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="profesiibu">
                                                                <option value="<?php echo $getmhs->profesiibu ?>"> <?php echo $getmhs->profesiibu ?></option>
                                                                <?php foreach ($profesi as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Penghasilan Ibu</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="penghasilanibu">
                                                                <option value="<?php echo $getmhs->penghasilanibu ?>"> <?php echo $getmhs->penghasilanibu ?></option>
                                                                <?php foreach ($hasil as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Status</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="kelaminmhs">
                                                                <option value="<?php echo $getmhs->statusibu ?>"> <?php echo $getmhs->statusibu ?></option>
                                                                <option value="Masih Ada">Masih Ada</option>
                                                                <option value="Meninggal">Meninggal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <h5 class="m-t-0 header-title text-center">Data Wali</h5>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Nama Wali</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="<?php echo $getmhs->namawali ?>" placeholder="Contoh : Supeno" name="namawali">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tempat Lahir</label>
                                                        <div class="col-10">
                                                            <input type="text" id="lahirmahasiswa" name="tempatwali" class="form-control" placeholder="Contoh : Surabaya" value="<?php echo $getmhs->tempatwali ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Tanggal Lahir</label>
                                                        <div class="col-10">
                                                            <input type="date" id="tgllahirmahasiswa" name="tglwali" class="form-control" placeholder="Contoh : 1 Jan 1996" value="<?php echo $getmhs->tglwali ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Agama</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="agamawali">
                                                              <option value="<?php echo $getmhs->agamawali ?>"> <?php echo $getmhs->agamawali ?></option>
                                                              <?php foreach ($agama as $a): ?>
                                                                <option value="<?php echo $a['value'] ?>"><?php echo $a['nama'] ?></option>
                                                                  <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Pendidikan Terakhir</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="pendidikanwali">
                                                                <option value="<?php echo $getmhs->pendidikanwali ?>"> <?php echo $getmhs->pendidikanwali ?></option>
                                                                <?php foreach ($didik as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Profesi Wali</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="profesiwali">
                                                                <option value="<?php echo $getmhs->profesiwali ?>"> <?php echo $getmhs->profesiwali ?></option>
                                                                <?php foreach ($profesi as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Penghasilan Wali</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="penghasilanwali">
                                                                <option value="<?php echo $getmhs->penghasilanwali ?>"> <?php echo $getmhs->penghasilanwali ?></option>
                                                                <?php foreach ($hasil as $d): ?>
                                                                    <option value="<?php echo $d['value'] ?>"><?php echo $d['nama'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Status</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="kelaminmhs">
                                                                <option value="<?php echo $getmhs->statuswali ?>"> <?php echo $getmhs->statuswali ?></option>
                                                                <option value="Masih Ada">Masih Ada</option>
                                                                <option value="Meninggal">Meninggal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                          <div class="col col-xs-12 text-right">
                                                  <a class="btn btn-warning" href="<?php echo site_url("admin/detilmhs/$getmhs->id");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="sbmt" class="btn btn-primary" value="Update">
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
