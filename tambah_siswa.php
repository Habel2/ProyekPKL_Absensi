<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Tambah Siswa</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Siswa Baru</h2>
        <form action="tambah_siswa_proses.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama Siswa" required>
            </div>
            <div class="form-group">
                <label for="password">Password Siswa</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password Siswa" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
            <a href="index.php" class="btn btn-danger">Batal</a>
        </form>
    </div>

    <div class="container">
    <div class="list">
        <table>
            <?php
            include_once 'koneksi.php';
            $data=mysqli_query($koneksi, "select * from siswa;");
            while ($d=mysqli_fetch_array($data)){
            ?>   
            <div class="container">
                <tr>
                    <td><h4><?php echo $d['nama']; ?></h4></td>
                    <td>
                    <a href="edit.php ?id=<?php echo $d['id'];?>">Edit</a>
                    |
                    <a href="hapus.php ?id=<?php echo $d['id'];?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>
    </div>
</body>
</html>
