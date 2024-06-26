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
  <title>Riwayat Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color: whitesmoke;">
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
            <a class="nav-link" href="pendaftaran.php">Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Riwayat</a>
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

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row mt-4">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><img src="img/riwayat-icon.png" alt="Logo-Profil" width="30" height="24" class="d-inline-block align-text-top">Riwayat Pendaftaran Vaksinasi</h5>
                <hr>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">NIK</th>
                      <th scope="col">Nama Lengkap</th>
                      <th scope="col">Klinik</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Waktu</th>
                      <th scope="col">Jenis Vaksin</th>
                      <th scope="col">Dosis</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <?php
                  include 'koneksi.php';
                  $id_user = $_SESSION['id_user'];

                  $sql = "SELECT * FROM pendaftaran INNER JOIN user ON pendaftaran.id_user = user.id_user INNER JOIN klinik ON pendaftaran.id_klinik = klinik.id_klinik INNER JOIN waktu ON pendaftaran.id_waktu = waktu.id_waktu INNER JOIN jenis ON pendaftaran.id_jenis = jenis.id_jenis INNER JOIN dosis ON pendaftaran.id_dosis = dosis.id_dosis WHERE pendaftaran.id_user=$id_user";
                  $query = mysqli_query($connect, $sql);
                  $i = 1;
                  while ($data = mysqli_fetch_array($query)) {
                  ?>
                    <tbody class="table-group-divider">
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['nama_lengkap'] ?></td>
                        <td><?= $data['klinik'] ?></td>
                        <td><?= $data['tanggal_vaksin'] ?></td>
                        <td><?= $data['waktu_mulai'] ?>-<?= $data['waktu_selesai'] ?></td>
                        <td><?= $data['jenis_vaksin'] ?></td>
                        <td><?= $data['dosis'] ?></td>
                        <td><a href="detail_riwayat.php?id_pendaftaran=<?= $data['id_pendaftaran'] ?>" class="btn btn-success">Lihat Detail</a></td>
                      </tr>
                    </tbody>
                  <?php $i++;
                  } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>