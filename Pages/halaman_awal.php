<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Dashboard Admin Aplication</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Dashboard</li>
            </ol>
          </div>
          <?php
              if(isset($_GET['notif'])){
                if($_GET['notif']=="login-sukses"){
                  echo "<div class='alert alert-success alert-dismissible'>
                        <a style='text-decoration:none;' href='dashboard.php?p=halaman_awal' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</a>
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
                  <h4>Selamat Datang Di Sistem Prediksi penjualan menggunakan regresi linier berganda</h4>
                </div>
              </div>
            </div>
            </div>
            <div class="row mb-3">
            <!-- New User Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">DATA PENJUALAN</div>
                      <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Penjualan </div>
                    </div>
                    <div class="col-auto">
                      <a href="dashboard.php?p=data_barang"><i class="fas fa-fw fa-book-open fa-2x text-info" style="margin-top: 18px;"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">DATA STOK</div>
                      <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Stok</div>
                    </div>
                    <div class="col-auto">
                      <a href="#"><i class="fas fa-fw fa-book fa-2x text-warning" style="margin-top: 18px;"></i></a>
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
  </div>
        <!---Container Fluid-->