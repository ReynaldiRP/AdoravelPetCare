<?PHP
include '../config/connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @page {
            @bottom-right {
                content: counter(page) " of "counter(pages);
            }
        }
    </style>
</head>

<body>
    <div class="container" style="page-break-before: always;">
        <h4>Report Transaksi</h4>
        <table class="table table-bordered table-condensed" onclick="window.print()">
            <tbody>

                <tr>
                    <td>
                        <h6>
                            <strong>ID Transaksi</strong>
                        </h6>
                        <?PHP
                        if (isset($_GET['id_Transaksi'])) {
                            $id = $_GET['id_Transaksi'];
                            $query = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['ID_TRANSAKSI'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>ID Detail</strong>
                        </h6>
                        <?PHP
                        if (isset($_GET['id_Transaksi'])) {
                            $id = $_GET['id_Transaksi'];
                            $query = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['ID_DETAIL'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Tanggal Transaksi</strong>
                        </h6>
                        <?PHP
                        if (isset($_GET['id_Transaksi'])) {
                            $id = $_GET['id_Transaksi'];
                            $query = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['TANGGAL_TRANSAKSI'];
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h6>
                            <strong>Total Bayar</strong>
                        </h6>
                        <?PHP
                        if (isset($_GET['id_Transaksi'])) {
                            $id = $_GET['id_Transaksi'];
                            $query = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['TOTAL_BAYAR'];
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
</body>

</html>