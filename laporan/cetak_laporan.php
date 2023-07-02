<!DOCTYPE html>
<html>
<head>
	<title>REKAP LAPORAN PREDIKSI PENJUALAN</title>
</head>
<body>
 
	<center>
 
		<h2>DATA REKAP PREDIKSI PENJUALAN</h2>
		<h4>TOKO SUMBER HARAPAN</h4>
 
	</center>
 
    <table  border="1" cellpadding="5" cellspacing="1" style="width: 100%">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Tanggal Absen</th>
                <th>Bukti Mengajar</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include "../koneksi.php";
            $no = 1;
            $query_absensi = "SELECT * FROM tbl_absensi";
            $sql_absensi = mysqli_query($connect, $query_absensi);
            while ($data_absensi= mysqli_fetch_array($sql_absensi)) {
                $path = $data_absensi['bukti_mengajar'];
                $fixedPath = str_replace("../", "", $path);
                $id_guru =  $data_absensi['id_guru'];
                $query_guru = "SELECT * FROM tbl_guru WHERE id_guru = $id_guru";
                $sql_guru = mysqli_query($connect, $query_guru);
                $data_guru= mysqli_fetch_array($sql_guru)
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data_guru['nama_guru']?></td>
                    <td><?php echo $data_absensi['tanggal_absen']; ?></td>
                    <td>
                    <img src="../<?=$fixedPath;?>" style="width:100px; height: 100px;margin-bottom:10px;">
                    </td>
                </tr>
                <?php $no++;
            }
            ?>
    </table>
	<script>    
		window.print();
	</script>
 
</body>
</html>