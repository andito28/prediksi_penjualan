<?php 
include"../../koneksi.php";
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];

    $query="UPDATE tbl_barang SET nama_barang='$nama', satuan='$satuan', harga='$harga' WHERE id='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
        echo "<script>alert('Data Barang Berhasil Ubah');
        document.location.href='../../dashboard_accounting.php?p=data_barang'</script>\n";
    }else{
        echo "<script>alert('Data Barang Gagal Diubah!');
        document.location.href='../../dashboard_accounting.php?p=edit_barang'</script>\n";
    }
}

?>
