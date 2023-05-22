<?php
include("Konfigurasi.php");

$jdpage = "List";
$pg = "dosenlist.php";
$footer = "";

$cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Gagal koneksi ke DBMS");

if (isset($_POST["act"])) {
    $act = $_POST["act"];
    switch ($act) {
        case "store":
            $nama = $_POST["txNAMA"];
            $nidn = $_POST["txNIDN"];
            $notelpon = $_POST["txNOTELPON"];
            $alamat = $_POST["txALAMAT"];
            
            $sql = "INSERT INTO tbdosen (nama, nidn, notelpon, alamat) VALUES ('$nama', '$nidn', '$notelpon', '$alamat');";
            $hasil = mysqli_query($cnn, $sql);
            if ($hasil) { 
                $footer = "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data Dosen berhasil ditambahkan',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            } else {
                $footer = "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Data Dosen gagal ditambahkan',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            }
            break;
        case "update":
            $nama = $_POST["txNAMA"];
            $nidn = $_POST["txNIDN"];
            $notelpon = $_POST["txNOTELPON"];
            $alamat = $_POST["txALAMAT"];
            $iddosen = $_POST["iddosen"];
            
            $sql = "UPDATE tbdosen SET nama='$nama', nidn='$nidn', notelpon='$notelpon', alamat='$alamat' WHERE iddosen='$iddosen';";
            $hasil = mysqli_query($cnn, $sql);
            if ($hasil) {
                $footer = "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data dosen berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            } else {
                $footer = "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Data dosen gagal diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            }
            break;
        case "destroy":
            $iddosen = $_POST['iddosen'];
            $sql = "DELETE FROM tbdosen WHERE iddosen='$iddosen';";
            $hasil = mysqli_query($cnn, $sql);
            if ($hasil) {
                $footer = "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data dosen berhasil dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            } else {
                $footer = "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Data dosen gagal dihapus',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            }
            break;
    }
}

if (isset($_GET["aksi"])) {
    $aksi = $_GET["aksi"];
    switch ($aksi) {
        case "new":
            $jdpage = "Tambah";
            $pg = "dosenbaru.php";
            break;
        case "edit":
            $jdpage = "Ubah";
            $pg = "dosenedit.php";
            break;
        case "del":
            $jdpage = "Hapus";
            $pg = "dosendel.php";
            break;
        default:
            $jdpage = "List";
            $pg = "dosenlist.php";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title><?=$jdpage?> - Data Dosen</title>
</head>
<body>
    <div class="container">
        <table class ="table table-striped table-hover mt-2">
        <h1><?=$jdpage?> Data Dosen</h1>
        <?php include($pg); ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    -->

    <?=$footer;?>
</body>
</html>
