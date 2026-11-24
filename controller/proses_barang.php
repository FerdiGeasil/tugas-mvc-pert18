<?php
require_once __DIR__ . '/../config/koneksi.php';
require_once __DIR__ . '/../model/m_barang.php';

if (isset($_POST['proses'])) {
    $nama_barang   = trim($_POST['nama_barang']);
    $kategori      = isset($_POST['kategori']) ? $_POST['kategori'] : '';
    $stock         = (int) $_POST['stock'];
    $masa_pakai    = (int) $_POST['masa_pakai'];
    $lokasi_simpan = $_POST['lokasi_simpan'];

    if ($nama_barang == "" || $kategori == "" || $stock <= 0 || $masa_pakai < 0) {
        header("Location: ../index.php?status=invalid");
        exit;
    }

    $cek_nama = strtolower($nama_barang);
    if ($cek_nama == "beras") {
        $harga_satuan = 15000;
    } elseif ($cek_nama == "gula") {
        $harga_satuan = 17500;
    } elseif ($cek_nama == "minyak") {
        $harga_satuan = 18000;
    } elseif ($cek_nama == "mie instan") {
        $harga_satuan = 3500;
    } elseif ($cek_nama == "susu") {
        $harga_satuan = 12000;
    } else {
        $harga_satuan = 10000;
    }

    $nilai_persediaan = $stock * $harga_satuan;

    $nama_bersih = str_replace(' ', '', $nama_barang);
    $xx = strtoupper(substr($nama_bersih, 0, 1) . substr($nama_bersih, -1, 1));
    $yy = strtoupper(substr($kategori, 0, 2));
    $z  = substr((string)$stock, -1, 1);
    $kode_barang = $xx . "-" . $yy . "-" . $z;

    $tgl_expired = date('Y-m-d', strtotime("+$masa_pakai days"));

    if (simpanBarang($con, $kode_barang, $nama_barang, $kategori, $stock, $harga_satuan, $lokasi_simpan, $nilai_persediaan, $tgl_expired)) {
        header("Location: ../index.php?status=sukses");
    } else {
        header("Location: ../index.php?status=gagal");
    }
    exit;
}

function prosesTampil($con) {
    return tampilBarang($con);
}
?>