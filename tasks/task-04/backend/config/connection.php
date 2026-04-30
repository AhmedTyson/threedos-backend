<?php
if(!isset($_SESSION)){
    session_start();
}
$host = "localhost";
$user = "root";
$pass ="";
$database = "organizo";


try {
    $connection = new PDO("mysql:host=$host;dbname=$database",$user,$pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $err) {
    echo "connection failed".$err->getMessage();
}

