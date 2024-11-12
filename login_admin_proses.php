<?php
session_start();
include "koneksi.php";

// Cek jika form telah di-submit
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data admin berdasarkan username
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $admin = mysqli_fetch_assoc($result);

    // Verifikasi password dan cek apakah user ada
    if($admin && password_verify($password, $admin['password'])){
        // Set session untuk admin
        $_SESSION['username'] = $admin['username'];
        $_SESSION['role'] = 'admin';
        
        // Redirect ke halaman admin
        header("location: index_admin.php");
        exit;
    } else {
        // Jika login gagal, kembali ke halaman login dengan pesan error
        header("location: login_admin.php?error=1");
        exit;
    }
}
?>
