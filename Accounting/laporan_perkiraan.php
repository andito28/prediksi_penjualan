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
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                            <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Total Terjual Satu Tahun Sebelumnya</th>
                                <th>Total Terjual Satu Tahun Berikutnya</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            // Query untuk mendapatkan data stok dan jumlah penjualan berdasarkan nama barang
                            $query = "SELECT DISTINCT nama_barang, SUM(jumlah) AS total_terjual FROM tbl_penjualan GROUP BY nama_barang";
                            $result = mysqli_query($connect, $query);

                            $no = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $nama_barang = $row['nama_barang'];
                                $total_terjual = $row['total_terjual'];
                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$nama_barang</td>";
                                echo "<td>$total_terjual</td>";
                                echo "<td></td>";

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
