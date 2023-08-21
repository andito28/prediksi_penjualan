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
            <div class="row pt-3">
                    <div class="col-md-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Penjualan</h6>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card-header float-right">
                        <a href="dashboard_accounting.php?p=create_penjualan" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="card-header float-right" >
                        <form action="Accounting/import/import_penjualan.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" id="file">
                            <input type="submit" class="btn btn-primary"name="import" value="Import">
                        </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "koneksi.php";
                            $no = 1;
                            $query_penjualan = "SELECT * FROM tbl_penjualan";
                            $sql_penjualan = mysqli_query($connect, $query_penjualan);
                            while ($data_penjualan = mysqli_fetch_array($sql_penjualan)) {
                                ?>
                                <tr>
                                    <td><?php echo $data_penjualan['kode_transaksi']; ?></td>
                                    <td><?php echo $data_penjualan['nama_barang']; ?></td>
                                    <td><?php echo $data_penjualan['jumlah']; ?></td>
                                    <td><?php echo $data_penjualan['satuan']; ?></td>
                                    <td><?php echo $data_penjualan['harga']; ?></td>
                                    <td><?php echo $data_penjualan['potongan']; ?></td>
                                    <td><?php echo $data_penjualan['total_harga']; ?></td>
                                    <td><?php echo $data_penjualan['tanggal_transaksi']; ?></td>
                                    <td>
                                        <a href="dashboard_accounting.php?p=edit_penjualan&kode_transaksi=<?php echo $data_penjualan['kode_transaksi'];?>&nama_barang=<?=$data_penjualan['nama_barang'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> | 
                                        <a href="Accounting/action/delete_penjualan.php?kode_transaksi=<?php echo $data_penjualan['kode_transaksi'];?>&nama_barang=<?=$data_penjualan['nama_barang'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
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