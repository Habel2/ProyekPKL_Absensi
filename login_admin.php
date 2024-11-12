<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Login Admin</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Login Admin</h2>
        <form action="login_admin_proses.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3">
                Username atau password salah, silakan coba lagi.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
