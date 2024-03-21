<?php

    

    session_start();

    if (isset($_SESSION['username'])) {
        ?>
        <script>
            window.location = "inquirydata.php";
        </script>
        <?php
        exit();
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <form id="loginForm" action="inquirydata.php" method="POST">
        <div id="logo">
            <img src="img/logo.png" alt="main-logo">
        </div>
        <input type="text" placeholder="username" id="firstName" name="firstName">
        <input type="password" placeholder="password" id="password" name="password">
        <button type="submit" name="submit">Submit</button>
    </form>

    <script src="js/login.js"></script>

</body>
</html>