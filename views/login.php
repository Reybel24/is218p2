<?php

include 'models/user.php';

// Establish PDO connection
$conn = new pdoConnection();
$conn->connect();

// Check to see if credentials are valid
public function isUserValid($username, $password, $conn) {

    // SQL Injection Protection
    $username = mysqli_real_escape_string($conn, $username);
    $password = sha1($password);

    $stmt = $conn->prepare("SELECT * FROM `accounts` WHERE `username` = ? AND `password`  =?");
    $stmt->bindValue(':username', $username);
    $stmt->bindValue('password', $password);
    $stmt->execute([$username, $password]);
    $row = $stmt->fetch();
    $stmt->closeCursors();

    return $row == 1 ? 1 : 0;

}

    // Define an errors array for logging
    $errors = array();

// Set user params if POST data exists
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Log my boy in if user is valid
    if (isUserValid($username, $password, $conn)) {

        //Start user session session
        session_start();

        // Instantiate new user
        $user = new User($username, $password);

        // Set session data for $user
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        header('location:profile.php');

    } else {
        array_push($errors, "Wrong username and/or password");
    }

}

?>