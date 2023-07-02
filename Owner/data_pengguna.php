<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h4 mb-0 text-gray-800">Data Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="">Data pengguna</li>
        </ol>
    </div>

    <div class="row mb-12">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="row pt-3">
                    <div class="col-md-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengguna</h6>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card-header float-right">
                        <a href="dashboard_owner.php?p=create_pengguna" class="btn btn-primary">Tambah Pengguna</a>
                    </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                            <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "koneksi.php";
                            $no = 1;
                            $query_user = "SELECT * FROM tbl_pengguna";
                            $sql_user = mysqli_query($connect, $query_user);
                            while ($data_user = mysqli_fetch_array($sql_user)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data_user['nama_pengguna']; ?></td>
                                    <td><?php echo $data_user['email']; ?></td>
                                    <td><?php echo $data_user['telepon']; ?></td>
                                    <td><?php echo $data_user['username']; ?></td>
                                    <td><?php echo $data_user['level']; ?></td>
                                    <td>
                                        <a href="Owner/action/delete_pengguna.php?id=<?php echo $data_user['id_pengguna'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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