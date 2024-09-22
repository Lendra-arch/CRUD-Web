<?php
include 'db.php';

// Create Student
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $conn->query("INSERT INTO students (name, age, grade) VALUES ('$name', '$age', '$grade')");
    header('location: halaman_utama.php');
}

// Update Student
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $conn->query("UPDATE students SET name='$name', age='$age', grade='$grade' WHERE id=$id");
    header('location: halaman_utama.php');
}

// Delete Student
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    header('location: halaman_utama.php');
}
?>
