<?php

class Database{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "login_system";
    public $conn;


    public function __construct(){
        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database    
        );
        if ($this->conn->connect_error){
            die("Database connection failed: ". $this->conn->connect_error);
        }
    }
}