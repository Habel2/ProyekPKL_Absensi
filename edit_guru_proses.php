<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("location:login_admin.php");
    exit;
}

// Ambil data dari form
$id = $_POST['id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Update data guru
$query = "UPDATE guru SET username = '$username', password = '$password' WHERE id = '$id'";
if (mysqli_query($koneksi, $query)) {
    // Redirect ke halaman utama admin setelah update berhasil
    header("location: tambah_guru.php?message=Guru berhasil diupdate");
} else {
    echo "Gagal mengupdate data guru: " . mysqli_error($koneksi);
}
?>
