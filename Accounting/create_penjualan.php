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
                  <?php
                  include"koneksi.php";
                  $query = "SELECT kode_transaksi FROM tbl_penjualan ORDER BY kode_transaksi DESC LIMIT 1";
                    $result = mysqli_query($connect, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $kode_terakhir = $row['kode_transaksi'];
                        $angka_terakhir = intval(explode("/", $kode_terakhir)[0]);
                        $str_transaksi = explode("/", $kode_terakhir);
                    } else {
                        $angka_terakhir = 1;
                    }
                    $angka_baru = ($angka_terakhir)."/$str_transaksi[1]/$str_transaksi[2]/$str_transaksi[3]";
                    $tanggal_transaksi = date("Y-m-d H:i:s");
                  ?>
                  <form method="post" action="Accounting/action/store_penjualan.php">
                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Kode Transaksi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="kode_transaksi" value="<?=$angka_baru?>" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Nama Barang</label>
                      <div class="col-sm-10">
                      <select name="nama_barang" class="form-control" required="required">
                                    <option value="">Pilih Barang</option> <!-- Tambahkan opsi ini -->
                                    <?php
                                    // Ambil data nama barang dari database
                                    $query_barang = "SELECT DISTINCT nama_barang FROM tbl_stok";
                                    $result_barang = mysqli_query($connect, $query_barang);

                                    while ($row_barang = mysqli_fetch_array($result_barang)) {
                                        $nama_barang = $row_barang['nama_barang'];
                                        $selected = '';

                                        if (isset($_POST['nama_barang']) && $_POST['nama_barang'] == $nama_barang) {
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
                        <input type="number" class="form-control" name="jumlah" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Satuan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="satuan" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">harga</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="harga" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Potongan</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="potongan" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Total Harga</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" name="total_harga" required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tanggal_transaksi" value="<?=$tanggal_transaksi;?>"  required="required">
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