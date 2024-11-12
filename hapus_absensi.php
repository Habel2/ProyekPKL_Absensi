<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("location: login_admin.php");
    exit;
}

// Ambil ID absensi dari form
$absensi_id = $_POST['absensi_id'];

// Hapus semua data di absen_siswa yang berhubungan dengan absensi_id tersebut
$query = "DELETE FROM absen_siswa WHERE absensi_id = '$absensi_id'";
mysqli_query($koneksi, $query);

// Setelah itu, baru hapus data di tabel absensi
$query = "DELETE FROM absensi WHERE id = '$absensi_id'";
mysqli_query($koneksi, $query);

// Redirect kembali ke halaman riwayat absensi
header("location: absensi_riwayat_admin.php");
exit;
?>
