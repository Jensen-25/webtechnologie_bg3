<?php
include '/var/www/connections/connections.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Homepage User </title>
            
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
        <style>
            .content {
            text-align: center;
            margin-top: 4%;
            margin-bottom: 5%;
            margin-left:15%;
            margin-right:15%;
            background-color:#fffff0; 
            }

            .content h1 {
            text-align: centre;
            margin-bottom: 6%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 300%;
            align-self:stretch;
            }
            
            .content h2 {
            text-align: center;
            margin-top: 4%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 200%;
            align-self:stretch;
            }
            
            .content p{
            text-align: center;
            margin-top: 1%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 100%;
            align-self:stretch;
            }
            </style>
    </head>

    <body>
        
        <!-- content -->
        <div class="content">
        <h1>Delivery</h1>
            <h2>Delivery information</h2>
            <p>Fit 'n Flavors ships to the Netherlands only.<br><br>
            Orders placed on business days before 23:59 will be shipped the same day and are expected to be delivered the next business day. <br><br>
            Weekend orders can be anticipated to arrive on the following Tuesday.
            </p>
        </div>

        <div class="content">
            <h2>Shipping rates</h2>
            <p>Fit ‘n Flavors offers FREE shipping on all orders without returns.<br><br>
            In case of a return, the shipping costs are €4,95 and will be deducted from the amount of your refund.
            </p>
            <br>
            <br>
        </div>

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
