<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
$mysqli = new mysqli("localhost", "root", "", "school");

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch students data from the database
$query = "SELECT * FROM students";
$result = $mysqli->query($query);

// Check if the query was successful
if (!$result) {
    die("Query error: " . $mysqli->error); // Stop script and show query error
}

//echo "Selamat Datang " . $_SESSION['username'];
// Tambahkan konten halaman utama di sini

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>KTK MSK</h1>

        <form action="crud.php" method="POST">
            <input type="hidden" name="id" id="id">
            <input type="text" name="name" placeholder="Student Name" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="text" name="grade" placeholder="Grade" required>
            <button type="submit" name="create">Add Student</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['age']; ?></td>
                    <td><?= $row['grade']; ?></td>
                    <td class="but">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="sub_button">Edit</a>
                       <a href="crud.php?delete=<?= $row['id']; ?>" class="delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">No students found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
