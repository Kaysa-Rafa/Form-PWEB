<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Minecraft</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="overworld">
<div class="form-container">
  <h2>🔒 Login Minecraft</h2>
  <form method="POST" action="index.php?action=auth">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit" class="btn">Login</button>
  </form>
</div>
</body>
</html>
