<?php 
include"../../koneksi.php";
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $barang_id = $_POST['barang_id'];
    $stok = $_POST['total_stok'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $query="UPDATE tbl_stok SET barang_id='$barang_id', total_stok=$stok,bulan=$bulan,tahun=$tahun WHERE id='$id'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
        echo "<script>alert('Data Stok Berhasil Ubah');
        document.location.href='../../dashboard_accounting.php?p=data_stok'</script>\n";
    }else{
        echo "<script>alert('Data Stok Gagal Diubah!');
        document.location.href='../../dashboard_accounting.php?p=edit_stok'</script>\n";
    }
}

?>
