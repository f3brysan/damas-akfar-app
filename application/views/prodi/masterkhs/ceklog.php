<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="text-right">
                        <a href="<?php echo site_url("/prodi/nilai_semester_by_kelas/$tahunajaran/$kodematkul/$kelas") ?>" class="btn btn-warning waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali</a>
                    </div>
                    <hr>
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Riwayat Log Nilai</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>    
                                <th>Nama Dosen </th>                              
                                <th>Nilai</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($log)>0): ?>
                                
                            
                            <?php $no = 1;
foreach ($log as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['date'] ?></td>
                                <td><?php echo $m['nama'] ?></td>
                                <td><?php echo $m['nilai'] ?></td>                                                        
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