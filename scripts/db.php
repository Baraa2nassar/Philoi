<?php

function get_database_connection() 
{
    $dsn = "mysql:dbname=philoi;host=localhost:8889";
    // $dsn = "mysql:dbname=philoi;host=localhost";
    $username = "root";
    $password = "PqxT5bdsD7K/FHHn";

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

function isAmountInputValid($input) 
{
    if (!is_numeric($input)) {
        return false;
    }
    
    $amount = floatval($input);
    $amountIsPositive = ($amount > 0);

    // amount should have a maximum of 2 decimal places
    $amountHasValidDecimals = (round($amount, 2) === $amount);
    
    return $amountIsPositive and $amountHasValidDecimals;
}

function formatAmount($amount)
{
    $prefix = ($amount < 0 ? '-$' : '$');
    return $prefix . number_format(abs($amount), 2, '.', ',');
}
