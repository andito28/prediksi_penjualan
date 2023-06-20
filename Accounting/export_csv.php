<?php

// Periksa apakah parameter 'nama_barang' dikirimkan melalui URL
if (isset($_GET['nama_barang'])) {
    $nama_barang = $_GET['nama_barang'];
} else {
    // Jika tidak ada parameter 'nama_barang', berikan nilai default atau ambil dari form jika tersedia
    $nama_barang = 'Nama Barang Default'; // Ubah dengan nilai default yang sesuai
    if (isset($_POST['nama_barang'])) {
        $nama_barang = $_POST['nama_barang'];
    }
}
// Query untuk mendapatkan data tabel
$query = "SELECT s.bulan, s.total_stok, COALESCE(SUM(p.jumlah), 0) AS total_terjual, s.tahun 
          FROM tbl_stok s 
          LEFT JOIN tbl_penjualan p ON s.nama_barang = p.nama_barang AND MONTH(p.tanggal_transaksi) = s.bulan
          WHERE s.nama_barang = '$nama_barang'
          GROUP BY s.bulan, s.total_stok, s.tahun";
$result = mysqli_query($connect, $query);

// Membuat file CSV
$filename = "data_rekap.csv";
$file = fopen($filename, 'w');

// Menulis header kolom pada file CSV
$header = array('No', 'Bulan', 'Stok', 'Terjual', 'Tahun');
fputcsv($file, $header);

// Menulis data dari hasil query ke file CSV
$no = 1;
while ($row = mysqli_fetch_array($result)) {
    $bulan = date("F", mktime(0, 0, 0, $row['bulan'], 1));
    $data = array($no, $bulan, $row['total_stok'], $row['total_terjual'], $row['tahun']);
    fputcsv($file, $data);
    $no++;
}

fclose($file);

// Mengarahkan pengguna untuk mengunduh file CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');
readfile($filename);
exit;
?>
