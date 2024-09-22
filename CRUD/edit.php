<?php
include 'db.php';

// Test 1: Fetch the student by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $age = $row['age'];
        $grade = $row['grade'];
    } else {
        echo "Student not found!";
        exit;
    }
}

// Test 2 & 3: Update student information
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    $conn->query("UPDATE students SET name='$name', age='$age', grade='$grade' WHERE id=$id");
    
    // Test 3: Redirect back to index.php after update
    header('location: halaman_utama.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>

        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="text" name="name" value="<?= $name; ?>" required>
            <input type="number" name="age" value="<?= $age; ?>" required>
            <input type="text" name="grade" value="<?= $grade; ?>" required>
            <button type="submit" name="update">Update Student</button>
        </form>
    </div>
</body>
</html>
