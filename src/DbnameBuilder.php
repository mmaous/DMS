<?php
require 'functions.php';

$connect = connect();

//$db = mysqli_select_db();
$dbname = $_GET['databaseName'];

$connect->exec("CREATE DATABASE $dbname;");
echo $dbname;