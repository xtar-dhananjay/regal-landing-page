<?php
// Include database connection
include "conn.php";

// Check if the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Get the id parameter from the request
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Check if id parameter is provided
    if ($id !== null) {
        // Prepare the DELETE statement
        $stmt = $pdo->prepare("DELETE FROM data WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            // Execute the DELETE statement
            $stmt->execute();

            // Check if any rows were affected
            if ($stmt->rowCount() > 0) {
                // Record deleted successfully
                http_response_code(200); // OK
                echo json_encode(array('message' => 'Record deleted successfully'));
            } else {
                // No matching record found
                http_response_code(404); // Not Found
                echo json_encode(array('message' => 'No matching record found'));
            }
        } catch (PDOException $e) {
            // Error occurred while executing the DELETE statement
            http_response_code(500); // Internal Server Error
            echo json_encode(array('error' => 'Error deleting record: ' . $e->getMessage()));
        }
    } else {
        // id parameter is missing
        http_response_code(400); // Bad Request
        echo json_encode(array('error' => 'Missing id parameter'));
    }
} else {
    // Method not allowed
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Method not allowed'));
}
?>
