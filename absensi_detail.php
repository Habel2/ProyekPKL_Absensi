<<?php 
session_start();
include "koneksi.php";

// Ambil ID sesi absensi
$absensi_id = $_GET['id'];

// Ambil data absensi siswa untuk sesi ini
$query = "SELECT siswa.nama, absen_siswa.status, absen_siswa.waktu_absen 
          FROM absen_siswa
          JOIN siswa ON absen_siswa.siswa_id = siswa.id
          WHERE absen_siswa.absensi_id = '$absensi_id'";
$result = mysqli_query($koneksi, $query);

// Ambil waktu absensi
$query_waktu = "SELECT waktu_absen FROM absen_siswa WHERE absensi_id = '$absensi_id' LIMIT 1";
$result_waktu = mysqli_query($koneksi, $query_waktu);
$row_waktu = mysqli_fetch_assoc($result_waktu);
$waktu_absen = $row_waktu['waktu_absen'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Detail Absensi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail waktu absensi pada <?php echo $waktu_absen; ?></h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                    <th>Waktu Absensi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo ($row['status'] == 'tidak hadir') ? 'Belum Hadir' : $row['status']; ?></td>
                    <td><?php echo ($row['waktu_absen']) ? $row['waktu_absen'] : 'Belum Absensi'; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
