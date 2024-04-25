<?php
// Include the database connection file
include 'includes/dbh.inc.php';

// Get the user ID from the URL parameter
$id = $_GET["id"];

// SQL query to delete user with the specified ID
$sql = "DELETE FROM `users` WHERE usersId = $id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the deletion was successful
if ($result) {
    // Redirect to admin panel with success message
    header("Location: admin_panel.php?msg=Data deleted successfully");
} else {
    // Display an error message if deletion fails
    echo "Failed: " . mysqli_error($conn);
}
?>
