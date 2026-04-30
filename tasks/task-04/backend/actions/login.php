<?php
require "../config/connection.php";

$email    = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    header("Location: ../login.php?status=empty");
    exit();
}

$query = "SELECT * FROM users WHERE Email = :email";
$statement = $connection->prepare($query);
$statement->execute([':email' => $email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['Password'])) {
    $_SESSION['user_id'] = $user['UserID'];
    $_SESSION['username'] = $user['Username'];
    header("Location: ../dashboard.php");
    exit();
} else {
    header("Location: ../login.php?status=error");
    exit();
}
