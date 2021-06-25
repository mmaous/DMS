<?php


function connect($database = ""){
    if($database = "")
        $connect = new PDO("mysql:host=127.0.0.1", "root","password");
    else
        $connect = new mysqli("127.0.0.1","root","password",$database);
    return $connect;
}
function onlyUsersDb(PDOStatement $dbnames)
{
    $_adminDb = ['information_schema','mysql','performance_schema','phpmyadmin'];
    $usersDb = [];
    foreach ($dbnames as $db)
        if (!in_array($db[0], $_adminDb))
            array_push($usersDb, $db[0]);
    return $usersDb;
}

function cleanString($string) {
    $string = str_replace(' ', '_', $string);

     $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    return str_replace('-', '_', $string);
}