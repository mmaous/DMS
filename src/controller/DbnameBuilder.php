<?php
require 'functions.php';

$connect = connectServer();
$dbname = $_GET['db'];

$connect->exec("CREATE OR REPLACE DATABASE $dbname;");
$connect = null;
header('Location: ../views/DbForm.php?db='.$dbname);
