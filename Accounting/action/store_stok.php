<?php 
include"../../koneksi.php";

if(isset($_POST['insert'])){
    $id_barang = $_POST['barang_id'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['total_stok'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
        $query = "INSERT INTO tbl_stok (total_stok, bulan, tahun, barang_id, nama_barang) 
        VALUES ($stok, $bulan,$tahun, '$id_barang', '$nama_barang')";
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
