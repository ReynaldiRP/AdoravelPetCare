<?PHP
include '../config/connection.php';

$id_Layanan = "";
$id_Pet = "";
$id_Pegawai = "";
$nama_Layanan = "";
$harga_Layanan = "";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

if ($action == "update") {
    $id_Layanan = $_GET['id_Layanan'];
    $query = "SELECT * FROM jenis_layanan WHERE id_Layanan = '$id_Layanan'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $id_Layanan = $row['ID_LAYANAN'];
    $id_Pet = $row['ID_PET'];
    $id_Pegawai = $row['ID_PEGAWAI'];
    $nama_Layanan = $row['NAMA_LAYANAN'];
    $harga_Layanan = $row['HARGA_LAYANAN'];
}
if ($action == "delete") {
    $id_Layanan = $_GET['id_Layanan'];
    $query = "CALL DEL_JENIS_LAYANAN('$id_Layanan')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: jenis_layanan.php");
    } else {
        echo "Gagal menghapus data";
    }
}
if (isset($_POST['insert'])) {
    $id_Layanan = $_POST['id_Layanan'];
    $id_Pet = $_POST['id_Pet'];
    $id_Pegawai = $_POST['id_Pegawai'];
    $nama_Layanan = $_POST['nama_Layanan'];
    $harga_Layanan = $_POST['harga_Layanan'];
    if ($action == "update") {
        $query = "CALL UPD_JENIS_LAYANAN('$id_Layanan','$nama_Layanan','$harga_Layanan')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: jenis_layanan.php");
        } else {
            echo "Gagal mengubah data";
        }
    } else {
        $query = "CALL ADD_JENIS_LAYANAN('$id_Layanan','$id_Pet','$id_Pegawai','$nama_Layanan','$harga_Layanan')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: jenis_layanan.php");
        } else {
            echo "Gagal menambah data";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h4 class="text-primary">
                        adoravelpetcare
                    </h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../resource/people.jpg" alt="" style="width: 40px; height: 40px" />
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Michael</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin.php" class="nav-item nav-link"><i class="fa-solid fa-user me-2"></i>OWNER</a>
                    <a href="pet_regis.php" class="nav-item nav-link"><i class="fa-solid fa-cat me-2"></i>PET REGIS</a>
                    <a href="pegawai.php" class="nav-item nav-link"><i class="fa-solid fa-user-pen me-2"></i>PEGAWAI</a>
                    <a href="jenis_layanan.php" class="nav-item nav-link active"><i class="fa-solid fa-droplet me-2"></i>LAYANAN</a>
                    <a href="makanan_hewan.php" class="nav-item nav-link"><i class="fas fa-bone me-2"></i>MAKANAN</a>
                    <a href="detail_transaksi.php" class="nav-item nav-link"><i class="fas fa-sticky-note me-2"></i>DETAIL</a>
                    <a href="transaksi.php" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>TRANSAKSI</a>
                </div>
            </nav>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href=".dropdown-menu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../resource/people.jpg" alt="" style="width: 40px; height: 40px" />
                            <span class="d-none d-lg-inline-flex">Michael</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="login.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container-fluid pt-4 px-3">
                <div class="row g-4">
                    <div>
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Layanan</h6>
                            <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input name="id_Layanan" type="text" class="form-control" id="floatingInput" placeholder="Id Layanan" value="<?PHP echo $id_Layanan ?>">
                                    <label for="floatingInput">Id Layanan</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select id="id_Pet" name="id_Pet" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="<?PHP echo $id_Pet ?>">Pilih id Pet</option>
                                        <?php
                                        $sql = "SELECT * FROM pet_regis";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['ID_PET'] ?>" <?php if ($id_Pet === $row['ID_PET']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?php echo $row['PET_NAME'] ?>
                                            </option>
                                            ?>
                                        <?PHP
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="id_Pegawai" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected value="<?PHP echo $id_Pegawai ?>">Pilih id Pegawai</option>
                                        <?php
                                        $sql = "SELECT * FROM pegawai";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['ID_PEGAWAI'] ?>" <?php if ($id_Pegawai === $row['ID_PEGAWAI']) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                <?php echo $row['NAMA_PEGAWAI'] ?>
                                            </option>
                                            ?>
                                        <?PHP
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="nama_Layanan" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="<?PHP echo $nama_Layanan ?>">Pilih nama Layanan</option>
                                        <?php
                                        $nama_Layanan_Hewan = array("Regular Wash", "Medicated Wash", "Flea & tick Wash");
                                        foreach ($nama_Layanan_Hewan as $value) {
                                        ?>
                                            <option value="<?php echo $value ?>" <?php if ($nama_Layanan === $value) {
                                                                                        echo 'selected = "selected"';
                                                                                    } ?>>
                                                <?php echo $value ?>
                                            </option>
                                            ?>
                                        <?PHP
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="harga_Layanan" name="harga_Layanan" type="number" class="form-control" id="floatingPassword" placeholder="Harga Layanan" value="<?PHP echo $harga_Layanan ?>">
                                    <label for="floatingPassword">Harga Layanan</label>
                                </div>
                                <div class="form-floating mb-3 ">
                                    <button name="insert" type="submit" class="btn btn-primary m-1">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">TABEL LAYANAN</h6>
                            <div class="table-responsive">
                                <table class="table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id Layanan</th>
                                            <th scope="col">Id Pet</th>
                                            <th scope="col">Id Pegawai</th>
                                            <th scope="col">Nama Layanan</th>
                                            <th scope="col">Harga Layanan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM jenis_layanan";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>';
                                            echo '<td>' . $row['ID_LAYANAN'] . '</td>';
                                            echo '<td>' . $row['ID_PET'] . '</td>';
                                            echo '<td>' . $row['ID_PEGAWAI'] . '</td>';
                                            echo '<td>' . $row['NAMA_LAYANAN'] . '</td>';
                                            echo '<td>' . $row['HARGA_LAYANAN'] . '</td>';
                                            echo '<td>';
                                            echo "<a href='jenis_layanan.php?action=update&id_Layanan=" . $row['ID_LAYANAN'] . "' class='btn btn-primary m-1 btn-edit'>Edit</a>";
                                            echo "<a href='jenis_layanan.php?action=delete&id_Layanan=" . $row['ID_LAYANAN'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ?\")' class='btn btn-danger m-1'>Delete</a>";
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-3">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">adoravelpetcare</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>