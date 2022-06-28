<?php
$db = "it";
$dsn = "mysql:host=localhost";
$user = "root";
$pass = "";
$dbh = new PDO($dsn, $user, $pass);
$dbh->exec("set names utf8");
?>