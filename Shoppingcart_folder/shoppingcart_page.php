<?php
include '/var/www/connections/connections.php';

session_start();
$connection = openConnection();
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

        #CheckoutButton {
            margin-left: 30%;
            width: 500px;
            height: 50px;
            color: white;
            background-color: #C4AE8C;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 150%;
        }
    </style>

<body>

<h1><b>Shoppingcart</b></h1>
<p>Your items:</p>

<?php 


// Check if the shopping cart and product quantities arrays are set in the session
if (isset($_SESSION['shopping_cart']) && isset($_SESSION['product_quantities'])) {
    // Connect to the database and retrieve product details based on the product IDs in the shopping cart
    include '/var/www/connections/connections.php';
    $connection = openConnection();

    echo "<h2>Shopping Cart:</h2>";

    // Loop through each product in the shopping cart
    foreach ($_SESSION['shopping_cart'] as $productId) {
        // Retrieve product details from the database
        $product_data = "SELECT * FROM Products WHERE ProductID = $productId";
        $result = mysqli_query($connection, $product_data);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Display product details and quantity
            echo "<div>";
            echo "<img src='" . $row["ProductImage"] . "' alt='Product Image' style='max-width: 100%;'>";
            echo "<div><strong>Product Name:</strong> " . $row["ProductName"] . "</div>";
            echo "<div><strong>Price:</strong> " . $row["ProductPrice"] . "</div>";
            echo "<div><strong>Quantity:</strong> " . $_SESSION['product_quantities'][$productId] . "</div>";
            // Add more details if needed

            echo "</div>";
        }
    }

    closeConnection($connection);
} else {
    echo "<p>Your shopping cart is empty.</p>";
}

closeConnection($connection);
?>


  <!-- <script>
    // Test array of product data
    const products = [
        { OrderID: 1, ProductID: 1, ProductAmount: 1, Subtotal: 1, ProductID: 1},
        { OrderID: 1, ProductID: 3, ProductAmount: 2, Subtotal: 1, ProductID: 2},
        { OrderID: 1, ProductID: 5, ProductAmount: 3, Subtotal: 1, ProductID: 2},
        { OrderID: 1, ProductID: 7, ProductAmount: 1, Subtotal:1, roductID: 2},
        { OrderID: 1, ProductID: 9, ProductAmount: 1, Subtotal: 1, ProductID: 2},
        { OrderID: 1, ProductID: 10, ProductAmount: 1, Subtotal:1 ,ProductID: 2}
    ];

  </script> -->


<!-- Hierin moet een link naar de payment page als iemand op betalen drukt -->

<button id="CheckoutButton">Go to payment</button>

<script>
    var btn = document.getElementById('CheckoutButton');
    btn.addEventListener('click', function () {
        const OrderId = <?php echo $OrderID?>
        // Redirect to the payment page with the Order ID
        window.location.href = `payment_page.php?id=${OrderId}`;
    });
</script>

        <!-- Footer -->
        <?php include '../Navbar_folder/Footer.php'; ?>
</body>

</html>
