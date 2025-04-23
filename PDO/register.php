<?php
session_start();
require 'db_conn.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $message = "Username already taken.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashedPassword]);
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    } else {
        $message = "Both fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <?php
    include "./head.php";
    ?>
</head>
<!-- Simple registration form -->

<body class="container py-5 ">
    <div class="wrapper">
        <div class="box">
            <h2 class="mb-3">Register</h2>

            <form action="register.php" method="post" class="">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" required placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="login.php" class="btn btn-link">Already have an account?</a>
            </form>
        </div>
    </div>
</body>

</html>