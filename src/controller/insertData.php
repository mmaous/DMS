<?php

//if (!isset($_POST["insertAnother"], $_POST["db"], $_POST["table"] ) or !isset($_POST["finished"], $_POST["db"], $_POST["table"] ) ){
//    header("Location: /DMS/");
//    die();
//}
require 'functions.php';


$db = $_POST["db"];
$table = $_POST["table"];

$connect = connectDB($db);

$fields = $connect->query("desc ".$table);
if(isset($_POST["modifiy"], $_POST["id"]))
     $connect->query("delete from  ".$table." where id = ". $_POST["id"]);

$fieldNames = [];

if ($fields->num_rows > 0)
    while ($field = $fields->fetch_assoc())
        array_push($fieldNames, $field["Field"]);

$values = "";
print_r($fieldNames);
echo "<br>";
print_r($_POST);
echo "<br>";

unset($fieldNames[array_search("id",$fieldNames)]); // remove id
$fieldNamesBackup = $fieldNames;

$query = "INSERT INTO ".$table.' ( '.array_shift($fieldNames);

foreach ($fieldNames as $fieldName)
    $query .= ", ".$fieldName;

 $query .= ")  VALUES ( '".$_POST[array_shift($fieldNamesBackup)]."'";

foreach ($fieldNamesBackup as $fieldName)
    $query .= ", '".$_POST[$fieldName]."'";

$query .= ");";

$connect->query($query);

$connect->close();

// DMS/src/controller/ShowData.php?table=courses&db=farah_hotel&consult=
if(isset($_POST["finished"]) OR isset($_POST["modifiy"]))
    header("Location: /DMS/src/controller/ShowData.php?table=".$table."&db=".$db."&consult=".$db);
elseif(isset($_POST["insertAnother"]))
    header("Location: /DMS/src/views/insertForm.php?table=".$table."&db=".$db);


