<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Persediaan Barang - MVC Prosedural</title>
</head>
<body>
    <h3>INPUT DATA BARANG (MVC Prosedural)</h3>

    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == "sukses") {
            echo "<p style='color:green;'><b>Data berhasil diproses dan disimpan!</b></p>";
        } elseif ($_GET['status'] == "invalid") {
            echo "<p style='color:orange;'><b>Data tidak valid! Pastikan semua kolom terisi dengan benar.</b></p>";
        } else {
            echo "<p style='color:red;'><b>Data gagal disimpan!</b></p>";
        }
    }
    ?>

    <form method="POST" action="controller/proses_barang.php">
        <table width="550" border="0" cellpadding="5">
            <tr>
                <td width="180">BARANG</td>
                <td>
                    <input type="text" name="nama_barang" size="35" placeholder="Contoh: Beras / Gula / Minyak / Susu" required />
                </td>
            </tr>
            <tr>
                <td>KATEGORI</td>
                <td>
                    <input type="radio" name="kategori" value="Makanan" required /> Makanan
                    <input type="radio" name="kategori" value="Pangan" /> Pangan
                    <input type="radio" name="kategori" value="Minuman" /> Minuman
                </td>
            </tr>
            <tr>
                <td>STOCK</td>
                <td><input type="number" name="stock" min="1" required /></td>
            </tr>
            <tr>
                <td>MASA PAKAI (HARI)</td>
                <td><input type="number" name="masa_pakai" min="0" placeholder="Contoh: 30" required /></td>
            </tr>
            <tr>
                <td>LOKASI SIMPAN</td>
                <td>
                    <select name="lokasi_simpan">
                        <option value="Lokasi 1">Lokasi 1</option>
                        <option value="Lokasi 2">Lokasi 2</option>
                        <option value="Lokasi 3">Lokasi 3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="proses" value="PROSES" /></td>
            </tr>
        </table>
    </form>

    <hr>
    <h3>OUTPUT DATA PERSEDIAAN</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>KODE BARANG</th>
            <th>NAMA BARANG</th>
            <th>KATEGORI</th>
            <th>STOCK</th>
            <th>HARGA SATUAN</th>
            <th>LOKASI SIMPAN</th>
            <th>NILAI PERSEDIAAN</th>
            <th>TANGGAL EXPIRED</th>
        </tr>
        <?php
        $total_persediaan = 0;
        while ($data = mysqli_fetch_array($hasil)) {
            $total_persediaan += $data['nilai_persediaan'];
            echo "<tr>";
            echo "<td>" . $data['kode_barang'] . "</td>";
            echo "<td>" . $data['nama_barang'] . "</td>";
            echo "<td>" . $data['kategori'] . "</td>";
            echo "<td>" . $data['stock'] . "</td>";
            echo "<td>Rp " . number_format($data['harga_satuan'], 0, ',', '.') . "</td>";
            echo "<td>" . $data['lokasi_simpan'] . "</td>";
            echo "<td>Rp " . number_format($data['nilai_persediaan'], 0, ',', '.') . "</td>";
            echo "<td>" . $data['tgl_expired'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h4>TOTAL PERSEDIAAN : Rp <?php echo number_format($total_persediaan, 0, ',', '.'); ?></h4>
</body>
</html>