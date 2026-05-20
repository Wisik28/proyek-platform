<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — Sistem Pelaporan DLH Sleman</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <div class="form-container">
        <h2>Daftar Akun</h2>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form action="/register-post" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required
                       value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi <small style="color:#888;">(min. 6 karakter)</small></label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>

            <button type="submit" class="btn btn-primary">Buat Akun</button>
        </form>

        <div class="form-link">
            Sudah punya akun? <a href="/login">Masuk di sini</a>
        </div>
    </div>

</body>
</html>
