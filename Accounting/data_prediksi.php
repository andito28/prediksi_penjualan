<?php
$response = []; // Tambahkan baris ini sebelum penggunaan variabel $response

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h4 mb-0 text-gray-800">Menu Prediksi</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu Prediksi</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 5px;">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">Prediksi</b>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-3">
                                <select name="nama_barang" class="form-control" required="required"
                                        onchange="this.form.submit()">
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
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="row mb-12">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Rekap</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                            <thead class="thead-light">
                            <tr>
                                <th>Bulan</th>
                                <th>Stok</th>
                                <th>Terjual</th>
                                <th>Tahun</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_POST['nama_barang'])) {
                                $nama_barang = $_POST['nama_barang'];
                                // Query untuk mendapatkan data stok dan jumlah penjualan berdasarkan nama barang
                                $query = "SELECT s.bulan, s.total_stok, COALESCE(SUM(p.jumlah), 0) AS total_terjual, s.tahun 
                                      FROM tbl_stok s 
                                      LEFT JOIN tbl_penjualan p ON s.nama_barang = p.nama_barang AND MONTH(p.tanggal_transaksi) = s.bulan
                                      WHERE s.nama_barang = '$nama_barang'
                                      GROUP BY s.bulan, s.total_stok, s.tahun";
                                $result = mysqli_query($connect, $query);

                                $no = 1;
                                $data_rekap[] = array('Bulan', 'Stok', 'Terjual', 'Tahun');

                                while ($row = mysqli_fetch_array($result)) {
                                    $bulan = $row['bulan'];
                                    $stok = $row['total_stok'];
                                    $terjual = $row['total_terjual'];
                                    $tahun = $row['tahun'];
                                    $namaBulan = date("F", mktime(0, 0, 0, $bulan, 1));

                                    echo "<tr>";
                                    echo "<td>$namaBulan</td>";
                                    echo "<td>$stok</td>";
                                    echo "<td>$terjual</td>";
                                    echo "<td>$tahun</td>";
                                    echo "</tr>";
                                    $data_rekap[] = array($bulan, $stok, $terjual, $tahun);
                                    $no++;
                                }

                                // Tentukan nama file dan lokasi penyimpanan
                                $filename = $nama_barang . '-rekap.csv';
                                $filepath = $_SERVER['DOCUMENT_ROOT'] . '/prediksi_penjualan/Accounting/Data/' . $filename;

                                // Buat file CSV dan tulis data
                                $file = fopen($filepath, 'w');
                                foreach ($data_rekap as $row) {
                                    fputcsv($file, $row);
                                }
                                fclose($file);
                                // Melakukan POST API menggunakan file CSV

                                $apiUrl = 'https://2939-2001-448a-7025-47e7-c840-54e3-f715-a529.ngrok-free.app/prediksi';  // Ganti dengan URL API yang sesuai
                                $postFields = [
                                    'file' => new CURLFile($filepath, 'text/csv', $filename)
                                ];

                                $curl = curl_init();
                                curl_setopt($curl, CURLOPT_URL, $apiUrl);
                                curl_setopt($curl, CURLOPT_POST, true);
                                curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                                $response = curl_exec($curl);
                                $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                                $error = curl_error($curl);
                                $errno = curl_errno($curl);

                                // Menghapus file CSV setelah posting API selesai
                                unlink($filepath);
                                curl_close($curl);


                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-12">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Prediksi</h6>
                </div>
                <div class="card-body">
                    <form action="dashboard_accounting.php?p=data_prediksi" method="post">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-hover table-bordered" id="dataTableHover">
                                <thead class="thead-light">
                                <tr>
                                    <th>Bulan</th>
                                    <th>Terjual</th>
                                    <th>Tahun</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if ($response != null) {
                                    $dataArray = json_decode($response, true); // Convert JSON response to an associative array

                                    foreach ($dataArray['prediksi'] as $row) {

                                        ?>
                                        <input type="hidden" name="bulan[]" value="<?php echo $row['bulan']; ?>">
                                        <input type="hidden" name="jumlah_item[]" value="<?php echo $row['jumlah_item']; ?>">
                                        <input type="hidden" name="tahun[]" value="<?php echo $row['tahun']; ?>">
                                        <tr>
                                            <td><?php echo $row['bulan']; ?></td>
                                            <td><?php echo $row['jumlah_item']; ?></td>
                                            <td><?php echo $row['tahun']; ?></td>

                                        </tr>
                                        <?php
                                    }
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="button-save p-3">
                            <input type="hidden" name="barang" value="<?php echo $nama_barang ?>">
                            <button type="submit" name="save_pridiksi" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['save_pridiksi'])) {
                        for($i = 0; $i < count($_POST['bulan']); $i++){
                            $nama_barang = $_POST['barang'];
                            $bulan = $_POST['bulan'][$i];
                            $jumlah_item = $_POST['jumlah_item'][$i];
                            $tahun = $_POST['tahun'][$i];
                            $query = "INSERT INTO tbl_prediksi (nama_barang, bulan, jumlah_item, tahun) VALUES ('$nama_barang', '$bulan', $jumlah_item, $tahun)";
                            mysqli_query($connect, $query);
                        }

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>