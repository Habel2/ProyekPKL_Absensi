<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("location: login_admin.php");
    exit;
}

// Cek jika form telah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $absensi_id = $_POST['absensi_id'];
    $siswa_id = $_POST['siswa_id'];
    $status = $_POST['status'];

    // Update status absensi siswa di database
    $query = "UPDATE absen_siswa 
              SET status = '$status' 
              WHERE absensi_id = '$absensi_id' AND siswa_id = '$siswa_id'";

    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman detail absensi setelah berhasil update
        header("location: absensi_detail_admin.php?absensi_id=$absensi_id");
        exit;
    } else {
        echo "Gagal mengedit status absensi.";
    }
}
?>
