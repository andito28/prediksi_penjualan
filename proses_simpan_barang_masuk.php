<?php
include "koneksi.php";
$query = "SELECT max(id_barang_masuk) as maxId FROM tbl_barang_masuk";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
$idbarang = $data['maxId'];
$noUrut = (int) substr($idbarang, 3, 3);
$noUrut++;
$char = "IBM";
$idbarang= $char . sprintf("%03s", $noUrut);

$nim = $_POST['nim'];
$stk = $_POST['stk'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$tgl = $_POST['tgl'];
$stok =$_POST['stok'];
$satuan = $_POST['satuan'];
$ttl = $_POST['ttl'];


$query1 = "INSERT INTO `tbl_barang_masuk` (`id_barang_masuk`, `id_barang`, `periode`, `tahun`, `tgl_barang_masuk`, `stok_awal`, `satuan`, `jml_barang_masuk`, `total_stok`) VALUES ('$idbarang', '$nim', '$bulan', '$tahun', '$tgl', '$stk', '$satuan', '$stok', '$ttl')";
	$sql1 = mysqli_query($connect, $query1); 
	if ($sql1) {
		$query_r="UPDATE tbl_barang SET stok_akhir='$ttl' WHERE id_barang='$nim'";
               $sql_r=mysqli_query($connect, $query_r);
               if ($query_r) {
			echo "<script>alert('Proses Simpan Data Barang Masuk Berhasil');
                document.location.href='dashboard.php?p=data_barang_masuk'</script>\n";
		}else{
			echo "<script>alert('Proses Simpan Data Barang Masuk Gagal');
                document.location.href='dashboard.php?p=input_barang_masuk'</script>\n";
		}
	}
?>
