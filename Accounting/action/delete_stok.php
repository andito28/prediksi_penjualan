<?php 
include"../../koneksi.php";
$id = $_GET['id'];
$query = "DELETE FROM tbl_stok WHERE id = $id";
$sql=mysqli_query($connect, $query);
if ($sql) {
    echo "<script>alert('Data Stok Berhasil Dihapus');
    document.location.href='../../dashboard_accounting.php?p=data_stok'</script>\n";
}else{
    echo "<script>alert('Data Stok Gagal Dihapus!');
    document.location.href='../../dashboard_accounting.php?p=data_stok'</script>\n";
}