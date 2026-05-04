<?php

require_once __DIR__ . "/../repos/TransactionsRepo.php";
require_once __DIR__ . "/../helper/request.php";

function handleGetTransactions(PDO $conn) {
    try {
        $result = getAllTransactions($conn);
        response(HttpStatus::OK, "All transactions retrieved", $result);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}

function handlePostTransaction(PDO $conn) {
    try {
        $data = getJsonInput(['airline_id', 'amount', 'type']);
        
        $airlineId = $data['airline_id'];
        $amount = $data['amount'];
        $type = $data['type'];
        $description = $data['description'] ?? "No description";

        if (!in_array($type, ['buy', 'sell'])) {
            response(HttpStatus::BAD_REQUEST, "Type must be either 'buy' or 'sell' as per database schema");
        }

        if (!is_numeric($amount) || $amount <= 0) {
            response(HttpStatus::BAD_REQUEST, "Invalid amount. Must be a positive number.");
        }

        $currentBalance = getCurrentBalance($conn, $airlineId);

        if ($type === 'buy' && $currentBalance < $amount) {
            response(HttpStatus::BAD_REQUEST, "Insufficient balance. The airline has $$currentBalance, but this purchase requires $$amount.");
        }

        $conn->beginTransaction();

        $transactionId = createTransactionRecord($conn, $airlineId, $amount, $type, $description);

        $balanceUpdated = updateAirlineBalance($conn, $airlineId, $amount, $type);

        if ($transactionId && $balanceUpdated) {
            $conn->commit();
            $newTransaction = getTransactionById($conn, $transactionId);
            response(HttpStatus::CREATED, "Transaction completed and balance updated", $newTransaction);
        } else {
            $conn->rollback();
            response(HttpStatus::BAD_REQUEST, "Failed to complete transaction logic");
        }

    } catch (Exception $e) {
        if ($conn->inTransaction()) {
            $conn->rollback();
        }
        response(HttpStatus::INTERNAL_SERVER_ERROR, "Transaction failed: " . $e->getMessage());
    }
}

function handleGetTransactionsSummary(PDO $conn) {
    try {
        $result = getTransactionsSummary($conn);
        response(HttpStatus::OK, "Transactions summary retrieved", $result);
    } catch (Exception $e) {
        response(HttpStatus::INTERNAL_SERVER_ERROR, $e->getMessage());
    }
}