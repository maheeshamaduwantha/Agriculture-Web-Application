<?php
// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $role = $_POST["role"];

    /* Include necessary files for database connection and functions */
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    /* Define functions and perform form validation */
    $emptyInput = emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $role);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdRepeat);
    $uidExists = uidExists($conn, $username, $email);

    // Check for empty input
    if ($emptyInput !== false) {
        header("Location:../signup.php?error=emptyinput");
        exit();
    }

    // Check for invalid username
    if ($invalidUid !== false) {
        header("Location:../signup.php?error=invaliduid");
        exit();
    }

    // Check for invalid email
    if ($invalidEmail !== false) {
        header("Location:../signup.php?error=invalidemail");
        exit();
    }

    // Check if passwords match
    if ($pwdMatch !== false) {
        header("Location:../signup.php?error=passwordsdontmatch");
        exit();
    }

    // Check if username or email already exists
    if ($uidExists !== false) {
        header("Location:../signup.php?error=usernametaken");
        exit();
    }

    // Create user if all validations pass
    createUser($conn, $name, $email, $username, $pwd, $role);
} else {
    // Redirect to login page if the form is not submitted
    header('Location:../login.php');
    exit();
}
?>
