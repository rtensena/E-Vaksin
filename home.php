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
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        #tentang {
            padding: 70px 100px;
            margin: auto;
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
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pendaftaran.php">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat.php">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
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

    <div class="container-fluid bg-light text-dark">
        <!-- Carousel Start -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/carousel6.jpg" class="d-block w-100" alt="..." style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption">
                        <h5>Vaksin Covid-19</h5>
                        <p>Sudahkah Anda vaksin? Segera daftarkan diri Anda.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel2.jfif" class="d-block w-100" alt="..." style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption">
                        <h5>Pemeriksaan Rutin</h5>
                        <p>Periksakan kondisi kesehatan Anda secara rutin.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel3.jpg" class="d-block w-100" alt="..." style="height: 500px; object-fit: cover;">
                    <div class="carousel-caption">
                        <h5>Hand Sanitizer</h5>
                        <p>Lindungi diri Anda dengan cara rajin menjaga kebersihan diri.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel End -->

        <div class="row text-center align-items-center mt-4">
            <div class="col-12">
                <img src="img/home-logo.png" width="250" height="150" />
                <h2 class="mt-2">💉E-VAKSIN💉</h2>
                <i>Platform Pendaftaran <span style="color:rgb(65, 220, 255)">Vaksin</span> Terpercaya Se-Indonesia</i>
            </div>
        </div>
        <div class="row text-dark mt-4">
            <div class="col-sm-4 g-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pendaftaran Vaksin Baru</h5>
                        <p class="card-text">Pentingnya Vaksinasi Untuk Membantu Mencegah Penyebaran Covid-19. Dapatkan
                            Vaksin Segera!</p>
                        <a href="pendaftaran.php" class="btn btn-light d-block text-light" style="background-color: #898AA6;">Daftar Disini</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 g-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Riwayat & Tiket Vaksin</h5>
                        <p class="card-text">Periksa Status Data Anda Dalam Program Vaksinasi Covid-19 Di E-Vaksin.</p>
                        <a href="riwayat.php" class="btn btn-light d-block text-light" style="background-color: #898AA6;">Lihat Riwayat & Tiket</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 g-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Profil Anda</h5>
                        <p class="card-text">Lihat dan lengkapi profil Anda agar dapat memudahkan dalam melakukan pendaftaran vaksinasi Covid-19.
                        </p>
                        <a href="profil.php" class="btn btn-light d-block text-light" style="background-color: #898AA6;">Lihat Profil</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="tentang">
            <h1 class="text-center" id="about" style="color: #42597e;">TENTANG</h1>
            <div class="row mt-5" style="background-color: rgb(240, 240, 240);">
                <div class="col-4">
                    <h1 class="" style="color: #4C6793;">Apa Itu</h1>
                    <h1 class="" style="color: #4C6793;">E-Vaksin?</h1>
                </div>
                <div class="col-8">
                    <p>E-Vaksin adalah platform berbasis website yang dikembangkan untuk membantu masyarakat Indonesia
                        dalam melakukan pendaftaran vaksinasi untuk menghentikan penyebaran Coronavirus Disease
                        (COVID-19).</p>
                    <p>Platform ini mengandalkan partisipasi masyarakat untuk mendaftarkan dirinya dalam rangka 
                        menyukseskan program pemerintah Indonesia yaitu program vaksinasi Covid-19 agar penyebaran virus 
                        dapat segera dihentikan.</p>
                    <p>Masyarakat yang terdaftar juga dapat membantu dalam melakukan pelacakan penyebaran dan pemerataan 
                        vaksinasi Covid-19 dengan cara tracking data diri mereka yang sudah di daftarkan pada platform ini.</p>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-4">
                    <h1 style="color: #4C6793;">Vaksinasi</h1>
                    <h1 style="color: #4C6793;">Covid-19</h1>
                </div>
                <div class="col-8">
                    <p>Pada tahap awal, vaksinasi Covid-19 sudah berhasil diberikan kepada seluruh tenaga kesahatan,
                        asisten
                        tenaga kesehatan, dan mahasiswa yang menjalankan pendidikan profesi kedokteran yang bekerja pada
                        fasilitas pelayanan kesehatan.</p>
                    <p>Vaksin tahap kedua juga sudah diberikan kepada lansia, pekerja sektor esensial, dan guru.</p>
                    <p>Pemerataan vaksinasi hingga saat ini dilanjutkan untuk masyarakat umum dan terus berjalan hingga
                        berhasil menjangkau seluruh warga negara Indonesia dan warga negara asing yang bertempat tinggal
                        di
                        Indonesia.</p>
                    <p>Harapannya dengan upaya pemerataan vaksinasi ini, Indonesia dapat segera bangkit dan terbebas
                        dari
                        penyebaran virus Covid-19.</p>
                </div>
            </div>
            <hr>
            <p>© E-Vaksin. All rights reserved.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>