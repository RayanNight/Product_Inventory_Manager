<?php
// Delete a product by ID
include 'db.php';
/* @var $pdo PDO */

//TODO: Complete the code to handle product deletion request and delete the product from the database
// ...

// Retrieve the product ID from the URL parameter (e.g., delete.php?id=1)
$id = $_GET['id'] ?? null;

// Validate that an ID was provided and that it is a number
if ($id && is_numeric($id)) {
    try {
        // Prepare the SQL DELETE statement to prevent SQL injection
        // Adjust the table name if it differs from 'products'
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
        
        // Execute the statement with the provided ID
        $stmt->execute([':id' => $id]);
        
    } catch (PDOException $e) {
        // In a production environment, log this error instead of killing the script
        die("Error deleting product: " . $e->getMessage());
    }
}

header("Location: index.php");
exit();