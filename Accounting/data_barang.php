<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h4 mb-0 text-gray-800">Data Barang</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="">Data Barang</li>
        </ol>
    </div>

    <div class="row mb-12">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="row pt-3">
                    <div class="col-md-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header float-right">
                            <a href="dashboard_accounting.php?p=create_barang" class="btn btn-primary">Tambah</a>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "koneksi.php";
                            $no = 1;
                            $query_user = "SELECT * FROM tbl_barang";
                            $sql_user = mysqli_query($connect, $query_user);
                            while ($data_barang = mysqli_fetch_array($sql_user)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data_barang['nama_barang']; ?></td>
                                    <td><?php echo $data_barang['satuan']; ?></td>
                                    <td><?php echo $data_barang['harga']; ?></td>
                                    <td>
                                        <a href="dashboard_accounting.php?p=edit_barang&id=<?php echo $data_barang['id'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> | 
                                        <a href="Accounting/action/delete_barang.php?id=<?php echo $data_barang['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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