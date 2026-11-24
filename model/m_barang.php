<?php
function simpanBarang($con, $kode, $nama, $kategori, $stock, $harga, $lokasi, $nilai, $expired) {
    $sql = "INSERT INTO tb_barang (kode_barang, nama_barang, kategori, stock, harga_satuan, lokasi_simpan, nilai_persediaan, tgl_expired) 
            VALUES ('$kode', '$nama', '$kategori', $stock, $harga, '$lokasi', $nilai, '$expired')";
    $hasil = mysqli_query($con, $sql);
    return $hasil;
}

function tampilBarang($con) {
    $sql = "SELECT * FROM tb_barang ORDER BY id ASC";
    $hasil = mysqli_query($con, $sql);
    return $hasil;
}
?>