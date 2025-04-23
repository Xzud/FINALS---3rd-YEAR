<?php

include "db_conn.php";

session_start();
if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "Password incorrect!";
        }
    } else{
        $message = "Username not found!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <form method="POST" class="login box">
            <h1>Login</h1>
            <div>
                <div class="pair">Username: <input type="text" name="username" id="username" required></div>
                <?php if (isset($message)) { ?>
                    <span class="error"><?= $message ?></span>
                <?php } ?>
                <div class="pair">Password: <input type="password" name="password" id="password" required></div>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn">Log in</button>
                <span>or</span>
                <a href="register.php">Register</a>
            </div>
        </form>
    </div>

</body>

</html>