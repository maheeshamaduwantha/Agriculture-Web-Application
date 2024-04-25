<?php
// Include the header file
include_once 'header.php';
?>

<h1>Hello&nbsp;&nbsp;<?php
    // Display the username if it's set in the session
    if (isset($_SESSION["username"])) {
        echo $_SESSION["username"] . '!';
    } else {
        // Uncomment the line below if you want a default message when the username is not set
        // echo 'user !';
    }
?></h1>
<p>Welcome to the Registry</p>

<?php
// Include the footer file
include_once 'footer.php';
?>
