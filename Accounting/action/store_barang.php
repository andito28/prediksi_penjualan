<?php 
include"../../koneksi.php";

if(isset($_POST['insert'])){
    $nama = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
        $query = "INSERT INTO tbl_barang (nama_barang, satuan, harga) 
        VALUES ('$nama', '$satuan', $harga)";
        $sql=mysqli_query($connect, $query);
        if ($sql) {
          echo "<script>alert('Data Barang Berhasil Tambah');
          document.location.href='../../dashboard_accounting.php?p=data_barang'</script>\n";
        }else{
          echo "<script>alert('Data Barang Gagal Ditambah!');
          document.location.href='../../dashboard_accounting.php?p=create_barang'</script>\n";
        }
}

?>
