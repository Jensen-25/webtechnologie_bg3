<?php 
include '/var/www/connections/connections.php';

// Initialize the session
session_start();

$connection = openConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order page</title>

    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="../Homepage_stylesheet.css">

    <!-- Navigatie bar -->
    <script src="../Navbar_folder/navbar.js" defer></script>

    <!-- Link voor icoontjes footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
            width: 10%; /* Set a specific width for all cells */
        }

        th {
            background-color: #f2f2f2;
        }

        #ShoppingcartButton {
            margin-left: 30%;
            width: 500px;
            height: 50px;
            color: white;
            background-color: #C4AE8C;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
        }

        #ProductsButton {
            margin-left: 50%;
            width: 500px;
            height: 50px;
            color: white;
            background-color: #C4AE8C;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
        }

    p {
    

    }
    </style>
 </head>
 
 
 <body>

<h1><b> The product has been added to your shoppingcart! <b></h1>

<?php 
    // Check if the product ID is provided in the URL
    if (isset($_POST['add'])) {

    // Check if the product ID is valid
    if ($productId > 0) {
        // Initialize the shopping cart array/ amount array in the session if not already set
        if (!isset($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = array();
        }
        if (!isset($_SESSION['product_quantities'])) {
            $_SESSION['product_quantities'] = array();
        }

        // Add the product to the shopping cart
        if (!in_array($productId, $_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'][] = $productId;
            $_SESSION['product_quantities'][$productId] = 1;
            echo "Product added to the shopping cart successfully!";
        } else {
            echo "Product is already in the shopping cart.";
        }
    } elseif (in_array($productId, $_SESSION['shopping_cart'])) {
        $_SESSION['product_quantities'][$productId]++;
        echo "Product quantity increased in the shopping cart!";
    }     
    }else {
        echo "Invalid product ID.";
    }
?>