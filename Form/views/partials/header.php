<!-- views/partials/header.php -->
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Minecraft Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="theme-overworld">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php?action=dashboard">🧱 Minecraft</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php?action=form">Form</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?action=data">Data</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <a class="btn btn-sm btn-outline-light" href="index.php?action=logout">Logout</a>
      </div>
    </div>
  </div>
</nav>
<main class="container my-4">
