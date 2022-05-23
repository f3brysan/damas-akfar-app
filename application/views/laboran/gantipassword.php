<div class="container-fluid">
              <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Profile</h4>
                            <?php echo $this->session->flashdata('message');?>
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Old Password</label>
                                        <input type="text" class="form-control" id="validationDefault01" name="password" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">New Password</label>
                                        <input type="text" class="form-control" id="validationDefault01" name="newpassword" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Retype New Password</label>
                                        <input type="text" class="form-control" id="validationDefault01"  name="newpassword2" required>
                                    </div>
                                <div class="col col-xs-12 text-right">
                                <a class="btn btn-warning" href="<?php echo site_url("dosen");?>"><i class="fa fa-arrow-left"></i> Kembali</a> <input type="submit" name="submit" class="btn btn-primary" value="Save">
                              </div>
                          <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>