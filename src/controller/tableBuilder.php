<?php
require 'functions.php';
const home = "/DMS/src/";

$tableName = cleanString($_GET["table"]);

$query = "CREATE OR REPLACE TABLE ".$tableName."(";

$types= $_GET["type"];
//print_r($types);
$cols= $_GET["col"];
$lengths= $_GET["length"];
$col1 = cleanString(current($cols));
$type1 = current($types);
$length1 = intval(current($lengths)) ;
$nbrCols = count($types);
$iter = 0;

$query .= "id int(255)	 PRIMARY KEY AUTO_INCREMENT ";

if ($type1 === 'tinyint(1)'){
    $insert = ", $col1 tinyint(1)";
}else{
    $insert = ", $col1 $type1($length1)";
}
$query .= $insert;


for ($i = 1; $i <= $nbrCols; $i++ )
{
    if($iter === $nbrCols - 1 )
        $query .= ");";
    else{
        $iter++;
        if(next($lengths) =="tinyint(1)"){
            $query .= ",".next($cols)."tinyint(1)";
            next($types);
            next($lengths);
        }else{
            $length = next($lengths);
            if($length <1)
                $query .= ",".next($cols)." ".next($types)." ";
            else
                $query .= ",".next($cols)." ".next($types)."(".$length.")";

        }

    }
}
echo $query;
$dbname = $_GET["db"];
$connect = connectDB($dbname);
$connect->query($query);
$connect->close();

if(isset($_GET["finished"]))
    header("Location: /DMS/src/controller/DatabaseSelected.php?db=".$dbname);
elseif(isset($_GET["addAnotherTable"]))
    header("Location: ".home."views/DbForm.php?db=".$dbname."&table=".$tableName);



