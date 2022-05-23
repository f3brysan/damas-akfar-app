<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Antrian Bebas Lab</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Reg </th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($bebas_lab as $lab): ?>
                            <tr>
                                <td><?php echo $lab['id'] ?></td>
                                <td><?php echo $lab['nim'] ?></td>
                                <td><?php echo $lab['namalengkap'] ?></td>
                                <td>
                                    <a href="javascript:;"
                                        "
                                        data-id="<?php echo $lab['nim'] ?>"
                                        data-toggle="modal" data-target="#edit-data">
                                        <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-link"><em class="fa fa-pencil"></em></button>
                                    </a>
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