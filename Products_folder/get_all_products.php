<?php
include '/var/www/connections/connections.php';

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM Products";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    // Handle the error if the query fails
    die("Error in SQL query: " . mysqli_error($conn));
}

// Fetch all products and store them in an array
$allProducts = array();
while ($row = mysqli_fetch_assoc($result)) {
    $allProducts[] = $row;
}

// Check if there are products in the array and send the information through JSON encoding
if (!empty($allProducts)) {
    header('Content-Type: application/json');
    echo json_encode($allProducts);
} else {
    // No products found
    header('HTTP/1.1 404 Not Found');
    echo json_encode(array('error' => 'No products found'));
}

// Free result set
mysqli_free_result($result);

$conn->close();
?>