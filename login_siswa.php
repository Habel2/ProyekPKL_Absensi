<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Login Siswa</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Login Siswa</h2>
        <form action="login_siswa_proses.php" method="POST">
            <div class="form-group">
                <label for="nis">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
