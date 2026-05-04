<?php

require_once __DIR__ . "/../repos/EmployeeRepo.php";
require_once __DIR__ . "/../helper/request.php";

function handleGetEmployees(PDO $conn) {
    try {
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            $result = getEmployeesByName($conn, $name);
            response(HttpStatus::OK, "Found employees matching '$name'", $result);
        } else {
            $result = getAllEmployees($conn);
            response(HttpStatus::OK, "Successfully retrieved all employees", $result);
        }
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handlePostEmployee(PDO $conn) {
    try {
        $data = getJsonInput(['airline_id', 'name', 'birth_date', 'gender', 'position']);

        if (!in_array($data['gender'], ['M', 'F'])) {
            response(HttpStatus::BAD_REQUEST, "Gender must be 'M' or 'F'.");
        }
        
        $id = createEmployee(
            $conn,
            $data['airline_id'],
            $data['name'],
            $data['birth_date'],
            $data['gender'],
            $data['position']
        );
        
        $newEmployee = getEmployeeById($conn, $id);
        response(HttpStatus::CREATED, "Welcome to the team! Employee '{$data['name']}' has been registered.", $newEmployee);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handleDeleteEmployee(PDO $conn) {
    try {
        if (!isset($_GET['id'])) {
            response(HttpStatus::BAD_REQUEST, "Employee ID is required to remove a staff member.");
        }
        
        $id = $_GET['id'];
        $success = deleteEmployee($conn, $id);
        
        if ($success) {
            response(HttpStatus::OK, "Employee has been successfully removed from the system.");
        } else {
            response(HttpStatus::NOT_FOUND, "We couldn't find an employee with that ID.");
        }
    } catch (Exception $e) {
        if (str_contains($e->getMessage(), 'foreign key constraint')) {
            response(HttpStatus::BAD_REQUEST, "This employee cannot be deleted because they are currently part of an active crew.");
        }
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}
