<?php
require_once '../init.php';
require_once '../controllers/AuthController.php';

$auth = new AuthController($db);
if ($auth->isLoggedIn()) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth->register($_POST['name'], $_POST['email'], $_POST['password']);
    header("Location: index.php");
}
?>

<h2>Register</h2>
<form method="post">
    <input name="name" placeholder="Name" required><br>
    <input name="email" type="email" placeholder="Email" required><br>
    <input name="password" type="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>
<a href="../index.php">Login</a>
