<?PHP
include '../config/connection.php';

$id_Pet = "";
$id_Owner = "";
$pet_Name = "";
$pet_Type = "";
$tgl_Regis = "";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}
if ($action == "update") {
    $id_Pet = $_GET['id_Pet'];
    $query = "SELECT * FROM pet_regis WHERE id_Pet = '$id_Pet'";
    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($result)) {
        $id_Pet = $data['ID_PET'];
        $id_Owner = $data['ID_OWNER'];
        $pet_Name = $data['PET_NAME'];
        $pet_Type = $data['JENIS_PET'];
        $tgl_Regis = $data['TANGGAL_REGIS'];
    }
}
if ($action == "delete") {
    $id_Pet = $_GET['id_Pet'];
    $query = "CALL DEL_PETREGIS('$id_Pet')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: pet_regis.php");
    } else {
        echo "Gagal menghapus data";
    }
}
if (isset($_POST['insert'])) {
    $id_Pet = $_POST['id_Pet'];
    $id_Owner = $_POST['id_Owner'];
    $pet_Name = $_POST['pet_Name'];
    $pet_Type = $_POST['jenis_Pet'];
    $tgl_Regis = $_POST['tgl_Regis'];
    if ($action == "update") {
        $query = "CALL UPD_PETREGIS('$id_Pet','$pet_Name','$pet_Type','$tgl_Regis')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: pet_regis.php");
        } else {
            echo "Gagal mengubah data";
        }
    } else {
        $query = "CALL ADD_PETREGIS('$id_Pet','$id_Owner','$pet_Name','$pet_Type','$tgl_Regis')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: pet_regis.php");
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
                    <a href="pet_regis.php" class="nav-item nav-link active"><i class="fa-solid fa-cat me-2"></i>PET REGIS</a>
                    <a href="pegawai.php" class="nav-item nav-link"><i class="fa-solid fa-user-pen me-2"></i>PEGAWAI</a>
                    <a href="jenis_layanan.php" class="nav-item nav-link"><i class="fa-solid fa-droplet me-2"></i>LAYANAN</a>
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
                            <h6 class="mb-4">PET REGIS</h6>
                            <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input name="id_Pet" type="text" class="form-control" id="floatingInput" placeholder="Id Pet" value="<?PHP echo $id_Pet ?>">
                                    <label for="floatingInput">Id Pet</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select id="id_Owner" name="id_Owner" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected value="">Nama Owner</option>
                                        <?PHP
                                        $query = "SELECT * FROM owner";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?PHP echo $row['ID_OWNER'] ?>" <?PHP if ($id_Owner === $row['ID_OWNER']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?PHP echo $row['NAMA_OWNER'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="pet_Name" type="text" class="form-control" id="floatingPassword" placeholder="Nama Pet" value="<?PHP echo $pet_Name ?>">
                                    <label for="floatingPassword">Nama Pet</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select name="jenis_Pet" class="form-select" id="floatingSelect" aria-label="Floating label select example" value="<?PHP echo $pet_Type ?>">
                                        <option selected>Jenis Pet</option>
                                        <option value="Kucing" <?PHP if ($pet_Type == "Kucing") echo 'selected = "selected"' ?>>Kucing</option>
                                        <option value="Anjing" <?PHP if ($pet_Type == "Anjing") echo 'selected = "selected"' ?>>Anjing</option>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating">
                                    <input name="tgl_Regis" type="date" class="form-control" id="floatingPassword" placeholder="Tanggal" value="<?PHP echo $tgl_Regis ?>">
                                    <label for="floatingPassword">Tanggal Regis</label>
                                </div>
                                <div class="form-floating mb-3 mt-3">
                                    <button id="insert" name="insert" type="submit" class="btn btn-primary m-1">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">TABEL PET REGIS</h6>
                            <div class="table-responsive">
                                <table class="table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id Pet</th>
                                            <th scope="col">Id Owner</th>
                                            <th scope="col">Nama Pet</th>
                                            <th scope="col">Jenis Pet</th>
                                            <th scope="col">Tanggal Regis</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
                                        $query = "SELECT * FROM pet_regis";
                                        $result = mysqli_query($conn, $query);
                                        while ($row_select = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row_select['ID_PET'] . "</td>";
                                            echo "<td>" . $row_select['ID_OWNER'] . "</td>";
                                            echo "<td>" . $row_select['PET_NAME'] . "</td>";
                                            echo "<td>" . $row_select['JENIS_PET'] . "</td>";
                                            echo "<td>" . $row_select['TANGGAL_REGIS'] . "</td>";
                                            echo "<td>";
                                            echo "<a href='pet_regis.php?action=update&id_Pet=" . $row_select['ID_PET'] . "' class='btn btn-primary m-1 btn-edit'>Edit</a>";
                                            echo "<a href='pet_regis.php?action=delete&id_Pet=" . $row_select['ID_PET'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ?\")' class='btn btn-danger m-1'>Delete</a>";
                                            echo "</td>";
                                            echo "</tr>";
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