<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Data Kuliah Pengabdian Masyarakat</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Semester</th>
                                <th>Nama Matkul</th>
                                <th>Kode MatKul</th>
                                <th>Semester / TA </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (is_array($get_data_kpm) && count($get_data_kpm) > 0): ?>
                            <?php $no = 1;
                            foreach ($get_data_kpm as $kpm): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $kpm['kode_semester'] ?></td>
                                <td><?php echo $kpm['nama'] ?></td>
                                <td><?php echo $kpm['kodematkul'] ?></td>
                                <td><?php echo $kpm['semester'] ?> <?php echo $kpm['tahunajaran'] ?></td>
                                <td><a href="<?php echo site_url("dosen/data_mhs_kpm/$kpm[kode_semester]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-success"><em class="fa fa-list"></em></a></td>
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