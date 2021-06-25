<?php
require 'functions.php';

$connect = connectServer();
$dbname = $_GET['databaseName'];

$connect->exec("CREATE OR REPLACE DATABASE $dbname;");
$connect = null;
header('Location: ../views/DbForm.php?databasename='.$dbname);
