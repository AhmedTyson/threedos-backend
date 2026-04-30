<?php
require "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $query = "DELETE task FROM task JOIN project ON task.ProjectID = project.ProjectID WHERE task.TaskID = :task_id AND project.UserID = :user_id";
    $stmt = $connection->prepare($query);
    $stmt->execute([':task_id' => $task_id, ':user_id' => $user_id]);
}


