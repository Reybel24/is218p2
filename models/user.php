<?php

// Establish a new connection
$conn = new pdoConnection();
$conn->connect();


class User {
    public  $username;
    public $password;
    public $fname;
    public $lname;
    public $school;
    public $major;

/*
    // If auth is successful, create a user instance from session data
    public function __construct() {
        if (isUserValid()) {

        }



    }


    // Check to see if credentials are valid
    public function isUserValid($username, $password, $conn) {
        if (isset($_POST['username'], $_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $username = mysqli_real_escape_string($conn, $username);
        $password = sha1($password);

        $query = "SELECT * FROM 'accounts' WHERE 'username'='$username' AND 'password'='$password'";

    }
*/
}



