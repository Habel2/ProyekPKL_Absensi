<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("location: login_admin.php");
    exit;
}

// Ambil semua data riwayat absensi
$query = "SELECT * FROM absensi ORDER BY tanggal_absen DESC";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Absensi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Riwayat Absensi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal Absensi</th>
                    <th>Status Aktif</th>
                    <th>Detail</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['tanggal_absen']; ?></td>
                        <td><?php echo ($row['status_aktif'] == 1) ? 'Aktif' : 'Tidak Aktif'; ?></td>
                        <td>
                            <a href="absensi_detail_admin.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Detail</a>
                        </td>
                        <td>
                            <form action="hapus_absensi.php" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus absensi ini?');">
                                <input type="hidden" name="absensi_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
