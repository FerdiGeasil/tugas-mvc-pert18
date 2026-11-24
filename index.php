<?php
require_once "controller/proses_barang.php";

$hasil = prosesTampil($con);

require_once "view/v_barang.php";
?>