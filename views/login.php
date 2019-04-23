<?php

$conn = new pdoConnection();
$conn->connect();

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

?>