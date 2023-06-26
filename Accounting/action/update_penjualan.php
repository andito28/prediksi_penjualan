<?php 
include"../../koneksi.php";
if(isset($_POST['update'])){
    $kode_transaksi = $_POST['kode_transaksi'];
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $potongan = $_POST['potongan'];
    $total_harga = $_POST['total_harga'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];

    $query="UPDATE tbl_penjualan SET kode_transaksi='$kode_transaksi', nama_barang='$nama', jumlah=$jumlah, satuan='$satuan',harga=$harga,potongan=$potongan,total_harga=$total_harga,tanggal_transaksi='$tanggal_transaksi' WHERE kode_transaksi='$kode_transaksi' AND nama_barang = '$nama'";
    $sql=mysqli_query($connect, $query);
    if ($sql) {
        echo "<script>alert('Data Transaksi Penjualan Berhasil DiUbah');
        document.location.href='../../dashboard_accounting.php?p=data_penjualan'</script>\n";
    }else{
        echo "Error: " . mysqli_error($connect);
    }
}

?>
