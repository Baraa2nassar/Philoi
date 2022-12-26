<?php

function get_database_connection()
{
    $dsn = $_SERVER['API_ENDPOINT'] ?? "mysql:dbname=philoi;host=localhost";
    $username = $_SERVER['USERNAME'] ?? "root";
    $password = $_SERVER['PASS'] ?? "";

    try {
        $pdo = new PDO($dsn, $username, $password);
    }
    catch (PDOException $exception) {
        $error_message = $exception->getMessage();
        echo $error_message;
        exit(1);
    }

    return $pdo;
}
