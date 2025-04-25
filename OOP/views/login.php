<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <?php include 'views/partials/head.php'; ?>
</head>

<body class="container py-5">
    <div class="wrapper">
        <div class="box w-[20rem]" >
            <h2>Login</h2>
            <?php Flash::display('login_error', 'danger'); ?>
            <?php Flash::display('register_success', 'success'); ?>

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


<a href="/index.php" style="position:absolute; top:10px; left:10px;">Home</a>

</html>