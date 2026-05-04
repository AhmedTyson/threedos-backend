<?php

require_once __DIR__ . "/../helper/db.php";

function getAllAircraft(PDO $conn) {
    $sql = "SELECT * FROM Aircraft";
    return runQuery($conn, $sql)->fetchAll();
}

function createAircraft(PDO $conn, $airlineId, $model, $capacity) {
    $sql = "INSERT INTO Aircraft (AirlineID, Model, Capacity) VALUES (?, ?, ?)";
    runQuery($conn, $sql, [$airlineId, $model, $capacity]);
    return $conn->lastInsertId();
}

function getAircraftById(PDO $conn, $id) {
    $sql = "SELECT * FROM Aircraft WHERE AircraftID = ?";
    return runQuery($conn, $sql, [$id])->fetch();
}

function deleteAircraft(PDO $conn, $id) {
    $sql = "DELETE FROM Aircraft WHERE AircraftID = ?";
    return runQuery($conn, $sql, [$id])->rowCount() > 0;
}
