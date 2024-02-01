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
        <?php include '../Navbar_folder/Navbar_link.php'; ?>
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
        <?php include '../Navbar_folder/Footer.php'; ?>
    </body>
</html>
