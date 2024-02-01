<?php
include '/var/www/connections/connections.php';
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
    <title>Product Details Page</title>

    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="/Homepage_stylesheet.css">

    <!-- Navigatie bar -->
    <?php include '../Navbar_folder/Navbar_link.php'; ?>

    <!-- Link voor icoontjes footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
            font-family: Arial, sans-serif;
        }
    
    /* nog aanpassen! */
    .container {
        width: 80%;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;

    }

    .product-image {
        max-width: 300px;
        margin-left: 20px;

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
            width: 90%; /* Set a specific width for all cells */
            display:block;
        }

        th {
            background-color: #f2f2f2;
        }

        #ShoppingcartButton {
            margin-left: 50%;
            width: 500px;
            height: 50px;
            color: white;
            background-color: #C4AE8C;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
        }

        /* Additional styles for displaying details --> NOG VERANDEREN!! */
        .product-details {
            display: flex;
            flex-direction: column;
            max-width: 500px;
        }

        .product-details div {
            margin-bottom: 10px;
        }
    </style>
 </head>
 
 
 <body>
<div class="container">
<?php 
    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])){
        $productID = (int)$_GET['id'];


        // extract table products from database
        $product_data = "SELECT * FROM Products WHERE ProductID = $productID";

        // execute the query
        $result = mysqli_query($connection, $product_data);

        if ($result->num_rows == 1 ){
            // Output data of each row
            echo "<div class='product-image'>";
            $row = $result->fetch_assoc();
            echo "<img src='" . $row["ProductImage"] . "' alt = 'Product Image' style='max-width: 100% ; '>";
            echo "</div>" ;
            echo "<div class='product-details'>";
            echo "<div><strong>Product Name:</strong> " . $row["ProductName"] . "</div>";
            echo "<div><strong>Price:</strong> " . $row["ProductPrice"] . "</div>";
            echo "<div><strong>Product Description:</strong> " . $row["ProductDescription"] . "</div>";
            echo "<div><strong>Protein Amount:</strong> " . $row["ProteinAmount"] . "</div>";
            echo "<div><strong>Product Stock:</strong> " . $row["ProductStock"] . "</div>";
            echo "</div>";
        }
        else {
            echo "Product not found." ;
        }
    } else {
        echo "Product ID not provided in the URL" ;
    }

    

closeConnection($connection);

?>

    <!-- Add to shoppingcart button -->
    <form method="post" action="Add_to_cart.php"> 
        <button id="ShoppingcartButton" name='add'>Add to shoppingcart</button>
        <input type="hidden" name="productId" value="<?php echo $productID; ?>">
    </form>
</div>

    <script>
        var btn = document.getElementById('ShoppingcartButton');
        btn.addEventListener('click', function () {
            const productId = <?php echo $productID ?>;
            // Redirect to the shopping cart page with the product ID
            window.location.href = `../Shoppingcart_folder/shoppingcart_page.php`;
        });
    </script>
        
    // Footer
    <?php include '../Navbar_folder/Footer.php'; ?>
 
 </body>
 </html>
