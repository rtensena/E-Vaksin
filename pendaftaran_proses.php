<?php
	include 'koneksi.php';
	
    $id_user         = $_POST['id_user'];
    $nik             = $_POST['nik'];
    $nama_lengkap	 = $_POST['nama_lengkap'];
    $jenis_kelamin	 = $_POST['jenis_kelamin'];
    $tanggal_lahir	 = $_POST['tanggal_lahir'];
    $umur	         = $_POST['umur'];
    $id_klinik	     = $_POST['klinik'];
    $kelurahan	     = $_POST['kelurahan'];
    $kecamatan	     = $_POST['kecamatan'];
    $kabupaten	     = $_POST['kabupaten'];
    $alamat	         = $_POST['alamat'];
    $no_ponsel	     = $_POST['no_ponsel'];
    $tanggal_vaksin	 = $_POST['tanggal_vaksin'];
    $id_waktu	     = $_POST['waktu_vaksin'];
    $id_jenis	     = $_POST['jenis_vaksin'];
    $id_dosis	     = $_POST['dosis'];
    
	$sql	= "INSERT INTO pendaftaran VALUES(id_pendaftaran,'$id_user','$nik','$nama_lengkap','$jenis_kelamin','$tanggal_lahir','$umur','$id_klinik','$kelurahan','$kecamatan','$kabupaten','$alamat','$no_ponsel','$tanggal_vaksin','$id_waktu','$id_jenis','$id_dosis')";

	$query	= mysqli_query($connect, $sql);

	if($query) {
		header("location: riwayat.php") ;
	} else{
		echo "Proses Input Data Gagal, Silahkan Coba Lagi";
	} 
?>