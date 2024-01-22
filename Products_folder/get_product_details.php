<?php
$productId = $_GET['id']; // Get the product ID from the URL parameter

// Perform a MySQL query to get product details based on $productId
// Example: $query = "SELECT * FROM products WHERE id = $productId";
// Execute the query and fetch the result as an associative array

// Assuming $productDetails is an associative array with product details
$productDetails = [
    'productName' => 'Product Name',
    'description' => 'Product Description',
    'price' => '$19.99',
    // Add more details as needed
];

// Return product details as JSON
header('Content-Type: application/json');
echo json_encode($productDetails);
?>