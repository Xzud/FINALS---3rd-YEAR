<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include './views/partials/head.php'
    ?>
    <title>Register</title>
</head>

<body class="container py-5 ">
    <div class="wrapper">
        <div class="box">
            <h2 class="mb-3">Register</h2>
            <?php Flash::display('register_success', 'success'); ?>
            <?php Flash::display('register_error', 'danger'); ?>

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