<?php include __DIR__ . '/partials/header.php'; ?>

<div class="form-container">
  <h2>Selamat datang, <?= htmlspecialchars($_SESSION['username'] ?? ''); ?></h2>
  <p>Gunakan menu di atas untuk menambahkan dunia baru atau melihat data yang sudah tersimpan.</p>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
