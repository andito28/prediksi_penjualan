<?php 
include"../../koneksi.php";
$nama = $_GET['nama_barang'];
$kode_transaksi = $_GET['kode_transaksi'];
$query = "DELETE FROM tbl_penjualan WHERE kode_transaksi = '$kode_transaksi' AND nama_barang = '$nama' ";
$sql=mysqli_query($connect, $query);
if ($sql) {
    echo "<script>alert('Data Stok Berhasil Dihapus');
    document.location.href='../../dashboard_accounting.php?p=data_penjualan'</script>\n";
}else{
    echo "Error: " . mysqli_error($connect);
}