
<?php
include"koneksi.php";
$id=$_GET['id'];
$query="SELECT * FROM tbl_stok WHERE id='$id'";
$sql=mysqli_query($connect, $query);
$stok = mysqli_fetch_array($sql);

?><!-- Container Fluid-->

<div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Stok</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  ?>
                  <form method="post" action="Accounting/action/update_stok.php">
                    <input type="hidden" name="id" value="<?=$stok['id'];?>">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                      <select name="barang_id" class="form-control" required="required">
                                    <?php
                                    // Ambil data dari tbl_barang untuk dropdown
                                    $query_barang = "SELECT id, nama_barang FROM tbl_barang";
                                    $result_barang = mysqli_query($connect, $query_barang);

                                    while ($data_barang = mysqli_fetch_array($result_barang)) {
                                        $selected = ($data_stok['barang_id'] == $data_barang['id']) ? "selected" : "";
                                        echo '<option value="' . $data_barang['id'] . '" ' . $selected . '>' . $data_barang['nama_barang'] . '</option>';
                                    }
                                    ?>
                    </select>
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Stok</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="total_stok" value="<?=$stok['total_stok'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bulan</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="bulan" value="<?=$stok['bulan'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tahun</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="tahun" value="<?=$stok['tahun'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->