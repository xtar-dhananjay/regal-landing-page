<?php

include 'conn.php';

// Retrieve the raw POST data
$data = file_get_contents("php://input");
$jsonData = json_decode($data);

// Check if JSON data was successfully decoded
if ($jsonData !== null) {
    // Extract data from JSON object
    $name = $jsonData->name;
    $phoneNo = $jsonData->phoenNo; // corrected key name

    // Set the timezone to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');

    // Get the current date and time in the desired format
    $dateTime = date('d M. y | H:i:s');

    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO `data`(`name`, `phoneNo`, `dateTime`) VALUES (:name, :phoneNo, :dateTime)");

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phoneNo', $phoneNo);
        $stmt->bindParam(':dateTime', $dateTime);

        // Execute the statement
        $stmt->execute();

        // Respond with success message
        $response = array('success' => true, 'message' => 'Data inserted successfully');
        echo json_encode($response);
    } catch (PDOException $e) {
        // Respond with error message
        $response = array('success' => false, 'message' => 'Error: Data insertion failed');
        echo json_encode($response);
    }

    // Close the connection
    $pdo = null;
} else {
    // Respond with invalid JSON data message
    $response = array('success' => false, 'message' => 'Invalid JSON data received');
    echo json_encode($response);
}
?>
