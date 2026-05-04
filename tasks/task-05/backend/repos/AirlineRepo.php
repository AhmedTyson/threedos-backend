<?php

require_once __DIR__ . "/../helper/db.php";

function getAllAirlines(PDO $conn) {
    $sql = "SELECT * FROM Airline";
    return runQuery($conn, $sql)->fetchAll();
}

function getAirlineById(PDO $conn, $id) {
    $sql = "SELECT * FROM Airline WHERE AirlineID = ?";
    return runQuery($conn, $sql, [$id])->fetch();
}

function getAirlineByName(PDO $conn, $name) {
    $sql = "SELECT * FROM Airline WHERE Name LIKE ?";
    return runQuery($conn, $sql, ["%$name%"])->fetchAll();
}

function createAirline(PDO $conn, $name, $address, $contact, $phone, $balance) {
    $sql = "INSERT INTO Airline (Name, Address, ContactPerson, PhoneNumber, CurrentBalance) VALUES (?, ?, ?, ?, ?)";
    runQuery($conn, $sql, [$name, $address, $contact, $phone, $balance]);
    return $conn->lastInsertId();
}

function getCurrentBalance(PDO $conn, $airlineId) {
    $sql = "SELECT CurrentBalance FROM Airline WHERE AirlineID = ?";
    $result = runQuery($conn, $sql, [$airlineId])->fetch();
    return $result['CurrentBalance'] ?? 0;
}

function updateAirline(PDO $conn, $id, $name, $address, $contact, $phone, $balance) {
    $sql = "UPDATE Airline SET Name = ?, Address = ?, ContactPerson = ?, PhoneNumber = ?, CurrentBalance = ? WHERE AirlineID = ?";
    $stmt = runQuery($conn, $sql, [$name, $address, $contact, $phone, $balance, $id]);
    return $stmt->rowCount() > 0;
}

function deleteAirline(PDO $conn, $id) {
    $sql = "DELETE FROM Airline WHERE AirlineID = ?";
    return runQuery($conn, $sql, [$id])->rowCount() > 0;
}
