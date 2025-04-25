<?php
session_start();
require_once "includes/Auth.php";
require_once "includes/Flash.php";

$auth = new Auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($auth->login($_POST['username'], $_POST['password'])) {
        
        header("Location: dashboard.php");
        exit;
    } else {
        Flash::set('login_error', 'Invalid username or password.');
        header("Location: login.php");
        exit;
    }
}

include "views/login.php";
