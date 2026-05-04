<?php

require_once __DIR__ . "/../repos/CrewRepo.php";
require_once __DIR__ . "/../helper/request.php";

function handleGetCrews(PDO $conn) {
    try {
        $result = getCrewsWithMembers($conn);
        response(HttpStatus::OK, "Crews retrieved successfully", $result);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handlePostCrew(PDO $conn) {
    try {
        $data = getJsonInput(['aircraft_id', 'members']);
        $aircraftId = $data['aircraft_id'];
        $members = $data['members'];

        if (count($members) !== 4) {
            response(HttpStatus::UNPROCESSABLE_ENTITY, "Crew must consist of exactly 4 members.");
        }

        $rolesCount = [
            'Major Pilot' => 0,
            'Assistant Pilot' => 0,
            'Hostess' => 0
        ];

        foreach ($members as $m) {
            if (!isset($rolesCount[$m['role']])) {
                response(HttpStatus::BAD_REQUEST, "Invalid role: " . $m['role']);
            }
            $rolesCount[$m['role']]++;
        }

        if ($rolesCount['Major Pilot'] !== 1 || $rolesCount['Assistant Pilot'] !== 1 || $rolesCount['Hostess'] !== 2) {
            response(HttpStatus::UNPROCESSABLE_ENTITY, "Invalid crew composition. Required: 1 Major Pilot, 1 Assistant Pilot, and 2 Hostesses.");
        }

        $conn->beginTransaction();
        
        $crewId = createCrewRecord($conn, $aircraftId);
        
        foreach ($members as $m) {
            addMemberToCrew($conn, $crewId, $m['name'], $m['role']);
        }

        $conn->commit();
        
        $newCrew = getCrewById($conn, $crewId);
        response(HttpStatus::CREATED, "Crew successfully assigned to aircraft $aircraftId", $newCrew);

    } catch (Exception $e) {
        if ($conn->inTransaction()) $conn->rollBack();
        
        if (str_contains($e->getMessage(), 'Duplicate entry')) {
            response(HttpStatus::BAD_REQUEST, "This aircraft already has an assigned crew.");
        }
        
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handleDeleteCrew(PDO $conn) {
    try {
        if (!isset($_GET['id'])) {
            response(HttpStatus::BAD_REQUEST, "Crew ID is required to disband a crew.");
        }

        $id = $_GET['id'];
        $result = deleteCrewRecord($conn, $id);

        if ($result->rowCount() > 0) {
            response(HttpStatus::OK, "Crew disbanded successfully.");
        } else {
            response(HttpStatus::NOT_FOUND, "No crew found with that ID.");
        }
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}