<?php
// Pastikan koneksi ke database Anda sudah diatur sebelumnya

include"../../koneksi.php";

if (isset($_POST['import'])) {
    $file = $_FILES['file']['tmp_name'];
    $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // Periksa apakah file yang diunggah adalah file CSV
    if ($fileType == 'csv') {
        $query = "TRUNCATE TABLE tbl_stok";
        mysqli_query($connect, $query); // Eksekusi query, sesuaikan koneksi dengan koneksi database Anda
    
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Sesuaikan kolom dan tabel database sesuai kebutuhan
                $id = $data[0]; // Data dari kolom pertama
                $nama_barang = $data[1]; // Data dari kolom kedua
                $satuan = $data[2]; // Data dari kolom Ketiga
                $harga = $data[3]; // Data dari kolom Keempat
                $total_stok = $data[4]; // Data dari kolom Kelima
                $bulan = $data[5]; // Data dari kolom Enam
                $tahun = $data[6]; // Data dari kolom Tujuh
                // ...
                // Lakukan hal serupa untuk kolom lainnya
               
                // Contoh query untuk menyimpan data ke database (asumsikan tabel "nama_tabel")
                $query = "INSERT INTO tbl_stok (id, nama_barang, satuan, harga, total_stok, bulan, tahun) VALUES ('$id', '$nama_barang','$satuan','$harga','$total_stok','$bulan','$tahun' )";
                mysqli_query($connect, $query); // Eksekusi query, sesuaikan koneksi dengan koneksi database Anda
            }
            fclose($handle);
        }

        // Setelah selesai, Anda dapat melakukan redirect atau menampilkan pesan sukses
        echo "<script>alert('Data Stok Berhasil Tambah');
        document.location.href='../../dashboard_accounting.php?p=data_stok'</script>\n";
    } else {
        echo "<script>alert('Format file tidak di dukung');
        document.location.href='../../dashboard_accounting.php?p=data_stok'</script>\n";
        
    }
}
?>