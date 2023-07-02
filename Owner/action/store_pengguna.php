<?php 
include"../../koneksi.php";

if(isset($_POST['insert'])){
    $nama = $_POST['nama_pengguna'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_pengguna = "SELECT id_pengguna FROM tbl_pengguna ORDER BY id_pengguna DESC LIMIT 1";
        $result = mysqli_query($connect, $query_pengguna);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $lastUserId = $row["id_pengguna"];
            // Ambil nomor urutan dari ID pengguna terakhir
            $lastSequence = intval(substr($lastUserId, 3));
            // Tingkatkan nomor urutan
            $newSequence = $lastSequence + 1;
            // Format nomor urutan ke dalam format yang diinginkan
            $formattedSequence = str_pad($newSequence, 3, "0", STR_PAD_LEFT);
            // Buat ID pengguna baru
            $newUserId = "PGN" . $formattedSequence;
        } else {
            // Jika tidak ada ID pengguna sebelumnya, buat ID pengguna baru yang pertama
            $newUserId = "PGN001";
        }

$query = "INSERT INTO tbl_pengguna (id_pengguna, nama_pengguna, telepon, email, username, password,level) 
        VALUES ('$newUserId', '$nama', $telepon, '$email','$username','$password','Accounting')";
        $sql=mysqli_query($connect, $query);
        if ($sql) {
          echo "<script>alert('Data pengguna Berhasil Tambah');
          document.location.href='../../dashboard_owner.php?p=data_pengguna'</script>\n";
        }else{
          echo "<script>alert('Data Pengguna Gagal Ditambah!');
          document.location.href='../../dashboard_owner.php?p=create_pengguna'</script>\n";
        }
}

?>
