<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h4 mb-0 text-gray-800">Data Stok Barang</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="">Data Stok Barang</li>
        </ol>
    </div>

    <div class="row mb-12">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="row pt-3">
                    <div class="col-md-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Stok Barang</h6>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header float-right">
                            <a href="dashboard_accounting.php?p=create_stok" class="btn btn-primary">Tambah Stok</a>
                        </div>
                        <div class="card-header float-right" >
                        <form action="Accounting/import/import_stok.php" method="post" enctype="multipart/form-data">
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
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "koneksi.php";
                            $no = 1;
                            $query_user = "SELECT s.*, b.nama_barang, b.satuan, b.harga
                            FROM tbl_stok AS s
                            INNER JOIN tbl_barang AS b ON s.barang_id = b.id";
                            $sql_user = mysqli_query($connect, $query_user);
                            while ($data_stok = mysqli_fetch_array($sql_user)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data_stok['nama_barang']; ?></td>
                                    <td><?php echo $data_stok['satuan']; ?></td>
                                    <td><?php echo $data_stok['harga']; ?></td>
                                    <td><?php echo $data_stok['total_stok']; ?></td>
                                    <td><?php echo $data_stok['bulan']; ?></td>
                                    <td><?php echo $data_stok['tahun']; ?></td>
                                    <td>
                                        <a href="dashboard_accounting.php?p=edit_stok&id=<?php echo $data_stok['id'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> | 
                                        <a href="Accounting/action/delete_stok.php?id=<?php echo $data_stok['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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