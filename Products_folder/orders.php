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
    if (isset($_GET['id'])){
        $productID = (int)$_GET['id'];


            $OrderID = rand();

            // Add product to ordered products database
            $insert_order_query = "INSERT INTO OrderedProducts(OrderID) VALUES ($OrderID)" ;
            
            $insert_product_query = "INSERT INTO OrderedProducts (ProductID, ProductPrice)
            SELECT ProductID, ProductPrice FROM Products
            WHERE ProductID='$productID'";

            $ordered_products_data = "SELECT * FROM OrderedProducts" ;

            // extract table products from database
            $product_data = "SELECT * FROM Products WHERE ProductID = $productID";

            // execute the query
            $result = mysqli_query($connection, $product_data);

            if ($result->num_rows == 1 ){
                // Output data of each row
                echo "<table>";
                $row = $result->fetch_assoc();
                echo "<tr>
                    <td>" . $row["ProductName"] . "</td>
                    <td>" . $row["ProductPrice"] . "</td>
                </tr>";
                echo "</table>" ;
            }
            else {
                echo "Product not found." ;
            }
        } 
    // }
    else {
        echo "Product ID not provided in the URL" ;
    }
}



    

closeConnection($connection);

?>

<!-- Redirect to shopping cart -->

<button id="ShoppingcartButton">Go to shoppingcart</button>

<script>
    var shoppingbtn = document.getElementById('ShoppingcartButton');
    shoppingbtn.addEventListener('click', function () {
        const OrderId = <?php echo $OrderID?>
        // Redirect to the shoppingcart page with the product ID
        window.location.href = `../Shoppingcart_folder/shoppingcart_page.php?id=${OrderId}`;
    });
</script>

<!-- Redirect to Products -->
<button id="ProductsButton">Go to products</button>

<script>
    var productsbtn = document.getElementById('ProductsButton');
    productsbtn.addEventListener('click', function () {
        window.location.href = `main_products_page.php`;
    });
</script>

        <!-- Footer -->
        <?php include '../Navbar_folder/Footer.php'; ?>
 

 
 
 </body>
 </html>