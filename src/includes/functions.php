<?php

function get_database_connection()
{
    $dsn = $_SERVER["API_ENDPOINT"] ?? "mysql:dbname=philoi;host=localhost";
    $username = $_SERVER["USERNAME"] ?? "root";
    $password = $_SERVER["PASS"] ?? "";

    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $exception) {
        echo $exception->getMessage();
        exit(1);
    }

    return $pdo;
}

function generate_pin()
{
    $digits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    $pin = "";
    for ($i = 0; $i < 6; $i++) {
        $pin .= array_rand($digits);
    }
    return $pin;
}
