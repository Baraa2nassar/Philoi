<?php


function get_database_connection()
{
    $dsn = "mysql:dbname=philoi;host=localhost";
    $username = "root";
    $password = "";

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

