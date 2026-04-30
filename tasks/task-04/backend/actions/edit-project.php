<?php
require "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id    = $_SESSION['user_id'];
$project_id = $_POST['project_id'];
$name       = '';
if (isset($_POST['project_name'])) {
    $name = $_POST['project_name'];
}
$tagline    = $_POST['tagline'];

if (empty($name) || empty($project_id)) {
    header("Location: ../create-project.php?id=" . $project_id . "&status=empty");
    exit();
}

$verifyStmt = $connection->prepare("SELECT ProjectID FROM project WHERE ProjectID = :project_id AND UserID = :user_id");
$verifyStmt->execute([':project_id' => $project_id, ':user_id' => $user_id]);
if (!$verifyStmt->fetch()) {
    header("Location: ../projects.php");
    exit();
}

$query = "UPDATE project SET Name = :name, Description = :description WHERE ProjectID = :project_id AND UserID = :user_id";
$stmt = $connection->prepare($query);
$success = $stmt->execute([
    ':name'         => $name,
    ':description'  => $tagline,
    ':project_id'   => $project_id,
    ':user_id'      => $user_id
]);

if ($success) {
    header("Location: ../projects.php?status=success");
    exit();
} else {
    header("Location: ../create-project.php?id=" . $project_id . "&status=error");
    exit();
}
