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
        <?php include 'Navbar_folder/Navbar_link.php'; ?>    
            .content {
            margin-top: 5%;
            margin-bottom: 8%;
            }

            .content h1 {
            text-align: left;
            margin-left: 5%;
            margin-top: 5%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 300%;
            align-self:stretch;
            }
            
            .content h2 {
            text-align: left;
            margin-left: 5%;
            margin-top: 2.5%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 150%;
            align-self:stretch;
            }
            
            .content p{
            margin-left: 5%;
            margin-top: 1%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 100%;
            align-self:stretch;
            }
        </style>        

    </head>

    <body>
        <!-- Content -->
        <div class="content">
        <h1>Contact</h1><br>

        <h2>Opening hours Customer Service:</h2>
        <p>Monday - Friday: 9 a.m. - 5 p.m.</p>

        <h2>Email:</h2>
        <p>customerservice@fitflavors.nl</p>

        <h2>Phone:</h2>
        <p>NL: +316 12 34 56 78</p>

        <h2>Address:</h2>
        <p>Science Park 904</p>
        <p>1098 XH</p> 
        <p>Amsterdam</p>
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
