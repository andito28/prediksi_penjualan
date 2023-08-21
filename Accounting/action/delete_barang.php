<?php 
include"../../koneksi.php";
$id = $_GET['id'];
$query = "DELETE FROM tbl_barang WHERE id = $id";
$sql=mysqli_query($connect, $query);
if ($sql) {
    echo "<script>alert('Data Barang Berhasil Dihapus');
    document.location.href='../../dashboard_accounting.php?p=data_barang'</script>\n";
}else{
    echo "<script>alert('Data Barang Gagal Dihapus!');
    document.location.href='../../dashboard_accounting.php?p=data_barang'</script>\n";
}