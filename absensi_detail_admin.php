<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("location: login_admin.php");
    exit;
}

// Ambil ID absensi dari URL
$absensi_id = $_GET['id'];

// Ambil detail absensi siswa berdasarkan absensi_id
$query = "
    SELECT siswa.nama, absen_siswa.status, absen_siswa.waktu_absen, absen_siswa.id AS absen_siswa_id, absen_siswa.siswa_id
    FROM absen_siswa
    JOIN siswa ON absen_siswa.siswa_id = siswa.id
    WHERE absen_siswa.absensi_id = '$absensi_id'
";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Absensi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Detail Absensi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                    <th>Waktu Absensi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo ($row['status'] == 'tidak hadir') ? 'Belum Hadir' : htmlspecialchars($row['status']); ?></td>
                        <td><?php echo ($row['waktu_absen']) ? htmlspecialchars($row['waktu_absen']) : 'Belum Absensi'; ?></td>
                        <td>
                            <a href="edit_riwayat_absensi_siswa.php?id=<?php echo $row['absen_siswa_id']; ?>&absensi_id=<?php echo $absensi_id; ?>" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
