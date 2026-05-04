<?php

require_once __DIR__ . "/../repos/AirlineRepo.php";
require_once __DIR__ . "/../helper/request.php";

function handleGetAirlines(PDO $conn) {
    try {
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            $result = getAirlineByName($conn, $name);
            response(HttpStatus::OK, "Airlines matching '$name' retrieved", $result);
        } else {
            $result = getAllAirlines($conn);
            response(HttpStatus::OK, "All airlines retrieved", $result);
        }
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handleGetAirlineById(PDO $conn) {
    try {
        if (!isset($_GET['id'])) {
            response(HttpStatus::BAD_REQUEST, "Airline ID parameter is required");
        }
        
        $id = $_GET['id'];
        $result = getAirlineById($conn, $id);
        
        if ($result) {
            response(HttpStatus::OK, "Airline found", $result);
        } else {
            response(HttpStatus::NOT_FOUND, "Airline with ID $id not found");
        }
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handlePostAirline(PDO $conn) {
    try {
        $data = getJsonInput(['name']);

        $balance = $data['balance'] ?? 0;
        if (!is_numeric($balance) || $balance < 0) {
            response(HttpStatus::BAD_REQUEST, "Initial balance must be zero or a positive number.");
        }
        
        $id = createAirline(
            $conn, 
            $data['name'], 
            $data['address'] ?? null, 
            $data['contact_person'] ?? null, 
            $data['phone'] ?? null, 
            $balance
        );
        
        $newAirline = getAirlineById($conn, $id);
        response(HttpStatus::CREATED, "Airline created successfully", $newAirline);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handlePatchAirline(PDO $conn) {
    try {
        if (!isset($_GET['id'])) {
            response(HttpStatus::BAD_REQUEST, "Airline ID is required for update");
        }
        
        $id = $_GET['id'];
        $existing = getAirlineById($conn, $id);
        
        if (!$existing) {
            response(HttpStatus::NOT_FOUND, "Airline not found");
        }
        
        $data = getJsonInput();
        
        $name = $data['name'] ?? $existing['Name'];
        $address = $data['address'] ?? $existing['Address'];
        $contact = $data['contact_person'] ?? $existing['ContactPerson'];
        $phone = $data['phone'] ?? $existing['PhoneNumber'];
        $balance = $data['balance'] ?? $existing['CurrentBalance'];

        if (!is_numeric($balance) || $balance < 0) {
            response(HttpStatus::BAD_REQUEST, "Balance must be zero or a positive number.");
        }
        
        updateAirline($conn, $id, $name, $address, $contact, $phone, $balance);
        
        $updatedAirline = getAirlineById($conn, $id);
        response(HttpStatus::OK, "Airline updated successfully", $updatedAirline);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handleDeleteAirline(PDO $conn) {
    try {
        if (!isset($_GET['id'])) {
            response(HttpStatus::BAD_REQUEST, "Airline ID is required for deletion");
        }
        
        $id = $_GET['id'];
        $success = deleteAirline($conn, $id);
        
        if ($success) {
            response(HttpStatus::OK, "Airline deleted successfully");
        } else {
            response(HttpStatus::NOT_FOUND, "Airline not found or already deleted");
        }
    } catch (Exception $e) {
        if (str_contains($e->getMessage(), 'foreign key constraint')) {
            response(HttpStatus::BAD_REQUEST, "Cannot delete this airline. It has active transactions, aircraft, or scheduled routes associated with it.");
        }
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}
