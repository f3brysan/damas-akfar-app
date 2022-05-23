<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Detail Perubahan Nilai</h4>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Kode Semester</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody><?php if (count($detail)>1): ?>
                            
                       
                            <?php $no = 1;
$angka = 1;
foreach ($detail as $m): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $m['kodematkul'] ?></td>
                                <td><?php echo $m['nama'] ?></td>
                                <td><?php echo $m['tahunajaran'] ?></td>
                                <td>
                                    <?php
$e = '0.00';
$d = '1.00';
$c = '2.00';
$b = '3.00';
$a = '4.00';
$nilai = $m['nilai'];
if ($nilai <= '39.99') {
    $hasile = number_format($e, 2);
    echo $hasile;
} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
    $hasild = number_format($d, 2);
    echo $hasild;
} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
    $hasilc = number_format($c, 2);
    echo $hasilc;
} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
    $hasilb = number_format($b, 2);
    echo $hasilb;
} else {
    echo number_format($a, 2);
}?> / 
<?php
$nilai = $m['nilai'];
if ($nilai <= '39.99') {
    echo "E";
} elseif ($nilai >= '40.00' && $nilai <= '50.99') {
    echo "D";
} elseif ($nilai >= '51.00' && $nilai <= '65.99') {
    echo "C";
} elseif ($nilai >= '66.00' && $nilai <= '75.99') {
    echo "B";
} else {
    echo "A";
}?>
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