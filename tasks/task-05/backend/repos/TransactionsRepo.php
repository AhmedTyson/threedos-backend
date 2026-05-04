<?php

require_once __DIR__ . "/../helper/db.php";

function getAllTransactions(PDO $conn) {
    $sql = "SELECT Transaction.*, Airline.Name as AirlineName 
            FROM Transaction 
            JOIN Airline ON Transaction.AirlineID = Airline.AirlineID 
            ORDER BY Transaction.TransactionDate DESC";
    return runQuery($conn, $sql)->fetchAll();
}

function createTransactionRecord(PDO $conn, $airlineId, $amount, $type, $description) {
    $sql = "INSERT INTO Transaction (AirlineID, Amount, Type, Description, TransactionDate) 
            VALUES (?, ?, ?, ?, CURRENT_DATE)";
    runQuery($conn, $sql, [$airlineId, $amount, $type, $description]);
    return $conn->lastInsertId();
}

function getTransactionById(PDO $conn, $id) {
    $sql = "SELECT Transaction.*, Airline.Name as AirlineName 
            FROM Transaction 
            JOIN Airline ON Transaction.AirlineID = Airline.AirlineID 
            WHERE Transaction.TransactionID = ?";
    return runQuery($conn, $sql, [$id])->fetch();
}

function updateAirlineBalance(PDO $conn, $airlineId, $amount, $type) {
    $operator = ($type === 'sell') ? '+' : '-';
    
    $sql = "UPDATE Airline SET CurrentBalance = CurrentBalance $operator ? WHERE AirlineID = ?";
    $stmt = runQuery($conn, $sql, [$amount, $airlineId]);
    
    return $stmt->rowCount() > 0;
}

function getTransactionsSummary(PDO $conn) {
    $sql = "SELECT 
                SUM(CASE WHEN Type = 'sell' THEN Amount ELSE 0 END) as TotalSell,
                SUM(CASE WHEN Type = 'buy' THEN Amount ELSE 0 END) as TotalBuy,
                COUNT(*) as TotalTransactions
            FROM Transaction";
            
    $row = runQuery($conn, $sql)->fetch();
    
    $sell = $row['TotalSell'] ?? 0;
    $buy  = $row['TotalBuy'] ?? 0;
    
    return [
        "total_sell" => $sell,
        "total_buy"  => $buy,
        "net_balance" => $sell - $buy,
        "transaction_count" => $row['TotalTransactions']
    ];
}