<?php

require_once __DIR__ . "/../repos/AircraftRepo.php";
require_once __DIR__ . "/../helper/request.php";

function handleGetAircraft(PDO $conn) {
    try {
        $result = getAllAircraft($conn);
        response(HttpStatus::OK, "All aircraft retrieved", $result);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handlePostAircraft(PDO $conn) {
    try {
        $data = getJsonInput(['airline_id', 'model', 'capacity']);

        if (!is_numeric($data['capacity']) || $data['capacity'] <= 0) {
            response(HttpStatus::BAD_REQUEST, "Aircraft capacity must be a positive number.");
        }
        
        $id = createAircraft(
            $conn,
            $data['airline_id'],
            $data['model'],
            $data['capacity']
        );
        
        $newAircraft = getAircraftById($conn, $id);
        response(HttpStatus::CREATED, "New aircraft added to the fleet successfully.", $newAircraft);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handleDeleteAircraft(PDO $conn) {
    try {
        if (!isset($_GET['id'])) {
            response(HttpStatus::BAD_REQUEST, "Aircraft ID is required to remove it from the fleet.");
        }
        
        $id = $_GET['id'];
        $success = deleteAircraft($conn, $id);
        
        if ($success) {
            response(HttpStatus::OK, "Aircraft has been successfully removed from the active fleet.");
        } else {
            response(HttpStatus::NOT_FOUND, "We couldn't find an aircraft with that ID.");
        }
    } catch (Exception $e) {
        if (str_contains($e->getMessage(), 'foreign key constraint')) {
            response(HttpStatus::BAD_REQUEST, "Cannot remove this aircraft. It is currently assigned to a crew or a scheduled flight route.");
        }
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}
