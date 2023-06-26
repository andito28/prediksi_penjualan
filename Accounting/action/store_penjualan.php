<?php 
include"../../koneksi.php";

if(isset($_POST['insert'])){

    $kode_transaksi = $_POST['kode_transaksi'];
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $potongan = $_POST['potongan'];
    $total_harga = $_POST['total_harga'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];

    $query = "INSERT INTO tbl_penjualan (kode_transaksi,nama_barang, jumlah, satuan, harga, potongan, total_harga,tanggal_transaksi) 
        VALUES ('$kode_transaksi','$nama', $jumlah, '$satuan', $harga,$potongan,$total_harga,'$tanggal_transaksi')";

        $sql=mysqli_query($connect, $query);
        if ($sql) {
          echo "<script>alert('Data Transaksi Penjualan Berhasil Tambah');
          document.location.href='../../dashboard_accounting.php?p=data_penjualan'</script>\n";
        }else {
          echo "Error: " . mysqli_error($connect);
      }


}

?>
