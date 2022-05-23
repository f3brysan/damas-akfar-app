<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Daftar Perubahan Nilai</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody><?php if (count($lognilai)>1): ?>
                            
                       
                            <?php $no = 1;
$angka = 1;
foreach ($lognilai as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['kodematkul'] ?></td>
                                <td><?php echo $m['nama'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("mahasiswa/detail_lognilai/$m[kodematkul]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-primary"><em class="fa fa-list"></em></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php else: ?>
                                -
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