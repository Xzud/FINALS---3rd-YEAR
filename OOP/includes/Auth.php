<?php

require_once "Database.php";

class Auth extends Database {
    public function register($username, $password){
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }

    public function login($username, $password){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($user){
            if(password_verify($password, $user['password'])){
                $_SESSION['user'] = $user['username'];
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function isLoggedIn(){
        return isset($_SESSION['user']);
    }

    public function logout(){
        session_destroy();
        unset($_SESSION['user']);
    }
}