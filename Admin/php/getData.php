<?php

    include "conn.php";
    $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10; // Number of items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Page number

    // Calculate the offset
    $offset = ($page - 1) * $perPage;

    // Fetch data from the database with pagination
    $stmt = $pdo->prepare("SELECT * FROM data LIMIT :offset, :perPage");
    $stmt = $pdo->prepare("SELECT * FROM data ORDER BY id DESC LIMIT :offset, :perPage");
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Encode the fetched data into JSON format
    $jsonResponse = json_encode($data);

    // Set the Content-Type header to application/json
    header('Content-Type: application/json');

    // Return the JSON data as the API response
    echo $jsonResponse;

?>