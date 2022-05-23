<head>
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
</head>

<div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="clearfix">
                                        <div class="pull-left mb-3">
                                            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" height="28">
                                        </div>
                                        <div class="pull-center offset-4">
                                            <h2 class="m-2">Akademi Farmasi Surabaya</h2>
                                        </div>
                                    </div>
<div>
  <h4 class="text-center">Data Sertifikasi</h4>
</div>

                                    <div class="row">
                                        <div class="col-3 offset-2">
                                            <div class="pull-left mt-3">
                                                <p><b>Nama : </b><?php echo $nav->namalengkap ?></p>
                                                <p><b>Reguler : </b><?php echo $nav->reguler ?></p>

                                            </div>

                                        </div><!-- end col -->
                                        <div class="col-2 offset-2">
                                            <div class="mt-3 pull-right">
                                                <p><b>NIM : </b><?php echo $nav->nim ?></p>
                                                <p><b>Angkatan : </b><?php echo $nav->angkatan ?></p>
                                            </div>
                                        </div><!-- end col -->

                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                  <thead>
                                                  <tr>
                                                      <th>No</th>
                                                      <th>Jenis</th>
                                                      <th>Nama</th>
                                                      <th>Mulai</th>
                                                      <th>Selesai</th>

                                                  </tr>
                                                  </thead>
                                                  <?php
                                                  $no = 1;
                                                  if (is_array($sertifikasi) && count($sertifikasi) > 0) {
          foreach ($sertifikasi as $s) {
                                                    ?>

          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $s['jenis']; ?></td>
            <td><?php echo $s['nama']; ?></td>
            <td><?php echo $s['mulai']; ?></td>
            <td><?php echo $s['selesai']; ?></td>
          </tr>
          <?php }} else {
            echo "-";
          } ?>

                                                  <tbody>
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden-print mt-4 mb-4">
                                                                            <div class="text-right">
                                                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>                                                                                
                                                                            </div>

                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
