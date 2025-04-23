<?php
session_start();
require_once "includes/Auth.php";
require_once "includes/Flash.php";

$auth = new Auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registered = $auth->register($_POST['username'], $_POST['password']);
    if ($registered) {
        Flash::set('register_success', 'Registered successfully! You can now login.');
        header("Location: login.php");
    } else {
        Flash::set('register_error', 'Registration failed. Try a different username.');
        header("Location: register.php");
    }
    exit;
}

include "views/register.php";
