<?php

    session_start();


    function login($username, $password){
        $valid_username = 'xtardhananjay';
        $valid_password = '(23dhananjay)';

        if($username === $valid_username && $password === $valid_password){
            $_SESSION['username'] = $username;
            return true;
        }
        return false;
    }

    if(isset($_POST['submit'])){
        $username = $_POST['firstName'];
        $password = $_POST['password'];

        if(login($username, $password)){
        } else {
            ?>
            <script>
                window.location = "index.php";
            </script>
            <?php
        }
    }

    if (!isset($_SESSION['username'])) {
        ?>
        <script>
            window.location = "index.php";
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
    <!-- favicon -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custome css -->
    <link rel="stylesheet" href="css/style.css">

    <title>Inquriy Data</title>
</head>
<body>
    
    <section id="tableSection">
        <div id="heading">
            <div id="logoSec">
                <div id="logo">
                    <img src="img/logo.png" alt="main-logo">
                </div>
                <h1>Inquiry Data</h1>
            </div>
            <a href="php/logout.php"><button>Logout</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Date & Time</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="tableBody">

            </tbody>
        </table>
        <div id="loadBtn">
            <button id="loadmore">Load More</button>
        </div>
    </section>

    <script src="js/scrpt.js"></script>

</body>
</html>