<?php
include 'koneksi.php';

$id_user       = $_POST['id_user'];
$nama_lengkap  = $_POST['nama_lengkap'];
$nik           = $_POST['nik'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$email	       = $_POST['email'];
$no_ponsel	   = $_POST['no_ponsel'];

$sql = "UPDATE user SET nama_lengkap='$nama_lengkap', nik ='$nik', tanggal_lahir='$tanggal_lahir', email='$email', no_ponsel='$no_ponsel' WHERE id_user='$id_user'";
$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

if ($query)
    header("location: profil.php");
else
    echo ("Proses Edit Data Gagal, Silahkan Coba Lagi");
