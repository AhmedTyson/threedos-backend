<?php
require "../config/connection.php";

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];
$confirm  = $_POST['confirm_password'];

if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
    echo "Please fill all the fields";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid";
    exit();
}

if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#?!@$%^&*-]).{8,}$/", $password)){
    echo "Password is invalid";
    exit();
}

if($password !== $confirm){
    echo "Passwords do not match";
    exit();
}

$hashedPass = password_hash($password, PASSWORD_DEFAULT);
$insert = "INSERT INTO users (Username, Email, Password) VALUES (:username, :email, :password)";
$statement = $connection->prepare($insert);

$success = $statement->execute([
    ':username' => $username,
    ':email'    => $email,
    ':password' => $hashedPass
]);

if ($success) {
    // Auto-login the user
    $_SESSION['user_id']  = $connection->lastInsertId();
    $_SESSION['username'] = $username;
    $_SESSION['email']    = $email;

    header("Location: ../dashboard.php?status=created");
    exit();
} else {
    header("Location: ../signup.php?status=error");
    exit();
}
