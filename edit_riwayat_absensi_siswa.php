<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("location: login_admin.php");
    exit;
}

// Ambil ID dari URL
if (isset($_GET['id']) && isset($_GET['absensi_id'])) {
    $absen_siswa_id = $_GET['id'];
    $absensi_id = $_GET['absensi_id'];

    // Ambil data kehadiran siswa berdasarkan ID
    $query = "SELECT * FROM absen_siswa WHERE id = '$absen_siswa_id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data absensi tidak ditemukan.");
    }
} else {
    die("ID absensi atau siswa tidak ditemukan.");
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];

    // Update status kehadiran
    $update_query = "UPDATE absen_siswa SET status = '$status' WHERE id = '$absen_siswa_id'";
    mysqli_query($koneksi, $update_query);

    // Redirect setelah berhasil
    header("Location: absensi_detail_admin.php?id=" . $absensi_id);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Riwayat Absensi Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Riwayat Absensi Siswa</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="status">Status Kehadiran:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="hadir" <?php echo ($data['status'] == 'hadir') ? 'selected' : ''; ?>>Hadir</option>
                    <option value="tidak hadir" <?php echo ($data['status'] == 'tidak hadir') ? 'selected' : ''; ?>>Tidak Hadir</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="absensi_detail_admin.php?id=<?php echo $absensi_id; ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
