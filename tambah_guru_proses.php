<?php
session_start();
include "koneksi.php";

// Cek apakah user yang login adalah admin
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("location:login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Tambah guru ke database
    $query = "INSERT INTO guru (username, password) VALUES ('$username', '$password')";
    if(mysqli_query($koneksi, $query)){
        header("location:tambah_guru.php");
        exit;
    } else {
        echo "Gagal menambah guru.";
    }
}
?>
