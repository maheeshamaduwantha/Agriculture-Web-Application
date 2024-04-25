<?php
// Include the database connection file
include 'includes/dbh.inc.php';

// Get the user ID from the URL parameter
$id = $_GET["id"];

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Sanitize and retrieve form data
    $usersName = mysqli_real_escape_string($conn, $_POST['usersName']);
    $usersEmail = mysqli_real_escape_string($conn, $_POST['usersEmail']);
    $usersUid = mysqli_real_escape_string($conn, $_POST['usersUid']);

    // SQL query to update user information
    $sql = "UPDATE `users` SET `usersName`='$usersName', `usersEmail`='$usersEmail', `usersUid`='$usersUid' WHERE `usersId` = $id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the update was successful
    if ($result) {
        // Redirect to admin panel with success message
        header("Location: admin_panel.php?msg=Data updated successfully");
        exit();
    } else {
        // Display an error message if the update fails
        echo "Failed: " . mysqli_error($conn);
    }
}

// SQL query to fetch user data by ID
$sql = "SELECT * FROM `users` WHERE usersId = $id";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    echo "Failed: " . mysqli_error($conn);
    exit();
}

// Fetch user data
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include necessary meta tags, stylesheets, and scripts -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin-Panel_Update</title>
    <style>
        .navbar {
            background-color: #343a40; /* Dark background color */
            color: white; /* Text color */
        }

        .navbar a {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Include navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel-Update User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../HTML,CSS,JS/Home.html">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_login.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav
        class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #00ff5573;">
        Welcome to Update Profile
    </nav>

    <!-- Page content -->
    <div class="container">
        <div class="text-center mb-4">
            <h2>The Name of the User: <?php echo $row['usersName']; ?></h2>
            <p class="text-muted">Click update after changing any information</p>
        </div>
        <div class="container d-flex justify-content-center">
            <!-- Form for updating user information -->
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <!-- Form fields for user information -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="usersName"
                            value="<?php echo $row['usersName'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="usersEmail"
                        value="<?php echo $row['usersEmail'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">User ID:</label>
                    <input type="text" class="form-control" name="usersUid"
                        value="<?php echo $row['usersUid'] ?>">
                </div>
                <!-- Form submission buttons -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="admin_panel.php" class="btn btn-danger ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Include necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>
