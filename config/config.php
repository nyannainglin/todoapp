<?php

session_start();
define('DB_NAME', 'todoapp');
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');

$options = array (
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);
$pdo = new PDO(
    'mysql:host='.MYSQL_HOST.';dbname='.DB_NAME,
    MYSQL_USER,
    MYSQL_PASSWORD,$options
);
?>
