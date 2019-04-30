<?php include 'models/server.php';

$errors = array();

function addUser($username, $password, $fname, $lname, $school, $major) {

    $conn = new PdoConnection();

    $username = trim($username);
    $password_hashed = sha1($password);

    $sql = "INSERT INTO users (id, username, password, fname, lname, school, major) VALUES (DEFAULT, '$username', '$password_hashed', '$fname', '$lname', '$school', '$major')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

}

// REGISTER VALIDATION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Okay, so user has input some text for both fields
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $school = $_POST['school'];
    $major = $_POST['major'];

    if (empty($errors)) {
        addUser($username, $password, $fname, $lname, $school, $major);
        echo "Registration successful";

        session_start();

        $_SESSION['username'] = $username;

        header("Location: profile.php");
    } else {
        foreach ($errors as $error) {
            echo $error, '<br>';
        }
    }
}
