
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                      <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0"> File Upload</h4>
                                    <div class="text-right">
                                            <a class="btn btn-link" href="<?php echo site_url("mahasiswa/detilmhs/$getmhs->id");?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        </div>

                                    <form role="form" action="" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>





                                      <div class="modal-footer">
                                        <input type="submit" name="sbmt" class="btn btn-primary" value="Submit">
                                      </div>
                                          </form>
                                </div>
                            </div>
                        </div>

                      </div> <!-- container -->

                </div> <!-- content -->
