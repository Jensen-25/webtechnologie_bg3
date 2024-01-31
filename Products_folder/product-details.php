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
        margin-right: 20px;
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
<div class="container">
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
            ?>
                <div class='product-image'>
                    <img src='<?php echo $row["ProductImage"]; ?>' alt='Product Image' style='max-width: 100%;'>
                        </div>
                        <table>
                            <tr>
                                <th>Product Name</th>
                                <td><?php echo $row["ProductName"]; ?></td>

                                <th>Price</th>
                                <td><?php echo $row["ProductPrice"]; ?></td>

                                <th>Product Description</th>
                                <td><?php echo $row["ProductDescription"]; ?></td>

                                <th>Protein Amount</th>
                                <td><?php echo $row["ProteinAmount"]; ?></td>

                                <th>Product Stock</th>
                                <td><?php echo $row["ProductStock"]; ?></td>
                            </tr>
                        </table>

            <?php
            // // Output data of each row
            // echo "<div class='product-image'>";
            // $row = $result->fetch_assoc();
            // echo "<img src='" . $row["ProductImage"] . "' alt = 'Product Image' style='max-width: 100% ; '>";
            // echo "</div>" ;
            // echo "<table>";
            
            // echo "<tr>
            //     <th>Product Name</th>
            //     <td>" . $row["ProductName"] . "</td>

            //     <th>Price</th>
            //     <td>" . $row["ProductPrice"] . "</td>

            //     <th>Product Description</th>
            //     <td>" . $row["ProductDescription"] . "</td>

            //     <th>Protein Amount</th>
            //     <td>" . $row["ProteinAmount"] . "</td>

            //     <th>Product Stock</th>
            //     <td>" . $row["ProductStock"] . "</td>

            // </tr>";
            // echo "</table>" ;
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

</div>

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
        <?php include '../Navbar_folder/Footer.php'; ?>
 

 
 
 </body>
 </html>