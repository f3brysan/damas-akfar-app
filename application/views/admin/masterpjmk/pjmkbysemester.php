<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data PJMK Mata Kuliah</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode </th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($bayar as $m): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $m['kode'] ?></td>
                                    <td><?php echo $m['tahunajaran'] ?></td>
                                    <td><?php echo $m['semester'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url("admin/pjmkbyta/$m[kode]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-eye"></em></a>
                                        <?php if ($m['permit']=='1'): ?>
                                            <a href="<?php echo site_url("admin/pjmkdisallowed/$m[kode]") ?>" data-toggle="tooltip" title="Permision" class="btn btn-link"><span class="badge badge-success badge-pill pull-right"> Open</span></a> 
                                            <?php else: ?>
                                                <a href="<?php echo site_url("admin/pjmkallowed/$m[kode]") ?>" data-toggle="tooltip" title="Permision" class="btn btn-link"><span class="badge badge-danger badge-pill pull-right"> Closed</span></a>   
                                            <?php endif ?>
                                            <a href="<?php echo site_url("admin/autonilai/$m[kode]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link" onclick="return confirm('Anda yakin mengisi nilai kosong dengan nilai B?');"><span class="badge badge-primary badge-pill pull-right"> Auto B</span></a>
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
            </div> <!-- content -->