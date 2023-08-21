<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Stok</h6>
                </div>
                <div class="card-body">
                  <?php
                  include"koneksi.php";
                  ?>
                  <form method="post" action="Accounting/action/store_stok.php">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <?php $id = "";?>
                      <select name="nama_barang" class="form-control" required="required">
                                    <option value="">Pilih Barang</option> <!-- Tambahkan opsi ini -->
                                    <?php
                                    // Ambil data nama barang dari database
                                    $query_barang = "SELECT * FROM tbl_barang";
                                    $result_barang = mysqli_query($connect, $query_barang);

                                    while ($row_barang = mysqli_fetch_array($result_barang)) {
                                        $nama_barang = $row_barang['nama_barang'];
                                        $id = $row_barang['id'];
                                        $selected = '';

                                        if (isset($_POST['nama_barang']) && $_POST['nama_barang'] == $nama_barang) {
                                            $selected = 'selected';
                                        }

                                        echo "<option value=\"$nama_barang\">$nama_barang</option>";
                                      
                                        
                                    }
                                    ?>
                    </select>
                    <input type="hidden" name="barang_id" value="<?=$id?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Stok</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="total_stok" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Bulan</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="bulan" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tahun</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="tahun" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="insert" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!---Container Fluid-->