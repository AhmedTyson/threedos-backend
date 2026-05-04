<?php

require_once __DIR__ . "/../helper/db.php";

function getAllEmployees(PDO $conn) {
    $sql = "SELECT Employee.*, Airline.Name as AirlineName 
            FROM Employee 
            JOIN Airline ON Employee.AirlineID = Airline.AirlineID";
    return runQuery($conn, $sql)->fetchAll();
}

function getEmployeesByName(PDO $conn, $name) {
    $sql = "SELECT Employee.*, Airline.Name as AirlineName 
            FROM Employee 
            JOIN Airline ON Employee.AirlineID = Airline.AirlineID 
            WHERE Employee.Name LIKE ?";
    return runQuery($conn, $sql, ["%$name%"])->fetchAll();
}

function createEmployee(PDO $conn, $airlineId, $name, $birthDate, $gender, $position) {
    $sql = "INSERT INTO Employee (AirlineID, Name, BirthDate, Gender, Position) VALUES (?, ?, ?, ?, ?)";
    runQuery($conn, $sql, [$airlineId, $name, $birthDate, $gender, $position]);
    return $conn->lastInsertId();
}

function getEmployeeById(PDO $conn, $id) {
    $sql = "SELECT Employee.*, Airline.Name as AirlineName 
            FROM Employee 
            JOIN Airline ON Employee.AirlineID = Airline.AirlineID 
            WHERE Employee.EmployeeID = ?";
    return runQuery($conn, $sql, [$id])->fetch();
}

function deleteEmployee(PDO $conn, $id) {
    $sql = "DELETE FROM Employee WHERE EmployeeID = ?";
    return runQuery($conn, $sql, [$id])->rowCount() > 0;
}

