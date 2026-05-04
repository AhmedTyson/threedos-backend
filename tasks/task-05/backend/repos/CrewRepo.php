<?php

require_once __DIR__ . "/../helper/db.php";

function createCrewRecord(PDO $conn, $aircraftId) {
    $sql = "INSERT INTO crew (AircraftID) VALUES (?)";
    runQuery($conn, $sql, [$aircraftId]);
    return $conn->lastInsertId();
}

function addMemberToCrew(PDO $conn, $crewId, $name, $role) {
    $sql = "INSERT INTO crewmember (CrewID, Name, Role) VALUES (?, ?, ?)";
    return runQuery($conn, $sql, [$crewId, $name, $role]);
}

function getCrewsWithMembers(PDO $conn) {
    $raw = runQuery($conn, crewBaseQuery())->fetchAll();
    return array_values(buildCrewMap($raw));
}

function deleteCrewRecord(PDO $conn, $crewId) {
    $sql = "DELETE FROM crew WHERE CrewID = ?";
    return runQuery($conn, $sql, [$crewId]);
}

function getCrewById(PDO $conn, $crewId) {
    $sql = crewBaseQuery() . " WHERE crew.CrewID = ?";
    $raw = runQuery($conn, $sql, [$crewId])->fetchAll();

    if (!$raw) return null;

    $map = buildCrewMap($raw);
    return reset($map);
}

function crewBaseQuery() {
    return "SELECT crew.CrewID, crew.AircraftID, aircraft.Model, aircraft.Capacity, crewmember.Name, crewmember.Role 
            FROM crew 
            JOIN aircraft ON crew.AircraftID = aircraft.AircraftID
            LEFT JOIN crewmember ON crew.CrewID = crewmember.CrewID";
}

function buildCrewMap(array $rows) {
    $crews = [];
    foreach ($rows as $row) {
        $id = $row['CrewID'];
        if (!isset($crews[$id])) {
            $crews[$id] = [
                "crew_id" => $id,
                "aircraft" => [
                    "id" => $row['AircraftID'],
                    "model" => $row['Model'],
                    "capacity" => $row['Capacity']
                ],
                "members" => []
            ];
        }
        if ($row['Name']) {
            $crews[$id]['members'][] = [
                "name" => $row['Name'],
                "role" => $row['Role']
            ];
        }
    }
    return $crews;
}
