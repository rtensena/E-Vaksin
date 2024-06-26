<?php
include 'koneksi.php';
$id_pendaftaran = $_GET['id_pendaftaran'];

$sql = "DELETE FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'";
$query = mysqli_query($connect, $sql);

if ($query)
    header("location: riwayat.php");
else
    echo ("Proses Hapus Data Gagal, Silahkan Coba Lagi");
?>