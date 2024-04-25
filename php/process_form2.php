<?php
// Database connection parameters (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo 'Database connection is working.';
}

// Initialize variables
$name = $email = $subject = $message = '';

// Validate and sanitize form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if fields are not empty
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        echo '<script>alert("All fields are required."); 
        window.location.href="../HTML,CSS,JS/Contact us.html";
        </script>';
        exit();
    }

    // If not empty, assign values to variables
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Validation and sanitization (add more as needed)
    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($subject);
    $message = htmlspecialchars($message);

    // Insert data into the database
    $sql = "INSERT INTO quotes (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record added successfully!"); window.location.href="../HTML,CSS,JS/Contact us.html";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
