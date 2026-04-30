<?php
require "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$is_archived = 1;
if (isset($_POST['is_archived'])) {
    $is_archived = (int)$_POST['is_archived'];
}

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $query = "UPDATE task JOIN project ON task.ProjectID = project.ProjectID SET task.isArchived = :is_archived WHERE task.TaskID = :task_id AND project.UserID = :user_id";
    $stmt = $connection->prepare($query);
    $stmt->execute([
        ':is_archived' => $is_archived,
        ':task_id' => $task_id, 
        ':user_id' => $user_id
    ]);
}

if ($is_archived === 1) {
    header("Location: ../dashboard.php?status=task_archived");
} else {
    header("Location: ../archived.php?status=task_restored");
}
exit();
