<?php
session_start();
include "koneksi.php";

// Ambil semua sesi absensi
$query = "SELECT * FROM absensi ORDER BY tanggal_absen DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Riwayat Absensi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Riwayat Absensi</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['tanggal_absen']; ?></td>
                    <td><?php echo ($row['status_aktif'] == 1) ? "Aktif" : "Tutup"; ?></td>
                    <td>
                        <a href="absensi_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Lihat Detail</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
