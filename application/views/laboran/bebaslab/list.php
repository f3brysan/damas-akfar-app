<div class="content">
    <div class="container-fluid">
         <div class="text-right">
                              <a class="btn btn-link" href="<?php echo site_url("laboran/data_peserta_yudisium") ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                          </div>

            <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Data Mahasiswa</h4>

                                    <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                        <li class="nav-item">
                                            <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                <i class="fi-monitor mr-2"></i> Menunggu Verifikasi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="fi-head mr-2"></i> All Data
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="home1">
                                            <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Reg</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th> 
                                <th>Aksi</th>                                                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($belum_lab as $lab): ?>
                                <tr>
                                    <td><?php echo $lab['id'] ?></td>
                                    <td><?php echo $lab ['nim']?></td>
                                    <td><?php echo $lab['namalengkap'] ?></td>
                                    <td><?php if ($lab['jenis_lab'] == NULL): ?>
                                    <span class="badge badge-danger"> Belum</span> 
                                        <?php else: ?>
                                    <span class="badge badge-success"> Sudah</span>
                                    <?php endif ?></td>  
                                    <td>
                                    <a href="javascript:;"
                                        "
                                        data-id="<?php echo $lab['nim'] ?>"
                                        data-kode="<?php $kode = substr($lab['id'],0,7) ?> <?php echo $kode ?>"
                                        data-toggle="modal" data-target="#edit-data">
                                        <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-link"><em class="fa fa-pencil"></em></button>
                                    </a>
                                </td>                                                                  
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                                        </div>
                                        <div class="tab-pane" id="profile1">
                                            <table id="dataverifmhs" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Reg</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th> 
                                <th>Aksi</th>                                                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($bebas_lab as $lab): ?>
                                <tr>
                                    <td><?php echo $lab['id'] ?></td>
                                    <td><?php echo $lab ['nim']?></td>
                                    <td><?php echo $lab['namalengkap'] ?></td>
                                    <td><?php if ($lab['jenis_lab'] == NULL): ?>
                                    <span class="badge badge-danger"> Belum</span> 
                                        <?php elseif ($lab['status'] == 'pending'): ?>
                                            <span class="badge badge-warning" data-toggle="tooltip" title="Diapprove oleh : <?php echo $lab['nama'] ?> | Catatan : <?php echo $lab['catatan'] ?>"> Catatan</span> 
                                            <?php else: ?>
                                    <span class="badge badge-success" data-toggle="tooltip" title="Diapprove oleh : <?php echo $lab['nama'] ?>"> Sudah</span> 
                                    <?php endif ?><?php $date = date_create($lab['approve']);
                                    echo date_format($date, "d/M/y H:i"); ?> </td>  
                                    <td>
                                        <?php if ($lab['jenis_lab'] == NULL): ?>
                                        <a href="<?php echo site_url("laboran/spp_allow/$lab[lab_id]") ?>" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Ijinkan</a>
                                        <?php else: ?>
                                        <a href="<?php echo site_url("laboran/hapus_data_bebas_lab/$lab[lab_id]/") ?><?php $kode = substr($lab['id'],0,7) ?><?php echo $kode ?>" class="btn btn-xs btn-danger"><i class="fa fa-close"></i> Tolak</a>
                                    <?php endif ?></td>                                                                      
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->


            </div> <!-- end row -->
            <!-- Modal Ubah -->
            <!-- END Modal Ubah -->
            </div> <!-- container -->
            </div> <!-- content -->

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
                                    <div class="col-lg-10">
                                        <input type="hidden" value="<?php $kode = substr($lab['id'],0,7) ?><?php echo $kode ?>" name="kode">
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