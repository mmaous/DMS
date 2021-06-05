<?php
$connect = new PDO("mysql:host=127.0.0.1", 'root', 'password');

//$db = mysqli_select_db();
$dbname = $_GET['dbname'];

$connect->exec("CREATE DATABASE $dbname;");
echo $dbname;