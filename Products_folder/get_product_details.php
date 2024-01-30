<?php
include '/var/www/connections/connections.php';

$conn = openConnection();

// Check for connection errors
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

// // Function to get product information by product ID
// function getProductInfo($productId, $products) {
//     if (array_key_exists($productId, $products)) {
//         return $products[$productId];
//     } else {
//         return null; // Product ID not found
//     }
// }

// Get the product ID from the URL parameter
$productId = $_GET['id'];

// Debugging statement to check the value of $productId - Chiara
echo "Product ID from URL: " . $productId;

// The sql query to the database
$sql = "SELECT * FROM Products WHERE ProductID = " . (int)$productId;
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    // Handle the error if the query fails
    die("Error in SQL query: " . mysqli_error($conn));
}

// get the info through the function
$productInfo = mysqli_fetch_assoc($result);
// $productInfo = getProductInfo($productId, $productDetails);

// Check if the product ID was found and send the information through JSON encoding
if ($productInfo !== null) {
    header('Content-Type: application/json');
    echo json_encode($productInfo);

} else {
    // Product ID not found
    header('HTTP/1.1 404 Not Found');
    echo json_encode(array('error' => 'Product not found'));
}

// Free result set
mysqli_free_result($result);

closeConnection($conn);
?>