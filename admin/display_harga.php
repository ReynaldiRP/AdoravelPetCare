<?PHP
include '../config/connection.php';
if (isset($_POST['harga_Layanan'])) {
    $id_Layanan = $_POST['harga_Layanan'];
    $fectData = fetchDataByID($id_Layanan);
    displayData($fectData);
}
function fetchDataByID($id_Layanan)
{
    global $conn;
    $sql = "SELECT HARGA_LAYANAN FROM jenis_layanan WHERE ID_LAYANAN = '$id_Layanan'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function displayData($fectData)
{
    echo $fectData['HARGA_LAYANAN'];
}
if (isset($_POST['harga_Makanan'])) {
    $id2 = $_POST['harga_Makanan'];
    $fectData2 = fetchDataByID2($id2);
    displayData2($fectData2);
}
function fetchDataByID2($id2)
{
    global $conn;
    $sql = "SELECT HARGA_MAKANAN FROM makanan_hewan WHERE ID_MAKANAN = '$id2'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function displayData2($fectData2)
{
    echo $fectData2['HARGA_MAKANAN'];
}
if (isset($_POST['total_Bayar'])) {
    $id3 = $_POST['total_Bayar'];
    $fectData3 = fetchDataByID3($id3);
    displayData3($fectData3);
}
function fetchDataByID3($id3)
{
    global $conn;
    $sql = "SELECT TOTAL_BAYAR, HARGA_MAKANAN FROM  detail_transaksi WHERE ID_DETAIL = '$id3'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function displayData3($fectData3)
{
    echo $fectData3['TOTAL_BAYAR'];
}
