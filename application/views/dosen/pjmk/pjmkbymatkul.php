<style>
.btn-group-sm > .btn, .btn-sm {
    padding: .2rem .4rem;
}
</style>
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
                                <th>Semester</th>    
                                <th>Reguler </th>
                                <th>Terisi </th>                                                             
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['kodematkul'] ?> - <?php echo $m['nama'] ?></td>
                                <td><?php echo $m['semester'] ?> <?php echo $m['ta'] ?></td>                                
                                <td><?php echo $m['kelas'] ?></td>
                                <td><?php foreach ($pembagi as $p): ?>                                                                
                                    <?php echo $m['done']/$p['perdosen'] ?>/<?php echo $m['total']/$p['perdosen'] ?>
                                        <?php endforeach ?>
                                    </td>
                                <td>
                                    <a href="<?php echo site_url("dosen/nilai_semester_by_kelas/$tahunajaran/$kodematkul/$m[kelas]") ?>" data-toggle="tooltip" title="Lihat Data" class="btn btn-link"><em class="fa fa-list"></em></a>
                                    <a href="<?php echo site_url("dosen/nilai_semester_by_kelas_excel/$tahunajaran/$kodematkul/$m[kelas]") ?>" data-toggle="tooltip" title="Download Data" class="btn btn-link"><em class="fa fa-download"></em></a>
                                    <form action="<?php print site_url();?>dosen/upload" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8" style="float: right;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                    <input type="file" class="" id="validatedCustomFile" name="fileURL">
                                                    <!-- <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> -->
                                                </div>
                                                <div class="col-lg-6">
                                                    <button type="submit" name="import" class="btn btn-sm btn-success">Import</button>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                    <?php if ($m['koor'] == 1): ?>
                                        <a href="<?php echo site_url("dosen/cetakkhsperkelas/$tahunajaran/$kodematkul/$m[kelas]") ?>" data-toggle="tooltip" title="Cetak" class="btn btn-link"><em class="fa fa-print"></em></a>           
                                    <?php endif ?>                                   
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
        </div>