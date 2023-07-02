<!DOCTYPE html>
<html>
<head>
	<title>REKAP LAPORAN PREDIKSI PENJUALAN</title>
</head>
<body>
 
	<center>
 
		<h2>DATA REKAP PREDIKSI PENJUALAN</h2>
		<h4>TOKO SUMBER HARAPAN</h4>
 
	</center>
 
    <table  border="1" cellpadding="5" cellspacing="1" style="width: 100%">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Total Terjual Setahun Sebelumnya</th>
                <th>Total Terjual Setahun Berikutnya</th>
            </tr>
            </thead>
            <tbody>
            <?php
             include "../koneksi.php";
                            // Query untuk mendapatkan data stok dan jumlah penjualan berdasarkan nama barang
                            $query_penjualan = "SELECT nama_barang, satuan, SUM(jumlah) AS total_terjual FROM tbl_penjualan GROUP BY nama_barang";
                            $result_penjualan = mysqli_query($connect, $query_penjualan);

                            // Query untuk menghitung total_jumlah_item dari tabel tbl_prediksi
                            $query_prediksi = "SELECT nama_barang, SUM(jumlah_item) AS total_jumlah_item FROM tbl_prediksi GROUP BY nama_barang";
                            $result_prediksi = mysqli_query($connect, $query_prediksi);

                            // Menggabungkan hasil query
                            $merged_data = [];

                            // Memasukkan data total_terjual ke dalam array asosiatif
                            while ($row_penjualan = mysqli_fetch_array($result_penjualan)) {
                                $nama_barang = $row_penjualan['nama_barang'];
                                $total_terjual = $row_penjualan['total_terjual'];
                                $jenis_satuan = $row_penjualan['satuan'];
                                $merged_data[$nama_barang]['total_terjual'] = $total_terjual;
                                $merged_data[$nama_barang]['jenis_satuan'] = $jenis_satuan;
                            }

                            // Memasukkan data total_jumlah_item ke dalam array asosiatif
                            while ($row_prediksi = mysqli_fetch_array($result_prediksi)) {
                                $nama_barang = $row_prediksi['nama_barang'];
                                $total_jumlah_item = $row_prediksi['total_jumlah_item'];

                                $merged_data[$nama_barang]['total_jumlah_item'] = $total_jumlah_item;
                            }

                            // Menampilkan data yang telah digabungkan
                            $no = 1;
                            foreach ($merged_data as $nama_barang => $data) {
                                $total_terjual = isset($data['total_terjual']) ? $data['total_terjual'] : 0;
                                $total_jumlah_item = isset($data['total_jumlah_item']) ? $data['total_jumlah_item'] : 0;
                                $jenis_satuan = isset($data['jenis_satuan']) ? $data['jenis_satuan'] : 0;

                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$nama_barang</td>";
                                echo "<td>$jenis_satuan</td>";
                                echo "<td>$total_terjual</td>";
                                echo "<td>";
                                if ($total_jumlah_item > 0) {
                                    echo $total_jumlah_item;
                                } else {
                                    echo '<span class="text-danger">Belum Diprediksi</span>';
                                }
                                echo "</td>";
                                echo "</tr>";

                                $no++;
                            }
                            ?>
    </table>
	<script>    
		window.print();
	</script>
 
</body>
</html>