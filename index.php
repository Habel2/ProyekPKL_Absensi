<?php 
session_start();
include "koneksi.php";
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Index Guru</title>
</head>
<body>
    <div class="container">
        <h1>Selamat datang, <?php echo $_SESSION['username']; ?></h1>
        <!-- Tombol untuk tambah siswa -->
        <a href="tambah_siswa.php" class="btn btn-primary mt-4">Tambah Siswa</a>
        <!-- Tombol untuk mengaktifkan absensi -->
        <a href="absensi_mulai.php" class="btn btn-success mt-4">Mulai Absensi</a>
        <!-- Tombol lihat riwayat absensi -->
        <a href="absensi_riwayat.php" class="btn btn-primary mt-4">Lihat Riwayat Absensi</a>
    </div>
</body>
</html>

