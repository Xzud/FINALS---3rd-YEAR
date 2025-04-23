<?php
class AuthController {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hash
        ]);
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}
