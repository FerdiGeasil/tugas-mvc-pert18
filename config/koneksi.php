<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_persediaan_mvc";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>