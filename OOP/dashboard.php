<?php
session_start();
require_once "includes/Auth.php";
$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit;
}

include "views/dashboard.php";
