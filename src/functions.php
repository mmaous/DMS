<?php
function connect(){
    $connect = new PDO("mysql:host=127.0.0.1", "root","password");
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