<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

// Ambil data absensi yang aktif
$absensi_query = "SELECT id FROM absensi WHERE status_aktif = 1";
$result_absensi = mysqli_query($koneksi, $absensi_query);

if(mysqli_num_rows($result_absensi) > 0){
    $absensi = mysqli_fetch_assoc($result_absensi);
    $absensi_id = $absensi['id'];

    // Ambil data absen siswa untuk absensi yang aktif
    $absen_siswa_query = "
        SELECT siswa.nama, absen_siswa.status, absen_siswa.waktu_absen
        FROM absen_siswa
        JOIN siswa ON absen_siswa.siswa_id = siswa.id
        WHERE absen_siswa.absensi_id = '$absensi_id'
    ";
    $result_absen_siswa = mysqli_query($koneksi, $absen_siswa_query);
} else {
    $absensi_aktif = false;
}

// Script untuk tombol tutup absensi
if(isset($_POST['tutup_absensi'])){
    $absensi_id = $_POST['absensi_id'];
    $query = "UPDATE absensi SET status_aktif = 0 WHERE id = '$absensi_id'";
    if(mysqli_query($koneksi, $query)){
        header("location: index.php");
        exit;
    } else {
        echo "Gagal menutup absensi.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Mulai Absensi</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Mulai Absensi</h2>

        <?php if(isset($absensi_aktif) && !$absensi_aktif): ?>
            <!-- Tombol untuk memulai absensi -->
            <form method="POST" action="absensi_mulai_proses.php">
                <button type="submit" class="btn btn-primary">Mulai Absensi</button>
            </form>
        <?php endif; ?>

        <!-- Tombol untuk menutup dan membatalkan absensi -->
        <?php if(mysqli_num_rows($result_absensi) > 0): ?>
            <div class="d-flex mt-3">
                <form method="POST" action="absensi_batal.php" class="mr-1">
                    <input type="hidden" name="absensi_id" value="<?php echo $absensi_id; ?>">
                    <input type="submit" value="Batalkan Absensi" onclick="return confirm('Anda yakin ingin membatalkan sesi absensi ini?');" class="btn btn-dark">
                </form>

                <form method="POST" action="">
                    <input type="hidden" name="absensi_id" value="<?php echo $absensi_id; ?>">
                    <button type="submit" name="tutup_absensi" class="btn btn-danger">Tutup Absensi</button>
                </form>
            </div>

            <!-- Tabel absensi siswa -->
            <h3>Data Absensi Siswa</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Status</th>
                        <th>Waktu Absensi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result_absen_siswa)): ?>
                        <tr>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo ($row['status'] == 'tidak hadir') ? 'belum hadir' : $row['status']; ?></td>
                            <td><?php echo ($row['waktu_absen']) ? $row['waktu_absen'] : 'Belum Absensi'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>


