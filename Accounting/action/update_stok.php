<?php 
include"../../koneksi.php";
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_barang'];
    $stok = $_POST['total_stok'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $query="UPDATE tbl_stok SET nama_barang='$nama', satuan='$satuan', harga='$harga', total_stok=$stok,bulan=$bulan,tahun=$tahun WHERE id='$id'";
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
