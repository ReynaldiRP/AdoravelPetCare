<?PHP
include '../config/connection.php';

$id_Transaksi = "";
$id_Detail = "";
$tgl_Transaksi = "";
$total_Harga = "";


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}
if ($action == "delete") {
    $id_Transaksi = $_GET['id_Transaksi'];
    $query = "CALL DEL_TRK('$id_Transaksi')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: transaksi.php");
    } else {
        echo "Gagal menghapus data";
    }
}
if (isset($_POST['insert'])) {
    $id_Transaksi = $_POST['id_Transaksi'];
    $id_Detail = $_POST['id_Detail'];
    $tgl_Transaksi = $_POST['tgl_Transaksi'];
    $total_Harga = $_POST['total_Bayar'];
    if ($action == "update") {
        $query = "CALL UPD_TRK('$id_Transaksi','$id_Detail','$tgl_Transaksi','$total_Harga')";
        $result = mysqli_query($conn, $query);
    } else {
        $query = "CALL ADD_TRK('$id_Transaksi','$id_Detail','$tgl_Transaksi','$total_Harga')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: transaksi.php");
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
                    <a href="jenis_layanan.php" class="nav-item nav-link"><i class="fa-solid fa-droplet me-2"></i>LAYANAN</a>
                    <a href="makanan_hewan.php" class="nav-item nav-link"><i class="fas fa-bone me-2"></i>MAKANAN</a>
                    <a href="detail_transaksi.php" class="nav-item nav-link"><i class="fas fa-sticky-note me-2"></i>DETAIL</a>
                    <a href="transaksi.php" class="nav-item nav-link active"><i class="far fa-file-alt me-2"></i>TRANSAKSI</a>
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
                            <h6 class="mb-4">Transaksi</h6>
                            <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input name="id_Transaksi" value="<?PHP echo $id_Transaksi ?>" type="text" class="form-control" id="floatingInput" placeholder="Id Layanan">
                                    <label for="floatingInput">Id Transaksi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select onchange="load_data3()" id="id_Detail" name="id_Detail" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="">Pilih Detail</option>
                                        <?PHP
                                        $query = "SELECT * FROM detail_transaksi";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['ID_DETAIL'] ?>" <?php if ($id_Detail === $row['ID_DETAIL']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?php echo $row['ID_DETAIL'] ?>
                                            </option>
                                            ?>
                                        <?PHP
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="tgl_Transaksi" value="<?PHP echo $tgl_Transaksi ?>" type="date" class="form-control" id="floatingPassword" placeholder="Harga Layanan">
                                    <label for="floatingPassword">Tanggal Transaksi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?PHP echo $total_Bayar ?>" id="total_Bayar" name="total_Bayar" type="number" class="form-control" placeholder="Harga Layanan">
                                    <label for="floatingPassword">Total Bayar</label>
                                </div>
                                <div class="form-floating mb-3 ">
                                    <button name="insert" type="submit" class="btn btn-primary m-1">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">TABEL TRANSAKSI</h6>
                            <div class="table-responsive">
                                <table class="table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id Transaksi</th>
                                            <th scope="col">Id Detail Transaksi</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <th scope="col">Total Bayar</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
                                        $query = "SELECT * FROM transaksi";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>';
                                            echo '<td>' . $row['ID_TRANSAKSI'] . '</td>';
                                            echo '<td>' . $row['ID_DETAIL'] . '</td>';
                                            echo '<td>' . $row['TANGGAL_TRANSAKSI'] . '</td>';
                                            echo '<td>' . $row['TOTAL_BAYAR'] . '</td>';
                                            echo "<td>";
                                            echo "<a href='report.php?action=cetak&id_Transaksi=" . $row['ID_TRANSAKSI'] . "' class='btn btn-primary m-1 btn-edit'>Cetak</a>";
                                            echo "<a href='transaksi.php?action=delete&id_Transaksi=" . $row['ID_TRANSAKSI'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ?\")' class='btn btn-danger btn-cetak m-1'>Delete</a>";
                                            echo "</td>";
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
    <script type="text/javascript">
        function load_data3() {
            var id_Detail = $("#id_Detail").val();
            $.ajax({
                url: "display_harga.php",
                method: "POST",
                data: {
                    total_Bayar: id_Detail
                },
                success: function(data) {
                    $("#total_Bayar").val(data);
                }
            });
        }
    </script>
</body>

</html>