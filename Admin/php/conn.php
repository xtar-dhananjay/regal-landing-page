<?php
// Database credentials
$database = "landingpage";
$server = "localhost";
$username = "root";
$password = "";

try {
    // Connect to MySQL database using PDO
    $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Connection failed, display error message
}
?>
