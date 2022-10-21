<?php
session_start();
include 'header.php';
// echo ($_SESSION['login']);
if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href='../index.php'</script>";
}
?>


<?php
include('../koneksi.php');


if (isset($_POST['submit'])) {
    $id_siswa = $_GET['id'];
    $token = $_POST['token'];
    $sql = $conn->query("SELECT * FROM siswa WHERE id = '$id_siswa'");
    $get = $sql->fetch_assoc();
    $found = $sql->num_rows;
    $tkn = $get['token'];
    $id = $get['id'];
    $key = 2;

    for ($i = 0; $i < strlen($tkn); $i++) {
        $kode[$i] = ord($tkn[$i]);
        $b[$i] = ($kode[$i] - $key - $id) % 256;
        $c[$i] = chr($b[$i]);
    }

    $hsl = '';
    for ($i = 0; $i < strlen($tkn); $i++) {
        $hsl = $hsl . $c[$i];
    }

    //echo ($id_siswa . $hsl . '<br>' . $tkn . '<br>' . $token);

    if ($found >= 1 && $hsl == $token) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<script>alert('Token Benar');
         window.location.href='daftarNilai.php?id=$id_siswa'
         </script>";
    } else {
        echo "<script>alert('Token Salah');
         </script>";
    }
}

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
                <h6 class="m-0 font-weight-bold text-primary">Add Data Siswa
                    <a href="dataSiswa.php" class="btn btn-danger float-right">Back</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Token</label>
                            <input type="password" name="token" class="form-control" placeholder="Masukkan token" autocomplete="off" autofocus>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include 'footer.php'; ?>