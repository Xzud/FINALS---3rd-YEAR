<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<style>
    .wrapper{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        flex-direction: column;
    }

    *{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
    }

    a{
        padding: .5rem 1rem;
        border-radius: .5rem;
        background-color: #DD3B4B;
        text-decoration: none;
        font-weight: bold;
        color: white;
    }
</style>

<div class="wrapper">
        
    <h2>Welcome, <?= $_SESSION['user'] ?>!</h2>
    <a href="logout.php">Logout</a>
</div>
