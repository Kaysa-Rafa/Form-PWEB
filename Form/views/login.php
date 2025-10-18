<!-- views/login.php -->
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login - Minecraft</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="theme-overworld">
<div class="d-flex justify-content-center align-items-center" style="min-height:100vh;">
  <div class="card p-4" style="width:360px; background: rgba(0,0,0,0.6);">
    <h4 class="text-center text-emerald mb-3">Minecraft Portal</h4>
    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger">Username atau password salah.</div>
    <?php endif; ?>
    <form action="index.php?action=auth" method="POST">
      <div class="mb-2">
        <input type="text" name="username" class="form-control" placeholder="username" required>
      </div>
      <div class="mb-2">
        <input type="password" name="password" class="form-control" placeholder="password" required>
      </div>
      <div class="d-grid">
        <button class="btn btn-glow">Masuk</button>
      </div>
    </form>
  </div>
</div>
<script src="assets/js/theme-switch.js"></script>
</body>
</html>
