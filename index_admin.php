<?php
session_start();
include "koneksi.php";

// Cek apakah user yang login adalah admin
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <a href="tambah_siswa.php" class="btn btn-primary btn-block">Tambah Siswa</a>
            </div>
            <div class="col-md-4">
                <a href="absensi_mulai.php" class="btn btn-primary btn-block">Mulai Absensi</a>
            </div>
            <div class="col-md-4">
                <a href="absensi_riwayat_admin.php" class="btn btn-primary btn-block">Lihat Riwayat Absensi</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <a href="tambah_guru_admin.php" class="btn btn-secondary btn-block">Tambah Guru</a>
            </div>
        </div>
    </div>
</body>
</html>
