<?php
$HOST = 'localhost';
$USER = 'root';
$PASS = '';
$DATABASE = 'adoravel_petcare';
$conn = mysqli_connect($HOST, $USER, $PASS, $DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Koneksi Berhasil";
}
