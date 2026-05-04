<?php

function runQuery(PDO $conn, string $query, array $params = []) {
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
}
