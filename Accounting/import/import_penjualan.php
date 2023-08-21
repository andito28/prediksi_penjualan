<?php
// Pastikan koneksi ke database Anda sudah diatur sebelumnya

include"../../koneksi.php";

if (isset($_POST['import'])) {
    $file = $_FILES['file']['tmp_name'];
    $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // Periksa apakah file yang diunggah adalah file CSV
    if ($fileType == 'csv') {
       
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Sesuaikan kolom dan tabel database sesuai kebutuhan
                $kode_transaksi = $data[0]; // Data dari kolom pertama
                $nama_barang = $data[1]; // Data dari kolom kedua
                $jumlah = $data[2]; // Data dari kolom Ketiga
                $satuan = $data[3]; // Data dari kolom Keempat
                $harga = $data[4]; // Data dari kolom Kelima
                $potongan = $data[5]; // Data dari kolom Enam
                $total_harga = $data[6]; // Data dari kolom Tujuh
                $tanggal_transaksi = $data[7]; // Data dari kolom Tujuh
                // ...
                // Lakukan hal serupa untuk kolom lainnya
               
                // Contoh query untuk menyimpan data ke database (asumsikan tabel "nama_tabel")
                $query = "INSERT INTO tbl_penjualan (kode_transaksi, nama_barang, jumlah, satuan, harga, potongan, total_harga, tanggal_transaksi) VALUES ('$kode_transaksi', '$nama_barang','$jumlah','$satuan','$harga','$potongan','$total_harga','$tanggal_transaksi' )";
                mysqli_query($connect, $query); // Eksekusi query, sesuaikan koneksi dengan koneksi database Anda
            }
            fclose($handle);
        }

        // Setelah selesai, Anda dapat melakukan redirect atau menampilkan pesan sukses
        echo "<script>alert('Data Penjualan Berhasil Tambah');
        document.location.href='../../dashboard_accounting.php?p=data_penjualan'</script>\n";
    } else {
        echo "<script>alert('Format file tidak di dukung');
        document.location.href='../../dashboard_accounting.php?p=data_penjualan'</script>\n";
        
    }
}
?>