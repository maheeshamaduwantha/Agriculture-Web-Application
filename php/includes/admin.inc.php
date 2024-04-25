<?php
$serverName = "localhost";
$dbUserName = "test1";
$dbPassword = "2I.7CbGXmQV.fIkU";
$dbName = "project_2";

// Create a connection to the database
$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Connection is successful
    // echo 'Connection is working';
}
?>
