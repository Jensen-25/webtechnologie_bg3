<?php
// Start the session
session_start();

// Check if the product ID is provided in the request
if (isset($_GET['id'])) {
    $productId = (int)$_GET['id'];

    // Check if the product ID is valid
    if ($productId > 0) {
        // Initialize the shopping cart array in the session if not already set
        if (!isset($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = array();
        }

        // Add the product to the shopping cart
        if (!in_array($productId, $_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'][] = $productId;
            echo "Product added to the shopping cart successfully!";
        } else {
            echo "Product is already in the shopping cart.";
        }
    } else {
        echo "Invalid product ID.";
    }
} else {
    echo "Product ID not provided in the request.";
}
?>