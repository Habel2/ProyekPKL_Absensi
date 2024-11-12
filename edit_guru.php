<?php
session_start();
include "koneksi.php";

// Pastikan user adalah admin
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("location:login_admin.php");
    exit;
}

// Ambil ID guru yang akan di-edit dari URL
$guru_id = $_GET['id'];

// Ambil data guru dari database
$query = "SELECT * FROM guru WHERE id = '$guru_id'";
$result = mysqli_query($koneksi, $query);
$guru = mysqli_fetch_assoc($result);

if (!$guru) {
    echo "Guru tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Guru</h2>
        <form action="edit_guru_proses.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $guru['id']; ?>">
            <div class="form-group">
                <label for="username">Nama Guru</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $guru['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
