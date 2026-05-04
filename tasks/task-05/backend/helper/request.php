<?php

require_once __DIR__ . "/response.php";

function getJsonInput(array $requiredFields = []) {
    $data = json_decode(file_get_contents("php://input"), true) ?? [];
    
    foreach ($requiredFields as $field) {
        if (!isset($data[$field]) || (is_string($data[$field]) && trim($data[$field]) === "")) {
            response(HttpStatus::UNPROCESSABLE_ENTITY, "Please provide the '$field' field. It is required to proceed.");
        }
    }
    
    return $data;
}
