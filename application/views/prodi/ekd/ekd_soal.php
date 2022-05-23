<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">                
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title">Soal EKD</h4>
                    <div class="text-right">
                        <a href="<?php echo site_url("prodi/tambah_soal_ekd") ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus m-r-5"></i> Tambah Soal EKD</a>
                    </div>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Soal</th>
                                <th>Tipe</th>                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (is_array($soal) && count($soal) > 0): ?>                            
                            <?php $no = 1;
                            foreach ($soal as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['soal'] ?></td>
                                <td><?php echo $m['type'] ?> </td>                                
                                <td>
                                    <a href="<?php echo site_url("prodi/kelas_ekd/$m[id]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>
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