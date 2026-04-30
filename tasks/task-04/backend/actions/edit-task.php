<?php
require "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id     = $_SESSION['user_id'];
$task_id     = $_POST['task_id'];
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

if (empty($name) || empty($project_id) || empty($priority) || empty($task_id)) {
    header("Location: ../create-task.php?id=" . $task_id . "&status=empty");
    exit();
}

$priorityMap = ['high' => 1, 'medium' => 2, 'low' => 3];
$priorityId = 2;
if (isset($priorityMap[$priority])) {
    $priorityId = $priorityMap[$priority];
}

$verifyStmt = $connection->prepare("SELECT task.TaskID FROM task JOIN project ON task.ProjectID = project.ProjectID WHERE task.TaskID = :task_id AND project.UserID = :user_id");
$verifyStmt->execute([':task_id' => $task_id, ':user_id' => $user_id]);
if (!$verifyStmt->fetch()) {
    header("Location: ../dashboard.php");
    exit();
}

$query = "UPDATE task SET Name = :name, Description = :description, StartDate = :start_date, EndDate = :end_date, ProjectID = :project_id, StatusID = :status_id, PriorityID = :priority_id WHERE TaskID = :task_id";
$stmt = $connection->prepare($query);
$success = $stmt->execute([
    ':name'         => $name,
    ':description'  => $description,
    ':start_date'   => $start_date,
    ':end_date'     => $end_date,
    ':project_id'   => $project_id,
    ':status_id'    => $status_id,
    ':priority_id'  => $priorityId,
    ':task_id'      => $task_id
]);

if ($success) {
    header("Location: ../dashboard.php?status=success");
    exit();
} else {
    header("Location: ../create-task.php?id=" . $task_id . "&status=error");
    exit();
}
