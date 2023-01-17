<?PHP
include '../config/connection.php';

$id_Detail = "";
$id_Layanan = "";
$harga_Layanan = "";
$id_Makanan = "";
$jumlah_Pesanan = "";
$harga_Makanan = "";
$total_Bayar = "";


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

if ($action == "update") {
    $id_Detail = $_GET['id_Detail'];
    $query = "SELECT * FROM detail_transaksi WHERE id_Detail = '$id_Detail'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $id_Detail = $row['ID_DETAIL'];
    $id_Layanan = $row['ID_LAYANAN'];
    $harga_Layanan = $row['HARGA_LAYANAN'];
    $id_Makanan = $row['ID_MAKANAN'];
    $jumlah_Pesanan = $row['JUMLAH_PESAN_MAKANAN'];
    $harga_Makanan = $row['HARGA_MAKANAN'];
    $total_Bayar = $row['TOTAL_BAYAR'];
}
if ($action == "delete") {
    $id_Detail = $_GET['id_Detail'];
    $query = "CALL DEL_DTL_TRK('$id_Detail')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: detail_transaksi.php");
    } else {
        echo "Gagal menghapus data";
    }
}
if (isset($_POST['insert'])) {
    $id_Detail = $_POST['id_Detail'];
    $id_Layanan = $_POST['id_Layanan'];
    $harga_Layanan = $_POST['harga_Layanan'];
    $id_Makanan = $_POST['id_Makanan'];
    $jumlah_Pesanan = $_POST['jumlah_Pesanan'];
    $harga_Makanan = $_POST['harga_Makanan'];
    $total_Bayar = $_POST['total_Bayar'];
    if ($action == "update") {
        $query = "CALL UPD_DTL_TRK('$id_Detail','$id_Layanan','$harga_Layanan','$id_Makanan','$jumlah_Pesanan','$harga_Makanan','$total_Bayar')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: detail_transaksi.php");
        } else {
            echo "Gagal mengubah data";
        }
    } else {
        $query = "CALL ADD_DTL_TRK('$id_Detail','$id_Layanan','$harga_Layanan','$id_Makanan','$jumlah_Pesanan','$harga_Makanan','$total_Bayar')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: detail_transaksi.php");
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
                    <a href="detail_transaksi.php" class="nav-item nav-link active"><i class="fas fa-sticky-note me-2"></i>DETAIL</a>
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
                    <!-- <input class="form-control bg-dark border-0" type="search" placeholder="Search" /> -->
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
                            <h6 class="mb-4">Detail Transaksi</h6>
                            <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input name="id_Detail" value="<?PHP echo $id_Detail ?>" type="text" class="form-control" id="floatingInput" placeholder="Id Layanan">
                                    <label for="floatingInput">Id Detail</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select onchange="load_data()" id="id_Layanan" name="id_Layanan" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="">Pilih Layanan</option>
                                        <?PHP
                                        $query = "SELECT * FROM jenis_layanan";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option harga_Layanan="<?PHP echo $row['ID_LAYANAN'] ?>" value="<?PHP echo $row['ID_LAYANAN'] ?>" <?PHP if ($id_Layanan === $row['ID_LAYANAN']) {
                                                                                                                                                    echo "selected";
                                                                                                                                                } ?>>
                                                <?PHP echo $row['NAMA_LAYANAN'] ?>
                                            </option>
                                        <?PHP
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="harga_Layanan" name="harga_Layanan" value="<?PHP $harga_Layanan ?>" type="number" class="form-control" id="floatingInput" placeholder="harga layanan">
                                    <label for="floatingInput">Harga Layanan</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select onchange="load_data2()" id="id_Makanan" name="id_Makanan" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option value="">Pilih Makanan</option>
                                        <?PHP
                                        $query = "SELECT * FROM makanan_hewan";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?PHP echo $row['ID_MAKANAN'] ?>" <?PHP if ($id_Makanan === $row['ID_MAKANAN']) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                <?PHP echo $row['JENIS_MAKANAN'] ?>
                                            </option>
                                        <?PHP
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Silahkan Pilih</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input onkeyup="myfunction()" id="jumlah_Pesanan" value="<?PHP echo $jumlah_Pesanan ?>" name="jumlah_Pesanan" type="number" class="form-control" placeholder="Nama Layanan">
                                    <label for="floatingPassword">Jumlah Pesanan Makanan</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="harga_Makanan" value="<?PHP echo $harga_Makanan ?>" name="harga_Makanan" type="number" class="form-control" placeholder="Nama Layanan">
                                    <label for="floatingPassword">Harga Makanan</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?PHP echo $total_Bayar ?>" id="total_Bayar" name="total_Bayar" value="" type="number" class="form-control" placeholder="Harga Layanan">
                                    <label for="floatingPassword">Total Bayar</label>
                                </div>
                                <div class="form-floating mb-3 ">
                                    <button id="insert" name="insert" type="submit" class="btn btn-primary m-1">
                                        Tambah
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">TABEL DETAIL TRANSAKSI</h6>
                            <div class="table-responsive">
                                <table class="table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id Detail</th>
                                            <th scope="col">Id Layanan</th>
                                            <th scope="col">Harga Layanan</th>
                                            <th scope="col">Id Makanan</th>
                                            <th scope="col">Jumlah Pesanan</th>
                                            <th scope="col">Harga Makanan</th>
                                            <th scope="col">Total Bayar</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
                                        $query = "SELECT * FROM detail_transaksi";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>';
                                            echo '<td>' . $row['ID_DETAIL'] . '</td>';
                                            echo '<td>' . $row['ID_LAYANAN'] . '</td>';
                                            echo '<td>' . $row['HARGA_LAYANAN'] . '</td>';
                                            echo '<td>' . $row['ID_MAKANAN'] . '</td>';
                                            echo '<td>' . $row['JUMLAH_PESAN_MAKANAN'] . '</td>';
                                            echo '<td>' . $row['HARGA_MAKANAN'] . '</td>';
                                            echo '<td>' . $row['TOTAL_BAYAR'] . '</td>';
                                            echo "<td>";
                                            echo "<a href='detail_transaksi.php?action=update&id_Detail=" . $row['ID_DETAIL'] . "' class='btn btn-primary m-1 btn-edit'>Edit</a>";
                                            echo "<a href='detail_transaksi.php?action=delete&id_Detail=" . $row['ID_DETAIL'] . "' onclick='return confirm(\"Apakah anda yakin ingin menghapus data ?\")' class='btn btn-danger m-1'>Delete</a>";
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
    <script type="text/javascript">
        var load_data = function() {
            var id = $('#id_Layanan').val();
            $.ajax({
                url: 'display_harga.php',
                type: 'POST',
                data: {
                    harga_Layanan: id
                },
                dataType: 'html',
                success: function(response) {
                    $('#harga_Layanan').val(response);
                }
            });
        };
        var load_data2 = function() {
            var id2 = $('#id_Makanan').val();
            $.ajax({
                url: 'display_harga.php',
                type: 'POST',
                data: {
                    harga_Makanan: id2
                },
                dataType: 'html',
                success: function(response) {
                    $('#harga_Makanan').val(response);
                }
            });
        };
    </script>
    <script type="text/javascript">
        function myfunction() {
            var harga_layanan = $('#harga_Layanan').val();
            var harga_makanan = $('#harga_Makanan').val();
            var jumlah_pesanan = $('#jumlah_Pesanan').val();
            var total_bayar = parseInt(harga_layanan) + parseInt(harga_makanan * jumlah_pesanan);
            $('#total_Bayar').val(total_bayar);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>