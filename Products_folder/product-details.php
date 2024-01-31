<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>

    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="/Homepage_stylesheet.css">

        <!-- Navigatie bar -->
        <?php
            if (isset($_SESSION['admin'])){
                ?>
                <script src="../Navbar_folder/Navbar_loggedin.js" defer></script>
        <?php } elseif(isset($_SESSION['user'])){
                ?>
                <script src="../Navbar_folder/Navbar_admin.js" defer></script>
        <?php } else {
                ?>
                <script src="../Navbar_folder/navbar.js" defer></script>
        <?php  }
    ?>

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

<?php 

include '/var/www/connections/connections.php';

// Initialize the session
session_start();

$connection = openConnection();


    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])){
        $productID = (int)$_GET['id'];


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
                <td>" . $row["ProductDescription"] . "</td>
                <td>" . $row["ProductImage"] . "</td>
                <td>" . $row["ProteinAmount"] . "</td>
                <td>" . $row["ProductStock"] . "</td>
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

<!-- Add to shoppingcart button -->

<button id="ShoppingcartButton">Add to shoppingcart</button>

<script>
    var btn = document.getElementById('ShoppingcartButton');
    btn.addEventListener('click', function () {
        const productId = <?php echo $productID?>
        // Redirect to the shoppingcart page with the product ID
        window.location.href = `orders.php?id=${productId}`;
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