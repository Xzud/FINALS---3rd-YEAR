<?php


session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welcome to dashboard
    <?= $_SESSION['user'] ?>
    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</body>
</html>