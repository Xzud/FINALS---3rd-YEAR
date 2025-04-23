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
<html>

<head>
    <title>Login</title>
    <?php include './head.php'; ?>
</head>

<body class="container py-5">
    <div class="wrapper">
        <div class="box w-[20rem]" >
            <h2>Login</h2>

            <form action="login.php" method="post" class="w-full">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" required placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="register.php" class="btn btn-link">Register</a>
            </form>
        </div>
    </div>
</body>

</html>