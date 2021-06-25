<?php
require 'functions.php';

$connect = connect();
$dbname = $_GET['databaseName'];

$connect->exec("CREATE OR REPLACE DATABASE $dbname;");

header('Location: ../views/DbForm.php?databasename='.$dbname);
