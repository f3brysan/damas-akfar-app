
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title">Data Mahasiswa</h4>

                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>                                           
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($mhs as $m): ?>
                                            <tr>
                                                <td><?php echo $m['nim'] ?></td>
                                                <td><?php echo $m['namalengkap'] ?></td>
                                                
                                                <td><a href="<?php echo site_url('admin'); ?>/khs_semester/<?php echo $m['nim'] ?>" class="btn btn-primary" target="_blank">KHS</a>
                                &nbsp;
                                <?php 
                                    if($m['status_krs'] == NULL) {
                                        // echo '<a href="javascript:void(0)" class="btn btn-danger">Belum mengajukan KRS</a>';
                                    } else {
                                        echo '<a href="'.site_url('admin/cetak_krs/').$m['nim'].'" target="_blank" class="btn btn-warning">Lihat KRS</a>&nbsp;';
                                        
                                    }
                                ?>
                                </td>   
                                            </tr>
    <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <!-- Modal Ubah -->
                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                      <h4 class="modal-title">Konfirmasi</h4>
                                  </div>
                                  <form class="form-horizontal" action="<?php echo base_url('admin/injeknim') ?>" method="post" enctype="multipart/form-data" role="form">
                                    <div class="modal-body">
                                            <div class="form-group">

                                                <div class="col-lg-10">
                                                  <input type="hidden" id="id" name="id">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                               <div class="col-xs-12">
                             <label class="control-label">No NIM</label>
                             <input class="form-control" placeholder="Contoh : 1123456789" type="text" name="nim" id="nim" value="<?php echo $m['nim'] ?>">
                           </div>
                           </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-warning" data-dismiss="modal"> Kembali</button>
                                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                                        </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- END Modal Ubah -->




                    </div> <!-- container -->

                </div> <!-- content -->
