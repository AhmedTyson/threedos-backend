<?php
require_once __DIR__ . "/../helper/db.php";

function getAllRoutes(PDO $conn) {
    $sql = "SELECT * FROM Route";
    return runQuery($conn, $sql)->fetchAll();
}

function createRoute(PDO $conn, $origin, $destination, $distance, $classification) {
    $sql = "INSERT INTO Route (Origin, Destination, Distance, Classification) VALUES (?, ?, ?, ?)";
    runQuery($conn, $sql, [$origin, $destination, $distance, $classification]);
    return $conn->lastInsertId();
}

function getRouteById(PDO $conn, $id) {
    $sql = "SELECT * FROM Route WHERE RouteID = ?";
    return runQuery($conn, $sql, [$id])->fetch();
}

function assignAircraftToRoute(PDO $conn, $aircraftId, $routeId, $departure, $arrival, $passengers, $price) {
    $sql = "INSERT INTO FlightSchedule (AircraftID, RouteID, DepartureDateTime, ArrivalDateTime, NumberOfPassengers, TicketPrice) VALUES (?, ?, ?, ?, ?, ?)";
    return runQuery($conn, $sql, [$aircraftId, $routeId, $departure, $arrival, $passengers, $price])->rowCount() > 0;
}

function getFlightScheduleByKey(PDO $conn, $aircraftId, $routeId, $departure) {
    $sql = "SELECT FlightSchedule.*, Aircraft.Model, Route.Origin, Route.Destination 
            FROM FlightSchedule 
            JOIN Aircraft ON FlightSchedule.AircraftID = Aircraft.AircraftID 
            JOIN Route ON FlightSchedule.RouteID = Route.RouteID 
            WHERE FlightSchedule.AircraftID = ? AND FlightSchedule.RouteID = ? AND FlightSchedule.DepartureDateTime = ?";
    return runQuery($conn, $sql, [$aircraftId, $routeId, $departure])->fetch();
}

function getAllFlightSchedules(PDO $conn) {
    $sql = "SELECT FlightSchedule.*, Aircraft.Model, Route.Origin, Route.Destination 
            FROM FlightSchedule 
            JOIN Aircraft ON FlightSchedule.AircraftID = Aircraft.AircraftID 
            JOIN Route ON FlightSchedule.RouteID = Route.RouteID 
            ORDER BY FlightSchedule.DepartureDateTime DESC";
    return runQuery($conn, $sql)->fetchAll();
}
