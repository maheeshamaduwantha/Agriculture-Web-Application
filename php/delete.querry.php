<?php
// Include the database connection file
include 'includes/dbh.inc.php';

// Get the suggestion ID from the URL parameter
$id = $_GET["id"];

// SQL query to delete suggestion with the specified ID
$sql = "DELETE FROM `suggestions` WHERE id = $id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the deletion was successful
if ($result) {
    // Redirect to officer panel with success message
    header("Location: officer_panel.php?msg=Data deleted successfully");
} else {
    // Display an error message if deletion fails
    echo "Failed: " . mysqli_error($conn);
}
?>
