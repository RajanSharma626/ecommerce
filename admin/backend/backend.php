<?php
include("includes/connection.php");


if (isset($_GET['dataId'])) {
    $categoryId = $_GET['dataId'];

    // Prepare and execute a query to retrieve category data based on $categoryId
    $sql = "SELECT * FROM categories WHERE id = '$categoryId'";
    $stmt = mysqli_query($conn, $sql);

    $categoryData = mysqli_fetch_assoc($stmt);

    if ($categoryData) {
        // Return category data in JSON format
        header('Content-Type: application/json');
        echo json_encode($categoryData);
    }
}


?>