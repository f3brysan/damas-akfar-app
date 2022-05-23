<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <?php if($matkul != NULL):?>
                    <?php foreach ($matkul as $matkul): ?>                                        
                    <h4 class="m-t-0 header-title">Data PJMK : Mata Kuliah <?php echo $matkul['nama'] ?> Semester <?php echo $matkul['semester'] ?> Tahun Ajaran <?php echo $matkul['tahunajaran'] ?></h4> 

                    <div class="text-right">
                        <a href="<?php echo site_url("admin/tambahpjmk/$tahunajaran/$matkul[kode]") ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus m-r-5"></i> Tambah Dosen</a>
                    </div>
                    
                    <?php endforeach; endif; ?> 
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIDN </th>    
                                <th>Nama </th>
                                <th>Reguler </th>                              
                                <th>Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (is_array($get) && count($get) > 0): ?>
                                                           
                            <?php $no = 1;
foreach ($get as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>                               
                                <td><?php echo $m['nidn'] ?></td>
                                <td><?php echo $m['gelardepan'] ?> <?php echo $m['nama'] ?> <?php echo $m['gelarbelakang'] ?></td>
                                <td><?php echo $m['reguler'] ?></td>
                                <td>
                                    <?php if ($m['permit']=='1'): ?>
                                        <a class="btn btn-link"><em class="fa fa-check"></em></a>
                                        <?php else: ?>
                                            <a href="<?php echo site_url("admin/pjmkbymatkul/$tahunajaran/$m[id]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-close"></em></a>
                                    <?php endif ?>
                                                                       
                                </td>
                                <td>
                                    <a href="<?php echo site_url("admin/editpjmk/$tahunajaran/$kodematkul/$m[id]") ?>" data-toggle="tooltip" title="Edit" class="btn btn-link"><em class="fa fa-gear"></em></a>
                                    <a href="<?php echo site_url("admin/hapuspjmk/$tahunajaran/$kodematkul/$m[id]") ?>" data-toggle="tooltip" title="Hapus" class="btn btn-link" onclick="return confirm('Anda yakin mengisi Dosen <?php echo $m['nama'] ?> dari PJMK?');"><em class="fa fa-trash"></em></a>                             
                                </td>
                            </tr>
                            <?php endforeach;?>
                             <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div> <!-- end row -->
            <!-- Modal Ubah -->
            <!-- END Modal Ubah -->
            </div> <!-- container -->
            </div> <!-- content -->