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

        /*Form */
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
    <title>Manager Login</title>
</head>

<body>
    <ul>
        <li><a class="navbar-brand" href="../HTML,CSS,JS/Home.html">HomePage</a></li>
        <li><a class="navbar-brand" href="admin_login.php">Admin</a></li>
        <li><a class="active" href="#">Manager</a></li>
        <li><a class="navbar-brand" href="officer_login.php">Officer</a></li>
    </ul>
    <div class="container" style="margin: 200px">
    </div>

    <img src="../HTML,CSS,JS/images/manager.png" />
    <div class="form">
        <h1>Welcome to the Manager Login</h1>
        <!-- Manager login form -->
        <form action="manager_panel.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="Login">Login</button>
        </form>
        <h3>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo '<div class="error">Fill All The Fields!</div>';
                } else if ($_GET["error"] == "wrongCredentials") {
                    echo '<div class="error">Wrong Credentials !</div>';
                }
            }
            ?>
        </h3>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>
