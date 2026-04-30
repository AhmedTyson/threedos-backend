<?php
require "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$name = '';
if (isset($_POST['project_name'])) {
    $name = $_POST['project_name'];
}
$description = '';
if (isset($_POST['tagline'])) {
    $description = $_POST['tagline'];
}

if (empty($name)) {
    header("Location: ../create-project.php?status=empty");
    exit();
}

$query = "INSERT INTO project (Name, Description, UserID) VALUES (:name, :description, :user_id)";
$stmt = $connection->prepare($query);
$success = $stmt->execute([':name' => $name, ':description' => $description, ':user_id' => $user_id]);

if ($success) {
    header("Location: ../dashboard.php?status=project_created");
    exit();
} else {
    header("Location: ../create-project.php?status=error");
    exit();
}
