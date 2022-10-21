<?php
session_start();
include 'header.php';
// echo ($_SESSION['login']);
if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='../index.php'</script>";
}
?>


<?php
include '../koneksi.php';
$id = ($_GET["id"]);
$query = mysqli_query($conn, "SELECT nisn, nama, BINDO, MTK, IPA, IPS FROM siswa WHERE id = '$id'");


?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa Baru</h1>
    </div>

    <!-- Content Row -->
    <div class="row-md-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cek Nilai Siswa
                    <a href="dataSiswa.php" class="btn btn-danger float-right">Back</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Nilai B.Indo</th>
                                <th>Nilai MTK</th>
                                <th>Nilai IPA</th>
                                <th>Nilai IPS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($query as $row) {
                                ?>
                                    <td><?= $row['nisn']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['BINDO']; ?></td>
                                    <td><?= $row['MTK']; ?></td>
                                    <td><?= $row['IPA']; ?></td>
                                    <td><?= $row['IPS']; ?></td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php'; ?>