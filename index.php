<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Systems</title>
</head>

<style>
    * {
        padding: 0;
        box-sizing: border-box;
        margin: 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
        display: flex;
        align-items: center;
    }

    .wrapper {
        min-height: 100vh;
        width: 100rem;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .group{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 20rem;
        margin-top: 20px;
    }

    .flex-center{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    a{
        padding: .5rem 1rem;
        border-radius: 1rem;
        background-color: red;
        font-weight: bold;
        color: white;
        text-decoration: none;
    }
</style>

<body>
    <div class="wrapper">
        <div class="flex-center">
            <h2>Login Systems</h2>
           <div class="group">
                <a href="./Procedural/login.php">Procedural</a>
                <a href="./PDO/login.php">PDO</a>
                <a href="./OOP/login.php">OOP</a>
           </div>
        </div>
    </div>
</body>

</html>