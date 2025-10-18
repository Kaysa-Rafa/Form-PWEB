<?php include __DIR__ . '/partials/header.php'; ?>
<h2 class="text-light">Selamat datang, <?= htmlspecialchars($_SESSION['user'] ?? ''); ?>!</h2>
<p class="text-muted">Pilih aksi di atas (Form / Data / Canvas)</p>
<?php include __DIR__ . '/partials/footer.php'; ?>
