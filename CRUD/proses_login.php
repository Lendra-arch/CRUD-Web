<?php
session_start();
include 'koneksi.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (password_verify($password, $row['password'])) {
  $_SESSION['login'] = true;
  $_SESSION['username'] = $username;
  header("Location: halaman_utama.php");
} else {
  echo "Username atau Password salah";
}
?>