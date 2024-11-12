<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("location:login_admin.php");
    exit;
}

// Ambil ID guru dari URL
$guru_id = $_GET['id'];

// Hapus data guru
$query = "DELETE FROM guru WHERE id = '$guru_id'";
if (mysqli_query($koneksi, $query)) {
    // Redirect ke halaman admin setelah berhasil menghapus
    header("location: tambah_guru.php?message=Guru berhasil dihapus");
} else {
    echo "Gagal menghapus data guru: " . mysqli_error($koneksi);
}
?>
