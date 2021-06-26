<?php


/**
 * @return PDO
 */

function connectServer(): PDO
{
        $connect =  new PDO("mysql:host=127.0.0.1", "root","password");

//        if ($connect->errorInfo()){
//            die("Échec de la connexion :SERVER: ". $connect->errorCode());
//        }
        return $connect;
}

/**
 * @param $database
 * @return mysqli
 */

function connectDB($database): mysqli
{

    $connect = new mysqli("localhost","root","password","$database");

    if ($connect->connect_error){
        die("Échec de la connexion :DATABASE: : " . $connect->connect_error);
    }

    return $connect;
}
/**
 * @param PDOStatement $dbnames
 * @return array
 */

function onlyUsersDb(PDOStatement $dbnames)
{
    $_adminDb = ['information_schema','mysql','performance_schema','phpmyadmin','stim_db']; // ,'php', 'java', 'hotel_farah','hello','test'
    $usersDb = [];
    foreach ($dbnames as $db)
        if (!in_array($db[0], $_adminDb))
            array_push($usersDb, $db[0]);
    return $usersDb;
}

/**
 * @param $string
 * @return array|string|string[]
 */

function cleanString($string) {
    $string = str_replace(' ', '_', $string);

    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    return str_replace('-', '_', $string);
}