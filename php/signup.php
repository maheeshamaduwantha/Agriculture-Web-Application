<?php
include_once 'header.php';
?>
 <div class="container" style="margin: 100px">
    </div>
<img src="../HTML,CSS,JS/images/registernw.png"/>
<div class="form">
    <h1>Welcome to the User Registration</h1> 

    <form action="includes/signup.inc.php" method="post">
    <input type="text" id="fname" name="name" placeholder="Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
    <input type="text" id="fname" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
    <input type="text" id="fname" name="uid" placeholder="Username" value="<?php echo isset($_POST['uid']) ? $_POST['uid'] : ''; ?>">
    <input type="password" id="fname" name="pwd" placeholder="Password">
    <input type="password" id="lname" name="pwdrepeat" placeholder="Re-type Password">

    <div>
        <label>
            <input type="radio" name="role" value="Male"> Male
        </label>
        <label>
            <input type="radio" name="role" value="Female"> Female
        </label>
    </div>

    <button type="submit" name="submit">Register</button>
</form>


    <h3>
        <p>Already Have An Account?&nbsp;<a href="login.php"> Log in </a> </p>
    </h3>

    <?php  
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo '<div class="error">Fill All The Fields ! </div>';
        } else if($_GET["error"]=="invaliduid"){
            echo '<div class="error">Invalid Username !</div>';
        } else if($_GET["error"]=="invalidemail"){
            echo '<div class="error">Invalid E-mail !</div>';
        } else if($_GET["error"]=="passwordsdontmatch"){
            echo '<div class="error">Passwords Not Matching ! </div>';
        } else if($_GET["error"]=="stmtfailed"){
            echo '<div class="error">Something Went Wrong ! </div>';
        } else if($_GET["error"]=="usernametaken"){
            echo '<div class="error">Email or Username Taken ! </div>';
        } else if($_GET["error"]=="none"){
            echo '<div class="success-message">Account Created Successfully ! </div>';
        }
    }
    ?>
</div>

<?php include_once 'footer.php'; ?>
