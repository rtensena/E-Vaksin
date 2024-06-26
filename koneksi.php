<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "pendaftaran_vaksin";

$connect = new mysqli($hostname, $username, $password, $db);

if ($connect->connect_error) {
    die("Maaf, Koneksi Anda Gagal : " . $connect->connect_error);
}
?>