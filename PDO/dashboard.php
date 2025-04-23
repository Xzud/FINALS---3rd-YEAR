<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <?php include './head.php'; ?>
</head>
<body class="container py-5">
    <div class="wrapper flex flex-col">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <p>This is your dashboard.</p>
        
    <form action="logout.php" method="POST">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    </div>
</body>
</html>
