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
$query = mysqli_query($conn, "SELECT id, nisn, nama, alamat, jenis_kelamin, agama FROM siswa");


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
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa Baru
                    <a href="addSiswa.php" class="btn btn-primary float-right">Add Siswa</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($query as $row) {
                            ?>
                                <tr>
                                    <td><?= $row['nisn']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['jenis_kelamin']; ?></td>
                                    <td><?= $row['agama']; ?></td>
                                    <td>

                                        <a href="cekNilai.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">Check Nilai</a>
                                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="deleteSiswa.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>

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