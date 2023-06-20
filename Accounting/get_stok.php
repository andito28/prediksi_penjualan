<?php
// Ambil koneksi ke database
include "koneksi.php";

// Periksa apakah ada permintaan POST dengan nama_barang
if (isset($_POST['nama_barang'])) {
    $nama_barang = $_POST['nama_barang'];

    // Query untuk mendapatkan data stok berdasarkan nama barang
    $query_stok = "SELECT * FROM tbl_stok WHERE nama_barang = '$nama_barang'";
    $result_stok = mysqli_query($connect, $query_stok);

    $no = 1;
    while ($row_stok = mysqli_fetch_array($result_stok)) {
        $bulan = $row_stok['bulan'];
        $stok = $row_stok['total_stok'];

        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$bulan</td>";
        echo "<td>$stok</td>";
        echo "</tr>";

        $no++;
    }
}

