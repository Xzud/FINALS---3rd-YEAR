<?php
require_once '../init.php';
require_once '../controllers/AuthController.php';

$auth = new AuthController($db);
if (!$auth->isLoggedIn()) {
    header("Location: ../index.php");
    exit;
}

$user = $_SESSION['user'];
?>

<h2>Welcome, <?= htmlspecialchars($user['name']) ?>!</h2>
<p>Email: <?= htmlspecialchars($user['email']) ?></p>
<a href="../logout.php">Logout</a>
