<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800">Data Stok</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="">Data Stok</li>
            </ol>
          </div>
          
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Stok</h6>
                </div>
                <div class="card-body">
                  <!-- <a href="dashboard.php?p=input_data_barang" class="btn btn-primary" style="margin-bottom: 3px; "><i class="fa fa-edit"></i> INPUT DATA BARANG</a> -->
                  <div class="table-responsive p-3">
                  <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>Nama Barang</th>
                        <th>jenis Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Total Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       include "koneksi.php";
                       $no=1;
                       $query_stok="SELECT * FROM tbl_stock";
                       $sql_stok=mysqli_query($connect, $query_stok);
                       while ($data_stok=mysqli_fetch_array($sql_stok)) {
                      ?>
                      <tr>
                         <td><?php echo $no;?></td>
                         <td><?php echo $data_stok['nama_barang'];?></td>
                         <td><?php echo $data_stok['jenis_satuan'];?></td>
                         <td><?php echo $data_stok['harga_satuan'];?></td>
                         <td><?php echo $data_stok['total_stok'];?></td>
                         <!-- <td><a href="dashboard.php?p=edit_data_barang&id=<?php echo $data_user['id_barang'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                         </td> -->
                      </tr>
                      <?php $no++;}
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