
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0"> File Upload</h4>
                                    <?php if (is_array($yudisium) && count($yudisium) > 0): ?>
                                        <p>Kode Unik : <?php echo $yudisium['0']['id']; ?> </p>
                                        <p>Nama Berkas : <?php echo $yudisium['0']['nama_file'] ?></p>
                                        <p>Diunggah pada : <?php echo $yudisium['0']['upload_at'] ?></p>                                      
                                      <?php else: ?>
                                        <p>Anda Belum Mengunggah Berkas Yudisium.</p>
                                    <?php endif ?>                                    
                                    <div class="text-right">
                                            <a class="btn btn-link" href="<?php echo site_url("mahasiswa/wisuda");?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        </div>

                                    <form role="form" action="" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>





                                      <div class="modal-footer">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                      </div>
                                          </form>
                                </div>
                            </div>
                        </div>

                      </div> <!-- container -->

                </div> <!-- content -->
