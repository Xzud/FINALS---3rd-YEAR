<?php
require_once './init.php';
require_once './controllers/AuthController.php';

$auth = new AuthController($db);
if ($auth->isLoggedIn()) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($auth->login($_POST['email'], $_POST['password'])) {
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>

<h2>Login</h2>
<form method="post">
    <input name="email" type="email" placeholder="Email" required><br>
    <input name="password" type="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<a href="views/register.php">Register</a>
