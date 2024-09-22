<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
        <h1>Registration Form</h1>
        <form action="" method="POST">
            Username: <input type="text" name="user" required><br />
            Password: <input type="password" name="pass" required><br />
            <input type="submit" value="Register" name="submit" />
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            // Koneksi ke database
            $con = mysqli_connect('localhost', 'root', '', 'school') or die(mysqli_error($con));

            // Periksa apakah username sudah ada
            $query = mysqli_prepare($con, "SELECT * FROM users WHERE username = ?");
            mysqli_stmt_bind_param($query, "s", $user);
            mysqli_stmt_execute($query);
            $result = mysqli_stmt_get_result($query);
            $numrows = mysqli_num_rows($result);

            if ($numrows == 0) {
                // Hash password sebelum menyimpannya ke database
                $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

                // Buat akun baru dengan password yang sudah di-hash
                $sql = mysqli_prepare($con, "INSERT INTO users (username, password) VALUES (?, ?)");
                mysqli_stmt_bind_param($sql, "ss", $user, $hashed_pass);
                $execute_result = mysqli_stmt_execute($sql);

                if ($execute_result) {
                    echo "Account Successfully Created";
                } else {
                    echo "Failure!";
                }
            } else {
                echo "That username already exists! Please try again with another.";
            }

        } else {
            echo "All fields are required!";
        }
    }
    ?>
</body>
</html>
