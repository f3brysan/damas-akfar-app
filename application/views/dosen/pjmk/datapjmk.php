<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Input Nilai</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matkul</th>    
                                <th>Nama Matkul</th>
                                <th>Semester</th>
                                <th>Tahun Ajaran</th>                               
                                <th>Reguler</th>
                                <th>Nilai Terisi</th>                                                                   
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (is_array($pjmk) && count($pjmk) > 0): ?>                                                            
                            <?php $no = 1;
                            foreach ($pjmk as $m): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $m['kode'] ?></td>                                
                                    <td><?php echo $m['matkul'] ?></td>
                                    <td><?php echo $m['semester'] ?></td>
                                    <td><?php echo $m['ta'] ?></td>
                                    <td>Reguler <?php echo $m['reguler'] ?></td>
                                    <td><?php echo number_format($m['done']/$m['total']*100,2) ?>%</td>
                                    <td>
                                        <?php if ($m['permit'] == '1'): ?>
                                        <a href="<?php echo site_url("dosen/pjmkbymatkul/$m[tahunajaran]/$m[kode]/$m[reguler]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-success"><em class="fa fa-list"></em></a>
                                        <?php else: ?>
                                         <a href="<?php echo site_url("dosen/pjmkbymatkul/$m[tahunajaran]/$m[kode]/$m[reguler]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-danger disabled"><em class="fa fa-list"></em></a>                                                            
                                        <?php endif ?>
                                       
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