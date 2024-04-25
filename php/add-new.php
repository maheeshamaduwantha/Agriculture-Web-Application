<?php
// Include the database connection file
include 'includes/dbh.inc.php';

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $role = $_POST['role'];

    // Include the functions file
    require_once 'includes/functions.inc.php';

    // Check for form input errors
    $emptyInput = emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $role);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdRepeat);
    $uidExists = uidExists($conn, $username, $email);

    // Handle errors and redirect if necessary
    if ($emptyInput !== false) {
        header("Location: add-new.php?error=emptyinput");
        exit();
    }
    if ($invalidUid !== false) {
        header("Location: add-new.php?error=invaliduid");
        exit();
    }
    if ($invalidEmail !== false) {
        header("Location: add-new.php?error=invalidemail");
        exit();
    }
    if ($pwdMatch !== false) {
        header("Location: add-new.php?error=passwordsdontmatch");
        exit();
    }
    if ($uidExists !== false) {
        header("Location: add-new.php?error=usernametaken");
        exit();
    }

    // Prepare and execute SQL statement to insert a new user
    $sql = "INSERT INTO users(usersName, usersEmail, usersUid, usersPwd, userRole) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect after successful user creation
    header("Location: admin_panel.php?msg=New record created successfully");
    exit();
} else {
    // Include the HTML file for the form if not submitted
    include '../HTML,CSS,JS/add.new.html';
}
?>
