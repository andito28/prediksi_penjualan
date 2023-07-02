<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h4 mb-0 text-gray-800">Laporan Data Prediksi</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Data Prediksi</li>
        </ol>
       
   
    </div>
    <div class="row mb-12">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Perediksi</h6>
                    <a href="laporan/cetak_laporan.php" target="_blank" class="btn btn-primary">Print</a> <!-- Tombol Open PDF -->
    
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                            <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Total Terjual Satu Tahun Sebelumnya</th>
                                <th>Total Terjual Satu Tahun Berikutnya</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->

