<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../Controllers/AirlineController.php";
require_once __DIR__ . "/../Controllers/EmployeeController.php";
require_once __DIR__ . "/../Controllers/AircraftController.php";
require_once __DIR__ . "/../Controllers/RouteController.php";
require_once __DIR__ . "/../Controllers/TransactionsController.php";
require_once __DIR__ . "/../Controllers/CrewController.php";

$path = $_SERVER["PATH_INFO"] ?? "/";
$method = $_SERVER["REQUEST_METHOD"];

if ($path === "/airlines") {
    switch ($method) {
        case "GET":
            if (isset($_GET['id'])) {
                handleGetAirlineById($conn);
            } else {
                handleGetAirlines($conn);
            }
            break;
        case "POST":
            handlePostAirline($conn);
            break;
        case "PATCH":
            handlePatchAirline($conn);
            break;
        case "DELETE":
            handleDeleteAirline($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/employees") {
    switch ($method) {
        case "GET":
            handleGetEmployees($conn);
            break;
        case "POST":
            handlePostEmployee($conn);
            break;
        case "DELETE":
            handleDeleteEmployee($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/aircraft") {
    switch ($method) {
        case "GET":
            handleGetAircraft($conn);
            break;
        case "POST":
            handlePostAircraft($conn);
            break;
        case "DELETE":
            handleDeleteAircraft($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/routes") {
    switch ($method) {
        case "GET":
            handleGetRoutes($conn);
            break;
        case "POST":
            handlePostRoute($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/assign-route") {
    switch ($method) {
        case "POST":
            handleAssignRoute($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/flight-schedules") {
    switch ($method) {
        case "GET":
            handleGetFlightSchedules($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/transactions") {
    switch ($method) {
        case "GET":
            handleGetTransactions($conn);
            break;
        case "POST":
            handlePostTransaction($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/transactions/summary") {
    switch ($method) {
        case "GET":
            handleGetTransactionsSummary($conn);
            break;
        default:
            methodNotAllowed();
    }
} elseif ($path === "/crews") {
    switch ($method) {
        case "GET":
            handleGetCrews($conn);
            break;
        case "POST":
            handlePostCrew($conn);
            break;
        case "DELETE":
            handleDeleteCrew($conn);
            break;
        default:
            methodNotAllowed();
    }
} else {
    response(404, "Endpoint Not Found");
}
