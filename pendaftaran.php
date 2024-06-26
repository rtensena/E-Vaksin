<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location: login.php?message=belum_login");
}

include 'koneksi.php';

$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($connect, $sql);
?>
<?php
if (mysqli_num_rows($query)) {
    $data = mysqli_fetch_array($query);
    $_SESSION["id_user"] = $data["id_user"];
    $_SESSION["username"] = $data["username"];
    $_SESSION["password"] = $data["password"];
    $_SESSION["nama_lengkap"] = $data["nama_lengkap"];
    $_SESSION["nik"] = $data["nik"];
    $_SESSION["tanggal_lahir"] = $data["tanggal_lahir"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["no_ponsel"] = $data["no_ponsel"];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROFIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: whitesmoke;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #4C6793;">
        <div class="container">
            <a class="navbar-brand" href=""><img src="img/index-icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                E-VAKSIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat.php">Riwayat</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="img/user.png" alt="" width="20" height="18"> <?= $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profil.php">Pengaturan Akun</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah Anda yakin untuk logout?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tekan close untuk kembali
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a type="button" href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-5">
                <img src="img/bg-form.png" alt="">
            </div>
            <div class="col-6">
                <div class="row text-dark mt-4">
                    <div class="col-sm-12 g-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><img src="img/pendaftaran-icon.png" alt="Logo-Pendaftaran" width="26" height="24" class="d-inline-block align-text-top"> Formulir
                                    Pendaftaran Covid-19</h5>
                                <p style="color: rgb(255, 70, 70);">* Mohon isi data anda sesuai KTP</p>
                                <hr>
                                <form action="pendaftaran_proses.php" method="POST" class="row g-1">
                                    <?php
                                    include 'koneksi.php';
                                    $id_user = $_SESSION['id_user'];

                                    $sql    = "SELECT id_user FROM user where id_user = '$id_user'";
                                    $query    = mysqli_query($connect, $sql);
                                    
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <input type="hidden" value="<?= $data['id_user'] ?>" name="id_user">
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $_SESSION['nik'] ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $_SESSION['nama_lengkap'] ?>" required>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki - laki" value="laki - laki">
                                            <label class="form-check-label" for="laki - laki">Laki - laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $_SESSION['tanggal_lahir'] ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="umur" class="form-label">Umur</label>
                                        <input type="text" class="form-control" id="umur" name="umur" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="klinik" class="form-label">Pilih Klinik</label>
                                        <select class="form-select" aria-label="Default select example" name="klinik" required>
                                            <option selected>Tekan untuk menampilkan pilihan klinik</option>
                                            <?php
                                            include 'koneksi.php';
                                            $sql1 = "SELECT * FROM klinik";
                                            $query = mysqli_query($connect, $sql1);
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_klinik'] ?>"><?= $data['klinik'] ?></option>
                                            <?php $i++;
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kelurahan" class="form-label">Kelurahan</label>
                                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="no_ponsel" class="form-label">No. Ponsel</label>
                                        <input type="text" class="form-control" id="no_ponsel" name="no_ponsel" value="<?= $_SESSION['no_ponsel'] ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal_vaksin" class="form-label">Tanggal Vaksinasi</label>
                                        <input type="date" class="form-control" id="tanggal_vaksin" name="tanggal_vaksin" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="waktu_vaksin" class="form-label">Waktu Vaksinasi</label>
                                        <select class="form-select" aria-label="Default select example" name="waktu_vaksin" required>
                                            <option selected>Tekan untuk menampilkan pilihan waktu</option>
                                            <?php
                                            include 'koneksi.php';
                                            $sql1 = "SELECT * FROM waktu";
                                            $query = mysqli_query($connect, $sql1);
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_waktu'] ?>"><?= $data['waktu_mulai'] ?>-<?= $data['waktu_selesai'] ?></option>
                                            <?php $i++;
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="jenis_vaksin" class="form-label">Jenis Vaksin</label>
                                        <select class="form-select" aria-label="Default select example" name="jenis_vaksin" required>
                                            <option selected>Tekan untuk menampilkan jenis vaksin</option>
                                            <?php
                                            include 'koneksi.php';
                                            $sql1 = "SELECT * FROM jenis";
                                            $query = mysqli_query($connect, $sql1);
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_jenis'] ?>"><?= $data['jenis_vaksin'] ?></option>
                                            <?php $i++;
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="dosis" class="form-label">Dosis Vaksinasi</label>
                                        <select class="form-select" aria-label="Default select example" name="dosis" required>
                                            <option selected>Tekan untuk menampilkan pilihan dosis</option>
                                            <?php
                                            include 'koneksi.php';
                                            $sql1 = "SELECT * FROM dosis";
                                            $query = mysqli_query($connect, $sql1);
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_dosis'] ?>"><?= $data['dosis'] ?></option>
                                            <?php $i++;
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1" style="font-weight: lighter; color: rgb(255, 70, 70);">Data yang sudah diisi tidak dapat diubah</label>
                                    </div>
                                    <button class="btn btn-light text-light" style="background-color: #4C6793;">Daftar Vaksinasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>