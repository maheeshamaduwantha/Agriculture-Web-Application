<?php
// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get username and password from the form
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // Include necessary files
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Check for empty input fields
    if (emptyInputLogin($username, $pwd)) {
        header('Location: ../login.php?error=emptyinput');
        exit();
    }

    // Call loginUser function to authenticate user
    loginUser($conn, $username, $pwd);
} else {
    // Redirect to login page if form is not submitted
    header('Location: ../login.php');
    exit();
}
?>
