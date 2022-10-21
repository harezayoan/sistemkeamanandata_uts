<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='../index.php'</script>";
}

$id = $_GET["id"];


// var_dump($_SESSION['login']);
// jalankan query DELETE untuk menghapus data
$query = "DELETE FROM siswa WHERE id='$id' ";
$hasil_query = mysqli_query($conn, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
    die("Gagal menghapus data: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "<script>alert('Data berhasil dihapus.');
    window.location='dataSiswa.php';</script>";
}
