<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order page</title>

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
            margin-left: 50%;
            width: 500px;
            height: 50px;
            color: white;
            background-color: #C4AE8C;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
        }
    </style>
 </head>
 
 
 <body>

<h> The product has been added to your shoppingcart! </h>

<?php 

include '/var/www/connections/connections.php';

// Initialize the session
session_start();

$connection = openConnection();


    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])){
        $productID = (int)$_GET['id'];


        // Add product to ordered products database
        $ordered_product_data = "INSERT INTO OrderedProducts (ProductID, ProductPrice)
        SELECT ProductID, ProductPrice FROM Products
        WHERE ProductID='$productID'";

        // extract order id from ordered products database
        $OrderID = "SELECT * FROM OrderedProducts WHERE ProductID = $productID";

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
    } else {
        echo "Product ID not provided in the URL" ;
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
        <div class="footer"> 
            <div class="row">
            <div class="column">
                <h3 class="footer">About Fit 'n Flavors</h3>
                <p class="footer"> <a href="../About_us_folder/About_us.html">About us</a></p>
                <p class="footer"> <a href="../About_us_folder/Terms_and_conditions.html">Terms & Conditions</a></p>
            </div>

            <div class="column">
                <h3 class="footer">Costumerservice</h3>
                <p class="footer"><a href="../FAQ/FAQ.html">FAQ</a></p>
                <p class="footer"><a href="../FAQ/Delivery.html">Delivery information</a></p>
                <p class="footer"><a href="../FAQ/Returns.html">Returns and refund policy</a></p>
                <p class="footer"><a href="../FAQ/Contact.html">Contact</a></p>
            </div>
            
            <div class="column">
                <h3 class="footer">Follow us!</h3>
                <p class="footer"><a class="footer" href="http://www.instagram.com/" ><i class="fa fa-instagram" style="font-size:24px"></i></a>
                    <a class="footer" href="https://www.facebook.com" ><i class="fa fa-facebook" style="font-size:24px"></i></a>
                    <a class="footer" href="https://www.linkedin.com" ><i class="fa fa-linkedin" style="font-size:24px"></i></a>
                </p>
            </div>
            </div>
        </div>
 

 
 
 </body>
 </html>
 
 
 