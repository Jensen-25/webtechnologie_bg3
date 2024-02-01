<?php
include '/var/www/connections/connections.php';

session_start();
$connection = openConnection();

// Cookie
include '../cookie.php';

// Redirect to homepage if not logged in
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    echo "<script>
    alert('Please log in to proceed.');
    window.location.href = '../Login_folder/Login_screen.php';
    </script>";
    exit();
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="../Homepage_stylesheet.css">

    <!-- Link voor icoontjes footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Shoppingcart </title>
        
    <!-- Navigatie bar -->
    <?php include '../Navbar_folder/Navbar_link.php'; ?>

     

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

        /* #CheckoutButton {
            margin-left: 30%;
            width: 500px;
            height: 50px;
            color: white;
            background-color: #C4AE8C;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
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

        .button-block {
        margin-top: 5%;
        margin-bottom: 5%;
        justify-content: center;
        display: flex;
        }
    </style>

<body>

<h1><b>Shoppingcart</b></h1>
<p>Your items:</p>


<?php 
        echo "<table>";
        echo "<tr>";
        echo "<th>Product Image</th>";
        echo "<th>Product Name</th>";
        echo "<th>Price</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";

// Check if the shopping cart and product quantities arrays are set in the session
if (isset($_SESSION['shopping_cart']) && isset($_SESSION['product_quantities'])) {
    // Connect to the database and retrieve product details based on the product IDs in the shopping cart
    echo "<h2>Shopping Cart:</h2>";

    $totalPrice = 0;
    $totalQuantities = 0;
    // Loop through each product in the shopping cart
    foreach ($_SESSION['shopping_cart'] as $productId) {
        // Retrieve product details from the database
        $product_data = "SELECT * FROM Products WHERE ProductID = $productId";
        $result = mysqli_query($connection, $product_data);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

                 // Display product details and quantity in table rows
                 echo "<tr>";
                 echo "<td><img src='" . $row["ProductImage"] . "' alt='Product Image' style='max-width: 100%;'></td>";
                 echo "<td>" . $row["ProductName"] . "</td>";
                 echo "<td>" . $row["ProductPrice"] . "</td>";
                 echo "<td>" . $_SESSION['product_quantities'][$productId] . "</td>";
                 // Add more table data if needed
                 echo "</tr>";

                 $totalPrice += $row["ProductPrice"] * $_SESSION['product_quantities'][$productId];
                 $totalQuantities += $_SESSION['product_quantities'][$productId];
        }
    }

    echo "<tr>";
    echo "<td>Thanks for ordering ! " . "</td>";
    echo "<td>Order Date: " . date("Y-m-d") . "</td>";
    echo "<td>Total Price: $" . $totalPrice . "</td>"; 
    echo "<td>Total Quantity: " . $totalQuantities . "</td>";
    echo "</tr>";

    echo "</table>";
} else {
    echo "<p>Your shopping cart is empty.</p>";
}
}
?>


<!-- Continue shopping -->
<div class="button-block"><a class="button button1" id="CheckoutButton2" 
href="../Products_folder/main_products_page.php">Add more products</a></div>

<!-- Link to payement page-->
<div class="button-block"><a class="button button1" id="CheckoutButton" href="payment_page.php">Proceed to pay</a></div>


<script>
    var btn = document.getElementById('CheckoutButton');
    btn.addEventListener('click', function () {
        const OrderId = <?php echo $OrderID?>
        // Redirect to the payment page with the Order ID
        window.location.href = `payment_page.php`;
    });
</script>

        <!-- Footer -->
        <?php include '../Navbar_folder/Footer.php'; ?>
</body>

</html>
