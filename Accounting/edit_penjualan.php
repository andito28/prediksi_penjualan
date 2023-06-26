
<?php
include"koneksi.php";
$nama = $_GET['nama_barang'];
$kode_transaksi = $_GET['kode_transaksi'];

$query="SELECT * FROM tbl_penjualan WHERE kode_transaksi = '$kode_transaksi' AND nama_barang = '$nama'";
$sql=mysqli_query($connect, $query);
$penjualan = mysqli_fetch_array($sql);

?><!-- Container Fluid-->

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="row mb-12">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
               <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Penjualan</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="Accounting/action/update_penjualan.php">
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kode Transaksi</label>
                      <div class="col-sm-10">
                      <input type="hidden" name="nama_barang" value="<?=$penjualan['nama_barang'];?>">
                        <input type="text" class="form-control" name="kode_transaksi" readonly value="<?=$penjualan['kode_transaksi'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                      <select name="nama_barang" class="form-control" required="required" readonly disabled>
                                    <option value="">Pilih Barang</option> <!-- Tambahkan opsi ini -->
                                    <?php
                                    // Ambil data nama barang dari database
                                    $query_barang = "SELECT DISTINCT nama_barang FROM tbl_stok";
                                    $result_barang = mysqli_query($connect, $query_barang);

                                    while ($row_barang = mysqli_fetch_array($result_barang)) {
                                        $nama_barang = $row_barang['nama_barang'];
                                        $selected = '';

                                        if( $penjualan['nama_barang'] == $nama_barang) {
                                          $selected = 'selected';
                                      }

                                        echo "<option value=\"$nama_barang\" $selected>$nama_barang</option>";
                                    }
                                    ?>
                    </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="jumlah" value="<?=$penjualan['jumlah'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Satuan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="satuan" value="<?=$penjualan['satuan'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">harga</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="harga" value="<?=$penjualan['harga'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Potongan</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="potongan" value="<?=$penjualan['potongan'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Harga</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="total_harga" value="<?=$penjualan['total_harga'];?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tanggal_transaksi" value="<?=$penjualan['tanggal_transaksi'];?>" required="required">
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