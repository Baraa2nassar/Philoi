<?php

function get_database_connection()
{
    $dsn = $_SERVER['API_ENDPOINT'];
    $username =  $_SERVER['USERNAME'];
    $password =  $_SERVER['PASS'];

    try {
        $pdo = new PDO($dsn, $username, $password);
        // $pdo = new mysqli($host, $username, $password,$db_name);
    }
    catch (PDOException $exception) {
        $error_message = $exception->getMessage();
        echo $error_message;
        exit(1);
    }

    return $pdo;
}
