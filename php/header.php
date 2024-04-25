<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        * {
            margin: 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }

        /* Form */
        input[type=text],
        input[type=password],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .form {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        img {
            width: 100px;
            height: 100px;
            display: block;
            margin: 0 auto;
        }

        .error {
            color: red;
            padding: 42px;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .success-message {
            color: blue;
            padding: 12px;
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
    <title>DOA-REGISTRATION</title>
</head>

<body>
    <ul>
        <li><a class="active" href="../HTML,CSS,JS/Home.html">DOA-Home</a></li>

        <?php
        if (isset($_SESSION["username"])) {
            // Display logout and profile links if logged in
            echo '<li style="float:right"><a onclick="destroySession()" href="login.php">Logout</a></li>';
            echo '<li style="float:right"><a href="profile.php">' . $_SESSION["username"] . '</a></li>';
        } else {
            // Exclude "Login" link on login.php page
            if (basename($_SERVER['PHP_SELF']) != 'login.php') {
                echo '<li style="float:right"><a href="login.php">Login</a></li>';
            }

            // Display "Register" link only when not logged in
            if (basename($_SERVER['PHP_SELF']) != 'signup.php') {
                echo '<li style="float:right"><a href="signup.php">Register</a></li>';
            }
        }
        ?>
    </ul>
    <div class="container" style="margin: 20px"></div>
    <script>
        function destroySession() {
            <?php session_destroy(); ?>
        }
    </script>
</body>

</html>
