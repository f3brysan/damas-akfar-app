<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Hasil Studi Per Semester</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Semester</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
$angka = 1;
foreach ($semester as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>Semester <?php echo $m['semester'] ?></td>
                                <td><?php echo $m['tahunajaran'] ?></td>
                                <td>
                                    <a href="<?php echo site_url("dosen_wali/khs_detail/$nim/$m[kode]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-primary"><em class="fa fa-list"></em></a>
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