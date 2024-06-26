<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == "register") {
        $mregister = "Akun berhasil dibuat, Silahkan Login";
    } else if ($_GET['message'] == "failed") {
        $mgagal = "Login Gagal, Silahkan masukkan Username atau Password dengan benar";
    } else if ($_GET['message'] == "logout") {
        $mlogout = "Anda telah logout";
    } else if ($_GET['message'] = "belum_login") {
        $mbelumlogin = "Silahkan login terlebih dahulu";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            position: relative;
            background: url(img/index-bg1.png);
            background-size: cover;
            background-attachment: scroll, fixed;
            min-height: calc(100vh - 4.5em);
            background-position: center center;
        }

        .login-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4267B2;
        }

        .login-form {
            width: 380px;
            height: 470px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin-top: 150px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4C6793;">
        <div class="container">
            <a class="navbar-brand" href=""><img src="img/index-icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                E-VAKSIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="login-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">LOGIN</h1>
                <hr>
                <p class="text-dark text-center">
                    <?php
                    if (isset($_GET['message'])) {
                        if ($_GET['message'] == "register") {
                            echo ($mregister);
                        } else if ($_GET['message'] == "failed") {
                            echo ($mgagal);
                        } else if ($_GET['message'] == "logout") {
                            echo ($mlogout);
                        } else if ($_GET['message'] = "belum_login") {
                            echo ($mbelumlogin);
                        }
                    }
                    ?>
                </p>
            </div>
            <div class="card-text">
                <form method="post" action="login_proses.php">
                    <div class="mb-3">
                        <input placeholder="Username" type="text" class="form-control" id="inputusername" aria-describedby="emailHelp" name="username">
                    </div>
                    <div class="mb-3">
                        <input placeholder="Password" type="password" class="form-control" id="inputpassword" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </form>
                <br>
                <h6 class="text-center">Belum Punya Akun?</h6>
                <center>
                    <a href="register.php" class="btn btn-success daftar">Daftar Akun</a>
                </center>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>