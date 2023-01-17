<?PHP
require_once '../config/connection.php';
if (isset($_POST['submit'])) {
    $username = $_POST['nama'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        echo "<script>alert('Data tidak boleh kosong!');</script>";
    } else {
        $query = "CALL ADD_LOGIN('$username','$password')";
        $hasil = mysqli_query($conn, $query);
        if ($hasil) {
            echo "<script>alert('Data berhasil ditambahkan!');</script>";
            echo 'meta http-equiv="refresh" content="0;url=../admin/login.php"';
        } else {
            echo "<script>alert('Data gagal ditambahkan!');</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style_landing.css" />
    <link rel="stylesheet" type="text/css" href="../css/style_login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(to left, #e9e94a, #f4e06d)">
        <div class="container-md">
            <a href="../User/index.html">
                <img id="nav-img" src="../resource/Cat_and_Dog_logo-removebg-preview.png" alt="logo" class="d-inline-block align-text-top fw-bold" /> </a><b>adorávelpetcare</b>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar1">
                    <li class="nav-item">
                        <a class="nav-link layanan" href="../user/index.html">Jenis Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/index.html">Makanan Hewan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid banner">
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="../resource/undraw_Dog_walking_re_l61p.png" class="img-fluid" alt="Phone image" />
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form method="POST" action="">
                            <!-- Email input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form1Example13">Username</label>
                                <input name="nama" type="text" id="form1Example13" class="form-control form-control-lg" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form1Example23">Password</label>
                                <input name="password" type="password" id="form1Example23" class="form-control form-control-lg" />
                            </div>

                            <!-- Submit button -->
                            <div class="">
                                <button name="insert" type="submit" class="btn btn-primary btn-lg btn-block mt-3">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="bg-light text-center text-lg-start footer">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="text-dark" href="./index.html">adorávelpetcare</a>
        </div>
    </footer>
</body>

</html>