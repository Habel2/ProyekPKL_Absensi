<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

// Ambil data semua siswa
$siswa_query = "SELECT id FROM siswa";
$result_siswa = mysqli_query($koneksi, $siswa_query);

// Buat absensi baru di tabel absensi dan ambil ID absensi
$tanggal_hari_ini = date("Y-m-d");
$insert_absensi = "INSERT INTO absensi (tanggal_absen, status_aktif) VALUES ('$tanggal_hari_ini', 1)";
mysqli_query($koneksi, $insert_absensi);
$absensi_id = mysqli_insert_id($koneksi);

// Setiap siswa secara default statusnya "belum absen"
while($siswa = mysqli_fetch_assoc($result_siswa)){
    $siswa_id = $siswa['id'];
    $insert_absen_siswa = "INSERT INTO absen_siswa (siswa_id, absensi_id, status) VALUES ('$siswa_id', '$absensi_id', 'tidak hadir')";
    mysqli_query($koneksi, $insert_absen_siswa);
}

// Kembali ke halaman mulai absensi
header("location:absensi_mulai.php");
?>
