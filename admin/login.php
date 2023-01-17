<?PHP
require_once '../config/connection.php';

if (isset($_POST['USERNAME'])) {
    $UNAME = $_POST['USERNAME'];
    $PASS = $_POST['PASSWORD'];

    $query = "SELECT * FROM login WHERE USERNAME = '$UNAME' AND PASSWORD = '$PASS'";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo '<meta http-equiv="refresh" content="0; url=../admin/admin.php">';
    } else {
        echo "<script>alert('Username atau Password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style_landing.css" />
    <link rel="stylesheet" type="text/css" href="../css/style_login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(to left, #e9e94a, #f4e06d)">
        <div class="container-md">
            <a href="#home">
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
                        <img src="../resource/undraw_welcome_cats_thqn.png" class="img-fluid" alt="Phone image" />
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form method="POST" action="">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example13">Username</label>
                                <input type="text" name="USERNAME" id="form1Example13" class="form-control form-control-lg" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form1Example23">Password</label>
                                <input type="password" name="PASSWORD" id="form1Example23" class="form-control form-control-lg" />
                            </div>

                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                    <label class="form-check-label" for="form1Example3">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!">Forgot password?</a>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block Sign_in">
                                Masuk
                            </button>
                            <button type="button" class="btn btn-secondary btn-lg btn-block Sign_up ms-3">
                                <a href="daftar.php"> Daftar</a>
                            </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script>

    </script>
</body>

</html>