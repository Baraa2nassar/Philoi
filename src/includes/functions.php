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

function generate_game_pin()
{
  $digits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
  $output = "";
  for ($i = 0; $i < 6; $i++) {
    $output .= array_rand($digits);
  }
  return $output;
}

function redirect_if_not_set(string $session_key, string $redirect_url)
{
  if (!isset($_SESSION[$session_key])) {
    header("Location: $redirect_url");
    exit;
  }
  unset($_SESSION[$session_key]);
}
