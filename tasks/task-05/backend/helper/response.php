<?php

require_once __DIR__ . "/status.php";

function response($code, $message, $data = null) {
    header("Content-Type: application/json");
    http_response_code($code);
    
    if (empty($message)) {
        $message = HttpStatus::getMessage($code);
    }

    echo json_encode([
        "status_code" => $code,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}

function methodNotAllowed() {
    response(HttpStatus::METHOD_NOT_ALLOWED, "Method Not Allowed");
}
