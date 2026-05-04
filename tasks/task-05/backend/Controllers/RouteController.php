<?php

require_once __DIR__ . "/../repos/RouteRepo.php";
require_once __DIR__ . "/../helper/request.php";

function handleGetRoutes(PDO $conn) {
    try {
        $result = getAllRoutes($conn);
        response(HttpStatus::OK, "All routes retrieved", $result);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handlePostRoute(PDO $conn) {
    try {
        $data = getJsonInput(['origin', 'destination', 'distance', 'classification']);

        if (strtolower($data['origin']) === strtolower($data['destination'])) {
            response(HttpStatus::BAD_REQUEST, "Origin and destination cannot be the same.");
        }

        if (!is_numeric($data['distance']) || $data['distance'] <= 0) {
            response(HttpStatus::BAD_REQUEST, "Distance must be a positive number.");
        }
        
        $id = createRoute(
            $conn,
            $data['origin'],
            $data['destination'],
            $data['distance'],
            $data['classification']
        );
        
        $newRoute = getRouteById($conn, $id);
        response(HttpStatus::CREATED, "Route created successfully", $newRoute);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handleAssignRoute(PDO $conn) {
    try {
        $data = getJsonInput(['aircraft_id', 'route_id', 'departure', 'arrival', 'passengers', 'ticket_price']);
        
        if (strtotime($data['arrival']) <= strtotime($data['departure'])) {
            response(HttpStatus::BAD_REQUEST, "Invalid schedule. The arrival time must be after the departure time.");
        }

        if (!is_numeric($data['passengers']) || $data['passengers'] <= 0) {
            response(HttpStatus::BAD_REQUEST, "Number of passengers must be a positive number.");
        }

        if (!is_numeric($data['ticket_price']) || $data['ticket_price'] <= 0) {
            response(HttpStatus::BAD_REQUEST, "Ticket price must be a positive number.");
        }

        assignAircraftToRoute(
            $conn,
            $data['aircraft_id'],
            $data['route_id'],
            $data['departure'],
            $data['arrival'],
            $data['passengers'],
            $data['ticket_price']
        );

        $newSchedule = getFlightScheduleByKey($conn, $data['aircraft_id'], $data['route_id'], $data['departure']);
        response(HttpStatus::CREATED, "Flight scheduled successfully", $newSchedule);
    } catch (Exception $e) {
        if (str_contains($e->getMessage(), 'Duplicate entry')) {
            response(HttpStatus::BAD_REQUEST, "This aircraft already has a flight scheduled on this route at the specified departure time.");
        }
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handleGetFlightSchedules(PDO $conn) {
    try {
        $result = getAllFlightSchedules($conn);
        response(HttpStatus::OK, "All flight schedules retrieved", $result);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}
