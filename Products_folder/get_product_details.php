<?php
include '/var/www/connections/connections.php';

// Function to get product information by product ID
function getProductInfo($productId, $products) {
    if (array_key_exists($productId, $products)) {
        return $products[$productId];
    } else {
        return null; // Product ID not found
    }
}

// Get the product ID from the URL parameter
$productId = $_GET['id'];

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

$sql = "SELECT * FROM Products WHERE id = $productId";
$result = mysqli_query($conn, $sql)

// Check if the query was successful
if (!$result) {
    // Handle the error if the query fails
    die("Error in SQL query: " . mysqli_error($conn));
}

// get the info through the function
$productDetails = mysqli_fetch_assoc($result);
$productInfo = getProductInfo($productId, $productDetails);

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

$conn->close();
?>