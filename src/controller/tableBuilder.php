<?php
require 'functions.php';
$connect = connect();
$tableName = cleanString($_GET["tableName"]);

$query = "CREATE OR REPLACE TABLE ".$tableName."(";

//print_r($_GET);

$types= $_GET["type"];
$cols= $_GET["col"];
$lengths= $_GET["length"];
$col1 = cleanString(current($cols));
$type1 = current($types);
$length1 = intval(current($lengths)) ;
$nbrCols = $iter = count($types);

if ($type1 === 'bool'){
    $insert = "$col1 tinyint(1)";
}else{
    $insert = "$col1 $type1($length1)";
}


for ($i = 1; $i <= $nbrCols; $i++ )
{
    if($iter <= 1 )
        $insert .= ");";
    else{
        $iter--;
        if (next($types) === "bool"){
            echo "hehe";
            $insert .= ",".next($cols)." tinyint(1)";
        }else{
            $insert .= ",".next($cols)." ".next($types)."(".next($lengths).")";
        }
    }
}
$query .= $insert;
$connect->query($query);
//echo is_array($types);


