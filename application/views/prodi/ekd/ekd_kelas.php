<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title">Daftar Kelas EKD</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matkul</th>
                                <th>Nama</th>                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php if (is_array($kelas) && count($kelas) > 0): ?>                            
                            <?php $no = 1;
                            foreach ($kelas as $k): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $k['kodematkul'] ?></td>
                                <td><?php echo $k['kelas'] ?> </td>                                
                                <td>
                                    <a href="<?php echo site_url("prodi/dosen_ekd/$k[kode_ekd]/$k[kodematkul]/$k[kelas]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>
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