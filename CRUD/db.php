<?php
$host = 'localhost';
$user = 'root';  // Use your MySQL username
$pass = '';  // Use your MySQL password
$dbname = 'school';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
