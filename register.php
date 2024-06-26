<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTER PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            width: 450px;
            height: 550px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin-top: 70px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4C6793;">
        <div class="container">
            <a class="navbar-brand" href=""><img src="img/index-icon.png" alt="Logo" width="30" height="24"
                    class="d-inline-block align-text-top">
                E-VAKSIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="login-container">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">DAFTAR AKUN</h3>
                <hr>
            </div>
            <div class="card-text">
                <form method="post" action="register_proses.php">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="inputusername"
                            aria-describedby="emailHelp" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputpassword"
                            name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Daftar</button>
                    </div>
                </form>
                <br>
                <h6 class="text-center">Sudah Punya Akun?</h6>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <a href="login.php" class="btn btn-primary d-block">Login</a>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>