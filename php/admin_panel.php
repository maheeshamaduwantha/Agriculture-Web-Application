<?php
// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Function to check if username and password are empty
    function emptyInputLogin($username, $password){
        $result;
        if(empty($username) || empty($password)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    function wrongCredentials($username, $password) {
        return $username !== "admin" || $password !== "admin";
    }

     // Check if the entered username and password are correct
     if ($username == "admin" && $password == "admin") {
        // Redirect to the admin panel
        header("Location: admin_panel.php");
        exit();
    } elseif (emptyInputLogin($username, $password)) {
        // Redirect with error if fields are empty
        header('Location: admin_login.php?error=emptyinput');
        exit();
    } elseif (wrongCredentials($username, $password)) {
        // Incorrect credentials, display an error message or handle accordingly
        header('Location: admin_login.php?error=wrongCredentials');
        exit();
    }
}
?>

<?php
// Include the database connection file
include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin-Panel</title>

    <style>
        /* Navbar styles */
        .navbar {
            background-color: #343a40; /* Dark background color */
            color: white; /* Text color */
        }

        .navbar a {
            color: white;
        }

        .navbar-brand:hover {
            animation: blink 0.5s infinite;
        }

        .navbar-brand {
            font-size: 15px; /* Set the default font size for navbar items */
        }

        .navbar-brand.small-font {
            font-size: 15px; /* Set a smaller font size for specific navbar items */
        }

        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="officer_panel.php">Field Officer</a>
            <a class="navbar-brand" href="manager_panel.php">Manager</a>
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

    <!-- Admin Dashboard Title -->
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
        style="background-color: #00ff5573;">
        Welcome to the Admin Dashboard
    </nav>

    <!-- Container for User Data Table -->
    <div class="container">
        <?php
            if (isset($_GET["msg"])) {
                $msg = $_GET["msg"];
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ' . $msg . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        ?>

        <!-- Add New User Button -->
        <a href="add-new.php" class="btn btn-dark mb-3">Add New User</a>

        <!-- User Data Table -->
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Password</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["usersId"] ?></td>
                        <td><?php echo $row["usersName"] ?></td>
                        <td><?php echo $row["usersEmail"] ?></td>
                        <td><?php echo $row["usersUid"] ?></td>
                        <td><?php echo $row["usersPwd"] ?></td>
                        <td><?php echo $row["userRole"] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row["usersId"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                            <a href="delete.php?id=<?php echo $row["usersId"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-...your-sha512-hash..." crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
