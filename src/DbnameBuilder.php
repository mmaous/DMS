<?php
$connect = mysqli_connect('127.0.0.1', 'root', 'password');
//$db = mysqli_select_db();
$dbname = $_GET['dbname'];

$connect->real_query("CREATE DATABASE $dbname;");
echo $dbname;