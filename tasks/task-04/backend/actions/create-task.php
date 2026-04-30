<?php
require "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id     = $_SESSION['user_id'];
$name        = $_POST['task_name'];
$description = $_POST['description'];
$project_id  = $_POST['project_id'];
$priority    = $_POST['priority'];
$status_id   = 1;
if (isset($_POST['status_id'])) {
    $status_id = (int)$_POST['status_id'];
}
$start_date  = $_POST['start_date'];
$end_date    = $_POST['end_date'];

if (empty($name) || empty($project_id) || empty($priority)) {
    header("Location: ../create-task.php?status=empty");
    exit();
}

$priorityMap = ['high' => 1, 'medium' => 2, 'low' => 3];
$priorityId = 2;
if (isset($priorityMap[$priority])) {
    $priorityId = $priorityMap[$priority];
}

$query = "INSERT INTO task (Name, Description, StartDate, EndDate, isArchived, ProjectID, AssignedToUserID, StatusID, PriorityID, CategoryID) VALUES (:name, :description, :start_date, :end_date, 0, :project_id, :user_id, :status_id, :priority_id, 2)";
$stmt = $connection->prepare($query);
$success = $stmt->execute([
    ':name'         => $name,
    ':description'  => $description,
    ':start_date'   => $start_date,
    ':end_date'     => $end_date,
    ':project_id'   => $project_id,
    ':user_id'      => $user_id,
    ':status_id'    => $status_id,
    ':priority_id'  => $priorityId
]);

if ($success) {
    header("Location: ../dashboard.php?status=task_created");
    exit();
} else {
    header("Location: ../create-task.php?status=error");
    exit();
}
