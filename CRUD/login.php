<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="Judul_login">Login!</h1>
        <p>Login dulu ya</p>
<form action="proses_login.php" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" required>
  <br>
  <button type="submit" value="Login">Login</button>
</form>
</div>
<br>
<h6>Tidak punya akun?<a href="register.php">Buat Akun</a></h6>
</body>
</html>