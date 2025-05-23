<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h4 mb-0 text-gray-800">Dashboard Owner</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="">Dashboard</li>
        </ol>
    </div>
    <?php
    if (isset($_GET['notif'])) {
        if ($_GET['notif'] == "login-sukses") {
            echo "<div class='alert alert-success alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard_accounting.php?p=halaman_awal_accounting' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
                          <i class='icon fa fa-check'></i> Anda Berhasil Login.</b>
                        </div>";
        }
    }
    ?>

    <div class="row mb-12">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-12">
                <div class="card-body" style="text-align: center;">
                    <h4>Selamat Datang Di Sistem Prediksi Penjualan Menggunakan Regresi Linear Berganda Pada Toko Sumber
                        Harapan </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">DATA BARANG</div>
                            <?php
                            include "koneksi.php";
                            $order = "SELECT * FROM tbl_stok";
                            $query_order = mysqli_query($connect, $order);
                            $data_order = array();

                            while (($row_order = mysqli_fetch_array($query_order)) != null) {
                                $data_order[] = $row_order;
                            }
                            $count = count($data_order);

                            $unique_barang = array();
                            foreach ($data_order as $row) {
                                $nama_barang = $row['nama_barang'];
                                if (!isset($unique_barang[$nama_barang])) {
                                    $unique_barang[$nama_barang] = 1;
                                } else {
                                    $unique_barang[$nama_barang]++;
                                }
                            }

                            $total_barang = count($unique_barang);

                            ?>

                            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_barang; ?>
                                Barang
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="dashboard_accounting.php?p=data_barang"><i
                                        class="fas fa-fw fa-book-open fa-2x text-info"
                                        style="margin-top: 18px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">DATA PENJUALAN</div>
                            <?php
                            include "koneksi.php";
                            $order_b = "SELECT DISTINCT SUM(jumlah) AS total_terjual FROM tbl_penjualan";
                            $query_order_b = mysqli_query($connect, $order_b);
                            $row_order_b = mysqli_fetch_assoc($query_order_b);
                            $total_terjual = $row_order_b['total_terjual'];
                            ?>
                            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_terjual; ?>
                                Jumlah Barang
                                Terjual
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#"><i class="fas fa-fw fa-file fa-2x text-danger"
                                           style="margin-top: 18px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!---Container Fluid-->