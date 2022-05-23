<div class="content">
    <div class="container-fluid">
        <div class="row">            
            <div class="col-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title">Master EKD</h4>                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode EKD</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody><?php if (is_array($ekd) && count($ekd) > 0): ?>
                            
                       
                            <?php $no = 1;
foreach ($ekd as $e): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $e['kode_ekd'] ?></td>
                                <td><?php echo $e['rel_tahunajaran'] ?> </td>
                                <td><?php echo $e['semester'] ?> <?php echo $e['tahunajaran'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("prodi/hasil_ekd_by_dosen/$e[rel_tahunajaran]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>                                   
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