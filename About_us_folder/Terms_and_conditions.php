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
                margin-bottom: 5%;
                margin-bottom: 8%;
                }
                
                .content h1 {
                text-align: center;
                margin-bottom: 4%;
                margin-left: 5%;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 300%;
                align-self:stretch;
                }
                
                .content h3 {
                text-align: left;
                margin-left: 5%;
                margin-top: 3%;
                margin-bottom: 1%;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 150%;
                align-self:stretch;
                }
                
                .content p{
                text-align: left;
                margin-left: 5%;
                margin-top: 1%;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 100%;
                align-self:stretch;
                }

                .content a:link, .content a:visited {color: black;
                }

            </style>
        </head>

        <body>
            <!-- Content -->
            <div class="content">
            <h1>Terms & Conditions</h1>
            
            <p><strong>Last Updated:</strong> January 25, 2024</p>
            
            <p>Welcome to Fit n' Flavors. Please read these Terms and Conditions carefully before using our website. By accessing this website and purchasing products, you agree to the following terms and conditions.</p>

	        <h3>General</h3>
            <p>a. Fit n' Flavors ("we," "us," or "our") provides an online platform for the sale of protein products.<br>
                b. By visiting our website and making purchases, you agree to these Terms and Conditions.</p>

            <h3>Product Information</h3>
            <p>a. Product descriptions and images are sourced from the original supplier websites.<br>
                b. While we strive for accuracy, we do not guarantee that the information is complete, up-to-date, or free from errors. </p>

            <h3>Orders and Payments</h3>
            <p>a. You can place orders using the shopping cart on our website.<br>
                b. Payments are processed through secure payment methods.<br>
                c. We reserve the right to refuse orders at our discretion.</p>

            <h3>Shipping and Delivery</h3>
            <p>a. Please refer to our <a href=../FAQ/Delivery.php>Delivery information</a> page for information on Shipping and Delivery.</p>

            <h3>Returns and Refunds</h3>
            <p>a. Please refer to our <a href=../FAQ/Returns.php>Return Policy</a> for information on returns and refunds.</p>

            <h3>Intellectual Property</h3>
            <p>a. All content on our website, including but not limited to text, images, and logos, is our property or licensed for use.<br>
                b. Copying, reproducing, or distributing our content without permission is prohibited.</p>

            <h3>Privacy</h3>
            <p>a. We may collect personal information, such as your name, email address, address, and payment details when you visit our website, create an account, or make a purchase.<br>
                b. We use the collected information to process your orders, manage your account, and keep you informed about offers and updates. Your data will not be sold or shared with third parties for marketing purposes.<br>
                c. We take reasonable measures to protect your personal information from unauthorized access, use, or disclosure. Payment details are encrypted using SSL technology.</p>
            
            <h3>Liability</h3>
            <p>a. Fit n' Flavors is not liable for damages arising from the use of our website or purchased products.</p>

            <h3>Changes to Terms and Conditions</h3>
            <p>a. We reserve the right to modify these Terms and Conditions at any time. Changes will be effective once posted on the website.</p>

            <h3>Contact Information</h3>
            <p>a. For questions, refer to our <a href="../FAQ/FAQ.php">Frequently Asked Questions</a> page. For comments, please get in contact with our <a href=../FAQ/Contact.php>Customer Service</a>.</p>

            <p>Thank you for reading our Terms and Conditions. We appreciate your trust in Fit n' Flavors.</p>
            </div>

            <!-- Footer -->
            <?php include '../Navbar_folder/Footer.php'; ?>
        </body>

    </html>