<?php
include '/var/www/connections/connections.php';

$conn = openConnection();

// Check for connection errors
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$sql = "SELECT * FROM OrderedProducts"
  WHERE OrderID=;
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    // Handle the error if the query fails
    die("Error in SQL query: " . mysqli_error($conn));
}

// Fetch all products and store them in an array
$allOrderedProducts = array();
while ($row = mysqli_fetch_assoc($result)) {
    $allOrderedProducts[] = $row;
}

// Check if there are products in the array and send the information through JSON encoding
if (!empty($allOrderedProducts)) {
    header('Content-Type: application/json');
    echo json_encode($allOrders);
} else {
    // No orders found
    header('HTTP/1.1 404 Not Found');
    echo json_encode(array('error' => 'No orders found'));
}

// Free result set
mysqli_free_result($result);

closeConnection($conn);
?>
