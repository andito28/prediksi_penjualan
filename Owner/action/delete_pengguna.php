<?php 
include"../../koneksi.php";
$id = $_GET['id'];
$query = "DELETE FROM tbl_pengguna WHERE id_pengguna ='$id' ";
$sql=mysqli_query($connect, $query);
if ($sql) {
    echo "<script>alert('Data Pengguna Berhasil Dihapus');
    document.location.href='../../dashboard_owner.php?p=data_pengguna'</script>\n";
}else{
    echo "<script>alert('Data Pengguna Gagal Dihapus!');
    document.location.href='../../dashboard_owner.php?p=data_pengguna'</script>\n";
}