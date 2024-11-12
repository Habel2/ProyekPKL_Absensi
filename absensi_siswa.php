<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['nama'])){
    header("location:login_siswa.php");
}

// Ambil absensi yang aktif untuk hari ini
$tanggal_hari_ini = date("Y-m-d");
$absensi_query = "SELECT id FROM absensi WHERE tanggal_absen = '$tanggal_hari_ini' AND status_aktif = 1";
$result_absensi = mysqli_query($koneksi, $absensi_query);

if(mysqli_num_rows($result_absensi) > 0){
    $absensi = mysqli_fetch_assoc($result_absensi);
    $absensi_id = $absensi['id'];

    // Ambil ID siswa berdasarkan session
    $nama_siswa = $_SESSION['nama'];
    $siswa_query = "SELECT id FROM siswa WHERE nama = '$nama_siswa'";
    $result_siswa = mysqli_query($koneksi, $siswa_query);
    $siswa = mysqli_fetch_assoc($result_siswa);
    $siswa_id = $siswa['id'];

    // Update status absen siswa menjadi hadir dan catat waktu absensi dengan NOW()
    $update_absen = "UPDATE absen_siswa 
                     SET status = 'hadir', waktu_absen = NOW() 
                     WHERE siswa_id = '$siswa_id' AND absensi_id = '$absensi_id'";
    if(mysqli_query($koneksi, $update_absen)){
        echo "Anda telah berhasil melakukan absensi.";
    } else {
        echo "Terjadi kesalahan saat melakukan absensi.";
    }
} else {
    echo "Tidak ada absensi yang aktif saat ini.";
}
?>