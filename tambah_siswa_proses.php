<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

$nama = $_POST['nama'];
$password = $_POST['password'];

// Proses insert data ke tabel siswa
$query = "INSERT INTO siswa (nama, password) VALUES ('$nama', '$password')";

if(mysqli_query($koneksi, $query)){
    // Jika berhasil, kembali ke halaman index
    header("location:tambah_siswa.php");
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
