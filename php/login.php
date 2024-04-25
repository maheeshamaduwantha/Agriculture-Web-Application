<?php
// Include the header file
include_once 'header.php';
?>
  <div class="container" style="margin: 200px">
    </div>
<!-- Display an image -->
<img src="../HTML,CSS,JS/images/user(1).png" />

<!-- Login Form -->
<div class="form">
    <h1>Welcome to the User Login</h1>

    <!-- User login form -->
    <form action="includes/login.inc.php" method="post">
        <!-- Input fields for username/email and password -->
        <input type="text" id="fname" name="uid" placeholder="Email/Username">
        <input type="password" id="lname" name="pwd" placeholder="Password">

        <!-- Submit button -->
        <button type="submit" name="submit">Login</button>
    </form>

    <h3>
        <!-- Link to register if new user -->
        <p>You're New Here <a href="signup.php">Register</a></p>
    </h3>

    <?php
    // Display error messages if there are any
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo '<div class="error">Fill All The Fields!</div>';
        } else if ($_GET["error"] == "Cannot find user") {
            echo '<div class="error">Invalid details!</div>';
        } else if ($_GET["error"] == "stmtfailed") {
            echo '<div class="error">Something Went Wrong!</div>';
        } else if ($_GET["error"] == "none") {
            echo '<div class="success-message">Account Created Successfully!</div>';
        } else if ($_GET["error"] == "please enter the correct password") {
            echo '<div class="error">Please enter the correct password!</div>';
        }
    }
    ?>
</div>

<?php
// Include the footer file
include_once 'footer.php';
?>
