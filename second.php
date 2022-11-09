<?php
session_start();
if (isset($_POST['name'])) {
    $varname = $_POST['name'];
    $_SESSION['User'] = $varname;
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['contact']))
    {
        // Setting error message
        $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
        header("location: index.php"); // Redirecting to first page 
    }
    else{
        // Sanitizing email field to remove unwanted characters.
        $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        // After sanitization Validation is performed.

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            // Validating Contact Field using regex.
            if (!preg_match("/^[0-9]{10}$/", $_POST['contact'])) {
                $_SESSION['error'] = "10 digit contact number is required.";
                header("location: index.php");
            }
        } else {
            $_SESSION['error'] = "Invalid Email Address";
            header("location: index.php"); //redirecting to first page
        }
    }
} else {
    if (empty($_SESSION['error_page2'])) {
        header("location: index.php"); //redirecting to first page
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Form</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <div class="main">
            <h2>Registration Form</h2>
            <hr />
            <span id="error">
                <?php
                if (!empty($_SESSION['error_page2'])) {
                    echo $_SESSION['error_page2'];
                    unset($_SESSION['error_page2']);
                }
                ?>
            </span>
            <form action="submit.php" method="post">

                <label class="input-box">Address Line1 :<span>*</span></label>
                <input class="answer-box" name="address1" id="address1" type="text" size="30" required><br>
                <label class="input-box">Address Line2 :</label>
                <input class="answer-box" name="address2" id="address2" type="text" size="50"><br>
                <label class="input-box">City :<span>*</span></label>
                <input class="answer-box" name="city" id="city" type="text" size="25" required><br>
                <label class="input-box">Pin Code :<span>*</span></label>
                <input class="answer-box" name="pin" id="pin" type="text" size="10" required><br>
                <label class="input-box">State :<span>*</span></label>
                <input class="answer-box" name="state" id="state" type="text" size="30" required><br>
                <label class="input-box">Age :</label>
                <input class="answer-box" type="number" name="age" id="age"><br>
                <label class="input-box">College :</label>
                <input class="answer-box" type="text" name="college" id="college"><br>

                <input class="reset-btn"  type="reset" value="Reset" />
                <input class="submit-btn" name="submit" type="submit" value="Submit" />
            </form>
        </div>
    </div>
</body>

</html>