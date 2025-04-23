<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <?php include 'views/partials/head.php'; ?>
</head>
<body class="container py-5">
    <div class="wrapper flex flex-col">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <p>This is your dashboard.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
