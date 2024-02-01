<?php 
include '/var/www/connections/connections.php';

// Initialize the session
session_start();

$connection = openConnection();

// Cookie
include '../cookie.php';

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

        /* #ShoppingcartButton {
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
    

    } */

    .button {
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    margin-top: 8%;
    }

    .button1 {
    background-color: #C4AE8C; 
    color: black; 
    border: 2px solid #C4AE8C;
    }

    .button1:hover {
    background-color: #D9C7AA;
    color: white;
    }

    .button2 {
    background-color: #C4AE8C; 
    color: black; 
    border: 2px solid #C4AE8C;
    }

    .button2:hover {
    background-color: #D9C7AA;
    color: white;}

    .button-block {
    margin-top: 5%;
    margin-bottom: 5%;
    justify-content: center;
    display: flex;
    }
    </style>

 </head>
 
 
<body>

    <h1><b> The product has been added to your shoppingcart! <b></h1>


    <?php 
        // Check if the product ID is provided in the URL
        if (isset($_POST['add'])) {
        
            $productId = (int)$_POST['productId'];

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

                // Stock decreases
                $updateStockQuery = "UPDATE Products SET ProductStock = ProductStock - 1 WHERE ProductID = $productId";
                mysqli_query($connection, $updateStockQuery);
                
                echo "Product added to the shopping cart successfully!";
            } 
            elseif (in_array($productId, $_SESSION['shopping_cart'])) {
            $_SESSION['product_quantities'][$productId]++;

                // Stock decreases
                $updateStockQuery = "UPDATE Products SET ProductStock = ProductStock - 1 WHERE ProductID = $productId";
                mysqli_query($connection, $updateStockQuery);

            echo "Product quantity increased in the shopping cart!";
        } else {
            echo "Product is already in the shopping cart.";
        }
    }     
        }else {
            echo "Invalid product ID.";
        }
    ?>

    <!-- Button to proceed schopping and button to shoppingcart -->
    <div class="button-block">
    <a class="button button1" href="../Products_folder/main_products_page.php">Continue shopping</a>
    <a class="button button2" href="../Shoppingcart_folder/shoppingcart_page.php">Shopping cart</a>
    </div>
</body>
</html>