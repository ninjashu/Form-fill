<?php
session_start(); 
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
            <span id="error">
                <!---- Initializing Session for errors --->
                <?php
                if (!empty($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </span>
            <form action="second.php" method="post">
                <label class="input-box">Full Name :</label>
                <input class="answer-box"name="name" type="text"  required><br>
                <label class="input-box">Phone No. :</label>
                <input class="answer-box"name="contact" type="text" required><br>
                <label class="input-box">Email :</label>
                <input class="answer-box"name="email" type="email" placeholder="abc@gmail.com" required><br>
                <input class="reset-btn"  type="reset" value="Reset" />
                <input class="submit-btn" type="submit" value="Next" />
            </form>
        </div>
    </div>
</body>

</html>