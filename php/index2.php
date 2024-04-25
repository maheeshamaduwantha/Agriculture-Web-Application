<?php
// Include the header file
include_once 'header.php';
?>

<style>
    section {
        text-align: center;
    }

    .small-form {
        max-width: 400px;
        margin: 0 auto;
    }

    body {
        text-align: center;
    }

    h1 {
        margin-top: 50px; /* Adjust as needed */
    }

    #username {
        color: #FF0000; /* Red color code */
    }
</style>

<h1>Hello&nbsp;&nbsp;<span id="username"><?php
    // Display the username if it's set in the session, or use 'user' as a default
    if (isset($_SESSION["username"])) {
        echo $_SESSION["username"];
    } else {
        echo 'user';
    }
    ?></span>!</h1>

<section>
    <h2 class="mb-4">Request A Quote</h2>

    <form action="http://localhost/webnew/php%20files/process_form.php" method="post" class="appointment-form ftco-animate small-form">
        <!-- Add this hidden input field to store the username -->
        <input type="hidden" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">

        <div class="form-group">
            <input type="text" name="full_name" class="form-control" placeholder="Full Name With Initials" required>
        </div>

        <div class="form-group">
            <input type="text" name="addresss" class="form-control" placeholder="Your Address" required>
        </div>

        <div class="form-group">
            <div class="select-wrap">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="field" class="form-control" id="field" required>
                    <option value="">Select Your Field</option>
                    <option value="Seeds">Seeds</option>
                    <option value="Fertilizer">Fertilizer</option>
                    <option value="Chemical">Chemical</option>
                    <option value="Machinery">Machinery</option>
                    <option value="Other Services">Other Services</option>
                </select>
            </div>
        </div>

        <div class="form-group" id="otherServicesField" style="display: none;">
            <input type="text" name="other_services_field" class="form-control" placeholder="Type Your Field">
        </div>

        <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
        </div>

        <div class="form-group">
            <textarea name="message" cols="30" rows="2" class="form-control" placeholder="Message" required></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
        </div>
    </form>
</section>

<script>
    document.getElementById('field').addEventListener('change', function () {
        var otherServicesField = document.getElementById('otherServicesField');
        if (this.value === 'Other Services') {
            otherServicesField.style.display = 'block';
        } else {
            otherServicesField.style.display = 'none';
        }
    });
</script>

<?php
// Include the footer file
include_once 'footer.php';
?>
