<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Sistem Pelaporan DLH Sleman</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <div class="form-container">
        <h2> Masuk</h2>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form action="/login-post" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>

            <button type="submit" class="btn btn-primary">Masuk</button>
        </form>

        <div class="form-link">
            Belum punya akun? <a href="/register">Daftar sekarang</a>
        </div>

        <div class="demo-credentials">
            Demo: admin / admin123
        </div>
    </div>

</body>
</html>
