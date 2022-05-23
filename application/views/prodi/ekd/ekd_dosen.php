<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="text-right">
                        <a href="<?php echo site_url("prodi/tambah_dosen_ekd/$selected_kode_ekd/$selected_kodematkul/$selected_kelas") ?>" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus m-r-5"></i> Tambah Dosen EKD</a>
                    </div>
                    <h4 class="m-t-0 header-title">Daftar EKD Dosen Kelas <?php echo $selected_kelas; ?> <?php echo $selected_matkul['kodematkul']; ?> <?php echo $selected_matkul['nama']; ?> </h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIDN</th>
                                <th>Nama Dosen</th>                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php if (is_array($dosen) && count($dosen) > 0): ?>                            
                            <?php $no = 1;
                            foreach ($dosen as $d): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['rel_nidn'] ?></td>
                                <td><?php if ($d['gelardepan']!=NULL): ?>
                                    <?php echo $d['gelardepan'] ?>.                                                                     
                                <?php endif ?><?php echo $d['nama'] ?>, <?php echo $d['gelarbelakang'] ?></td>                                
                                <td>
                                    <a href="<?php echo site_url("prodi/hapus_dosen_ekd/$selected_kode_ekd/$selected_kodematkul/$selected_kelas/$d[id]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-danger"><em class="fa fa-trash"></em></a>
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