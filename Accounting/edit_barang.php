
<?php
include"koneksi.php";
$id=$_GET['id'];
$query="SELECT * FROM tbl_barang WHERE id='$id'";
$sql=mysqli_query($connect, $query);
$stok = mysqli_fetch_array($sql);

?><!-- Container Fluid-->

<div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Barang</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  ?>
                  <form method="post" action="Accounting/action/update_barang.php">
                    <input type="hidden" name="id" value="<?=$stok['id'];?>">

                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_barang" value="<?=$stok['nama_barang'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Satuan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="satuan" value="<?=$stok['satuan'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="harga" value="<?=$stok['harga'];?>" required="required">
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