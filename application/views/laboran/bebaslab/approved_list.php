<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Lolos Bebas Lab</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Reg </th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Disetujui Oleh</th>
                                <th>Disetujui Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($bebas_lab as $lab): ?>
                            <tr>
                                <td><?php echo $lab['reg'] ?></td>
                                <td><?php echo $lab['nim'] ?></td>
                                <td><?php echo $lab['namalengkap'] ?></td>
                                <td><?php echo $lab['status'] ?> </td>
                                <td><?php echo $lab['catatan'] ?></td>
                                <td><?php echo $lab['nama'] ?></td>                                
                                <td><?php echo $lab['approve_at']; ?></td>
                                <td>
                                     <a href="<?php echo site_url("laboran/hapus_data_bebas_lab/$lab[id]") ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div> <!-- end row -->
            <!-- Modal Ubah -->
            <!-- END Modal Ubah -->
            </div> <!-- container -->
            <!-- Modal Ubah -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url('laboran/injek_data_bebas_lab') ?>" method="post" enctype="multipart/form-data" role="form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="col-lg-10">
                                        <input type="hidden" id="id" name="nim">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Aproval</label>
                                    <select class="form-control" name="status">
                                        <option value="allow"> Setujui</option>
                                        <option value="pending"> Tidak Setujui</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Catatan</label>
                                    <input class="form-control" type="text" name="catatan" >
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
            </div> <!-- content -->