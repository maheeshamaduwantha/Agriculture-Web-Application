<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    //echo 'Database connection is working.';
}

// Initialize variables
$fullName = '';
$lastName = '';
$field = '';
$phone = '';
$message = '';
$username = '';

// Check if form fields are set
if (isset($_POST['full_name'])) {
    $fullName = $conn->real_escape_string($_POST['full_name']);
}
if (isset($_POST['addresss'])) {
    $lastName = $conn->real_escape_string($_POST['addresss']);
}
if (isset($_POST['field'])) {
    $field = $conn->real_escape_string($_POST['field']);
}
if (isset($_POST['phone'])) {
    $phone = $conn->real_escape_string($_POST['phone']);
}
if (isset($_POST['message'])) {
    $message = $conn->real_escape_string($_POST['message']);
}
if (isset($_POST['username'])) {
    $username = $conn->real_escape_string($_POST['username']);
}

// Check if 'field' is 'Other Services'
if ($field === 'Other Services') {
    // Retrieve the value from the text box
    $otherServicesField = $conn->real_escape_string($_POST['other_services_field']);
} else {
    // Default value if 'field' is not 'Other Services'
    $otherServicesField = '';
}

// Insert data into the database, including the username and other_services_field
$sql = "INSERT INTO suggestions (username, full_name, addresss, field, phone, message, other_services_field) 
        VALUES ('$username', '$fullName', '$lastName', '$field', '$phone', '$message', '$otherServicesField')";

// Check if the query was successful
if ($conn->query($sql) === TRUE) {
    // Display success message and redirect
    echo '<script>alert("Record added successfully!"); window.location.href="login.php";</script>';
    
    // Destroy any existing session
    session_start();
    session_unset();
    session_destroy();
    exit();
} else {
    // Display error message if the query fails
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
