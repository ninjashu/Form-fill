<?php
session_start();
// Checking second page values for empty, If it finds any blank field then redirected to second page.

if (isset($_POST['address1'])) {
    $varname = $_SESSION['User'];
    if (empty($_POST['city']) || empty($_POST['pin']) || empty($_POST['state']) || empty($_POST['age']) || empty($_POST['college']))
    {
        // Setting error message
        $User_name = $_SESSION['User'];
        $_SESSION['error_page2'] = "Mandatory field(s) are missing, Please fill it again";
        header("location: second.php"); // Redirecting to first page 
    }
    else{
        // Validating Contact Field using regex.
        if (!preg_match("/^[a-zA-z]*$/", $_POST['city'])) {
            $_SESSION['error_page2'] = "City is inappropriate.";
            header("location: second.php");
        }
        if (!preg_match("/^[0-9]{6}$/", $_POST['pin'])) {
            $_SESSION['error_page2'] = "6 digit PIN is required.";
            header("location: second.php");
        }
        if (!preg_match("/^[a-zA-z]*$/", $_POST['state'])) {
            $_SESSION['error_page2'] = "state is required.";
            header("location: second.php");
        }
        if (!preg_match("/^[0-9]{2}$/", $_POST['age'])) {
            $_SESSION['error_page2'] = "Appropriate age is required.";
            header("location: second.php");
        }
        if (!preg_match("/(college|institute|university)/i", $_POST['college'])) {
            $_SESSION['error_page2'] = "Full College Name is required.";
            header("location: second.php");
        }
        
    }
} else {
    if (empty($_SESSION['error_page2'])) {
        header("location: second.php"); //redirecting to first page
    }
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Form</title>
    <link rel="stylesheet" href="style.css" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

</head>

<body>
    <div class="container submit">
    <p>Thank you for filling the form. <br>
        <?php
        echo $varname
        ?>
    </p>
    </div>

</body>

</html>