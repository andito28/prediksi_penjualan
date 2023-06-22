<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h4 mb-0 text-gray-800">Data Penjualan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="">Data Penjualan</li>
        </ol>
    </div>

    <div class="row mb-12">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Penjualan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                            <thead class="thead-light">
                            <tr>
                                <th>Kode Transaksi</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Potongan</th>
                                <th>Total Harga</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "koneksi.php";
                            $no = 1;
                            $query_user = "SELECT * FROM tbl_penjualan";
                            $sql_user = mysqli_query($connect, $query_user);
                            while ($data_user = mysqli_fetch_array($sql_user)) {
                                ?>
                                <tr>
                                    <td><?php echo $data_user['kode_transaksi']; ?></td>
                                    <td><?php echo $data_user['nama_barang']; ?></td>
                                    <td><?php echo $data_user['jumlah']; ?></td>
                                    <td><?php echo $data_user['satuan']; ?></td>
                                    <td><?php echo $data_user['harga']; ?></td>
                                    <td><?php echo $data_user['potongan']; ?></td>
                                    <td><?php echo $data_user['total_harga']; ?></td>
                                    <td><?php echo $data_user['tanggal_transaksi']; ?></td>
                                </tr>
                                <?php $no++;
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