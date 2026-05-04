<?php

require_once __DIR__ . "/../helper/response.php";

$config = [
    "host" => "localhost",
    "user" => "root",
    "password" => "",
    "dbName" => "airline_db"
];

try {
    $conn = new PDO("mysql:host={$config['host']};dbname={$config['dbName']}",$config['user'],$config['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    response(HttpStatus::INTERNAL_SERVER_ERROR, "Database connection failed: " . $e->getMessage());
}
