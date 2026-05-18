<?php
// API to fetch products from the database and return as JSON response
include 'db.php';
/* @var $pdo PDO */

header('Content-Type: application/json');

try {
    //TODO: Complete the code to fetch products from the database and return as JSON response.
    // Example of the response: {status: 'success', data: [{id: 1, name: 'Product 1', price: 10.00}, ...]}

    // Execute the SQL query to fetch products
    // Adjust the table name and columns to match your actual database schema
    $stmt = $pdo->query("SELECT id, name, price FROM products");
    
    // Fetch all rows as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the JSON response matching the expected example
    echo json_encode([
        'status' => 'success',
        'data' => $products
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}