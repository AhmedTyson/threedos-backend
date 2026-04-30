<?php
require "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
if (isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];
    $query = "DELETE FROM project WHERE ProjectID = :project_id AND UserID = :user_id";
    $stmt = $connection->prepare($query);
    $stmt->execute([':project_id' => $project_id, ':user_id' => $user_id]);
}

header("Location: ../projects.php?status=project_deleted");
exit();
