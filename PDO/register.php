<?php
session_start();
require 'db_conn.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $message = "Username already taken.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashedPassword]);
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit();
        }
    } else {
        $message = "Both fields are required.";
    }
}
?>

<!-- Simple registration form -->
<form method="POST">
    <h2>Register</h2>
    <?php if ($message): ?>
        <div style="color:red"><?= $message ?></div>
    <?php endif; ?>
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <button type="submit">Register</button>
</form>
