<?php
session_start();
require_once 'config/Database.php';
$db = (new Database())->connect();
