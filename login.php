<?php
include_once 'connect.php';

session_start();

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if ($username && $password) {
        // Run query to verify user
        $query = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "<p style='color:red;'>Invalid credentials</p>";
        }
    } else {
        echo "<p style='color:red;'>Username and password required</p>";
    }
}
?>

<!-- Basic login form -->
<form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <input type="submit" value="Login" />
</form>
