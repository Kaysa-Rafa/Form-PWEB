<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar | Modern Minecraft</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="theme-overworld">
    <div class="login-container">
        <h1 class="title">🧱 Buat Akun Baru</h1>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <form action="../index.php?action=register" method="POST" class="login-form">
            <input type="text" name="username" placeholder="Username" required class="input-field">
            <input type="password" name="password" placeholder="Password" required class="input-field">
            <button type="submit" class="btn btn-glow">Daftar Sekarang</button>
        </form>

        <p class="register-link">Sudah punya akun?
            <a href="login.php" class="link">Masuk di sini</a>
        </p>

        <div class="theme-switch">
            <button id="overworld" class="switch-btn active">Overworld</button>
            <button id="nether" class="switch-btn">Nether</button>
            <button id="end" class="switch-btn">End</button>
        </div>
    </div>

    <script src="../assets/js/theme-switch.js"></script>
</body>
</html>
