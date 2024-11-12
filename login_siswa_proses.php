<?php
session_start();
include "koneksi.php";

$nama = $_POST['nama'];
$password = $_POST['password'];

// Proses login
$query = "SELECT * FROM siswa WHERE nama = '$nama' AND password = '$password'";
$result = mysqli_query($koneksi, $query);
$cek = mysqli_num_rows($result);

if($cek > 0){
    $_SESSION['nama'] = $nama;
    header("location:absensi_siswa.php");
} else {
    header("location:login_siswa.php?pesan=gagal");
}
?>
