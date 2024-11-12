<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

// Ambil ID sesi absensi dari POST
$absensi_id = $_POST['absensi_id'];

// Hapus data absensi siswa untuk sesi ini
$delete_absen_siswa = "DELETE FROM absen_siswa WHERE absensi_id = '$absensi_id'";
mysqli_query($koneksi, $delete_absen_siswa);

// Hapus data absensi dari tabel absensi
$delete_absensi = "DELETE FROM absensi WHERE id = '$absensi_id'";
mysqli_query($koneksi, $delete_absensi);

// Kembali ke halaman mulai absensi
header("location:absensi_mulai.php");
?>
