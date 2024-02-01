<?php
include '/var/www/connections/connections.php';
session_start();
?>

<!-- Cookie -->
<?php include '../cookie.php'; ?>

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
            .content h1 {
            text-align: center;
            margin-bottom: 4%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 300%;
            align-self:stretch;
            }
            
            .content h2 {
            text-align: left;
            margin-left: 0%;
            margin-top: 3%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 200%;
            align-self:stretch;
            }
            
            .content p{
            text-align: left;
            margin-left: 0%;
            margin-top: 1%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 100%;
            align-self:stretch;
            }
            
            .content div {
            text-align: center;
            margin-top: 4%;
            margin-bottom: 4%;
            margin-left:5%;
            margin-right:5%;     
            }

            .li2 {
            float: none;
            text-align: left;
            margin-left: 0%;
            }

        </style>
    </head>

    <body>
        
        <!-- Content -->
        <div class="content">
        <h1>Returns and Refund policy</h1>

        <div>
            <h2>Return policy</h2>
            <p>You have 14 days from the date of receiving your item to start a return.</p>
            <p>We accept returns for all orders, provided they meet the following criteria:</p><br>
            <p>
                <ol>
                    <li class="li2"><p>The order must be returned in the original packaging.</p></li>
                    <li class="li2"><p>The item must not be used or damaged, seals must be intact.</p></li>
                    <li class="li2"><p>Orders outside the 14-day return period will not be accepted.</p></li>
                </ol>
            </p><br>
            <p>All items are inspected upon receipt by our quality assurance team, if the above criteria are not met we are unable to issue a refund and items will be returned to the customer at their expense.</p>
            <p>We reserve the right, at our sole discretion, to determine if returned merchandise is in saleable condition.</p><br>
            <p>Unless the return is caused by us, the shipping costs (€4,95) will be deducted from the amount of your refund.</p>
            <p>If you have received a damaged, faulty or incorrect item, please contact our customer service team,  who will resolve this for you on a case-by-case basis.</p><br>
            <p>Please note that we do not offer exchanges. You will need to place a new order and return the original item for a refund.</p>
        </div>    

        <div>
        <h2>Return instructions</h2>
        <p>If you would like to return a product, please follow the following steps:</p><br>
        <p><ol>
                <li class="li2"><p>Attach the supplied return label for your return on top of the old label.</p>
                    <p>You will find the correct return address on the return label.</p></li>
                <li class="li2"><p>Deliver your return shipment to a PostNL or DHL point.</p></li>
                <li class="li2"><p>Please keep your proof of shipment until your return has been processed by us.</p></li>
            </ol>
        </p><br>
        <p>Returns will be processed within 5-7 business days of their arrival at our facility.</p>
        <p>You will receive a confirmation via email, after which your money will be refunded via the payment method you used within 3-5 working days.</p>
        </div>
        
        <div>
        <h2>Refund policy</h2>
        <p>We offer a 14-day return policy, allowing you to request a return within 14 days of receiving your item.</p>
        <p>Unless the return is caused by us, the shipping costs (€4,95) will be deducted from the amount of your refund.</p><br>
        <p>To be eligible for a return, your item must be in its original condition, unopened, with seals and tags intact, and in the original packaging.</p>
        <p>Please ensure you have the receipt or proof of purchase.</p><br>
        <p>You can always contact us for any return question at customerservice@fitflavors.nl</p>
        </div>

        <div>
        <h2>Damages and issues</h2>
        <p>Upon receiving your order, please inspect the items.</p>
        <p>If you find any defects, damages, or receive the wrong item, kindly contact us immediately.</p>
        <p>This allows us to assess the issue and make it right for you.</p>
        </div>

        <div>
        <h2>Exchanges</h2>
        <p>We do not offer exchanges. You will need to place a new order and return the original item for a refund.</p>
        </div>

        <div>
        <h2>Refunds</h2>
        <p>We will notify you once we have received and inspected your returned item, and let you know if the refund is approved or not.</p>
        <p>If approved, the refund will be automatically processed to your original payment method.</p><br>
        <p>Please keep in mind that it may take some time for your bank or credit card company to process and post the refund as well.</p>
        </div>
        </div>

        <!-- Footer -->
        <?php include '../Navbar_folder/Footer.php'; ?>

    </body>
</html>
