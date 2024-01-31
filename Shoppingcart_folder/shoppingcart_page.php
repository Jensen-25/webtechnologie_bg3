<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="Homepage_stylesheet.css">

    <!-- Link voor icoontjes footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Shoppingcart </title>
        
    <!-- Navigatie bar -->
    <?php include 'Navbar_folder/Navbar_link.php'; ?>

     

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
    </style>

<body>


<?php 

include '/var/www/connections/connections.php';

// Initialize the session
session_start();

$connection = openConnection();

    // Check if the Order ID is provided in the URL
    if (isset($_GET['id'])){
      $OrderID = (int)$_GET['id'];

      // extract table OrderedProducts from database
      $orderedproducts_data = "SELECT * FROM OrderedProducts WHERE OrderID = $OrderID" ;

      // execute the query
      $result = mysqli_query($connection, $orderedproducts_data);

      if ($result->num_rows > 0){
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
              echo "<table>";
              echo "<tr>
                  <td>" . $row["ProductID"] . "</td>
                  <td>" . $row["ProductAmount"] . "</td>
                  <td>" . $row["ProductPrice"] . "</td>
                </tr>";
          }
      }
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
        window.location.href = `payment_page.html?id=${OrderId}`;
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
