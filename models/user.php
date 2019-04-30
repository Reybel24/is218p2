<?php

include 'models/server.php';

class User {

    public $username;
    public $password;

    // If auth is successful, create a user instance
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    // public function deleteUser() {}

}



