<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Matakuliah</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Kuliah</th>    
                                <th>Reguler </th>                                                             
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
foreach ($get as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['kodematkul'] ?></td>                                
                                <td><?php echo $m['kelas'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("admin/nilai_semester_by_kelas/$tahunajaran/$kodematkul/$m[kelas]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>                                   
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