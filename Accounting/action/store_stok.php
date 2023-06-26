<?php 
include"../../koneksi.php";

if(isset($_POST['insert'])){
    $nama = $_POST['nama_barang'];
    $stok = $_POST['total_stok'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
        $query = "INSERT INTO tbl_stok (nama_barang, satuan, harga, total_stok, bulan, tahun) 
        VALUES ('$nama', '$satuan', $harga, $stok,$bulan,$tahun)";
        $sql=mysqli_query($connect, $query);
        if ($sql) {
          echo "<script>alert('Data Stok Berhasil Tambah');
          document.location.href='../../dashboard_accounting.php?p=data_stok'</script>\n";
        }else{
          echo "<script>alert('Data Stok Gagal Ditambah!');
          document.location.href='../../dashboard_accounting.php?p=create_stok'</script>\n";
        }
}

?>
