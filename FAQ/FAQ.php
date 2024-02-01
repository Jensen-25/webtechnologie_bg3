<?php
include '/var/www/connections/connections.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Homepage User </title>
            
        <!-- Navigatie bar -->
        <?php include '../Navbar_folder/Navbar_link.php'; ?>

        <style>
            /* Change the link color to black*/
            .content {
            margin-bottom: 7%;
            }
            
            .content a:link, .content a:visited { 
            color: black;
            } 

            .content br {
            margin-top: 0%;    
            }

            .content h1 {
                text-align:center;
                margin-top: 5%;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 300%;
                align-self:stretch;
            }

            .content h2 {
            margin-left: 0%;
            margin-top: 5%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 100%;
            align-self:stretch;

            }

            .content h3 {
            margin-left: 15%;
            margin-top: 5%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 200%;
            align-self:stretch;
            }

            .content h4 {
            margin-left: 0%;
            margin-top: 0%;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 100%;
            align-self:stretch;
            }

            .content p{
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 100%;
            align-self:stretch;
            margin-top: 2%;
            margin-bottom: 2%;
            }

            .intro {
            text-align: center;
            }

            /* Accordion */
            .accordion {
            background-color: #eee;
            color: #000000;
            cursor: pointer;
            padding: 18px;
            width: 70%;
            margin-right: 15%;
            margin-left: 15%;
            margin-top: 1%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            }

            .active, .accordion:hover {
            background-color: #D9C7AA;
            }

            .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: right;
            }

            .active:after {
            content: "\2212";
            }

            .panel {
            padding: 0 18px;
            margin-top: 1%;
            margin-left: 15%;
            margin-right: 15%;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            }
        </style>
    </head>

    <body>
        <div class="content">
            <h1> Frequently Asked Questions </h1>
                <p class="intro">Cannot find the answer to your question below? Please get in contact with our 
                <a href="Contact.php" title="Contact" class="contact-button"> Customer Service</a> team and they will be happy to help. </p>

            <h3>Ordering</h3>
                <button class="accordion">The item I want to order is out of stock. Why is it on the website?</button>
                <div class="panel">
                <p>All Fit ‘n Flavors stock depends upon availability.</p>
                <p>We want you to be able to order and receive the products you love effortlessly, so we will always aim to let you know if an item is out of stock.</p>
                </div>

                <button class="accordion">How do I place an order?</button>
                <div class="panel">
                <p>Search for products you would like to order and add them to your shopping cart.</p>
                <p>You can either carry on shopping or checkout if you have  got everything you need.</p> 
                <p>Enter your address and payment details manually.</p>
                <p>Check if everything is correct and you are good to go!</p>
                </div>

                <button class="accordion">Can I place an order to a different address?</button>
                <div class="panel">
                <p>Absolutely, you can select any delivery address at the checkout stage.</p>
                </div>

                <button class="accordion">Can I cancel or change my order?</button>
                <div class="panel">
                <p>Placed orders will be immediately prepared for you. Therefore, it is not possible to make any changes to your order.</p>
                <p>If you want to cancel your order, please call us within 10 minutes of purchasing, so we can do this for you.</p>
                <p>Once the cancellation is successful, we will refund your money within 5 working days so you can place a new order!</p>
                <p>If you did not manage to cancel your order within 10 minutes, do not worry!</p>
                <p>You can still refuse the parcel upon delivery. The courier will take the parcel back to our warehouse.</p>
                </div>

                <button class="accordion">Do I need an account to order?</button>
                <div class="panel">
                <p>Yes, you will need an account to order. You can register on our <a href="Registratiescherm.php" title="Registration">registration page</a>.</p>
                </div>

                <button class="accordion">I have received the wrong item. What should I do?</button>
                <div class="panel">
                <p>We are sorry to hear that, sometimes things can go wrong but do not worry as we can help.</p> 
                <p>Please contact us to tell us more, so we can look into this for you. </p>
                <p>We need to know the following information: 
                <ol>
                    <li>Order Number</li>
                    <li>Incorrect item received</li>
                    <li>The correct item ordered</li>
                </ol> </p>
                <p>As soon as we have looked into what has happened we will send you an email with the outcome.</p>
                </div>

                <button class="accordion">I have received a damaged item. What should I do?</button>
                <div class="panel">
                <p>We are sorry to hear you have received your order damaged.</p>
                <p>Please contact us to tell us more and provide us the following information:
                <ol>
                    <li>Order Number</li>
                    <li>Product Name</li>
                    <li>Picture of the damage</li>
                </ol></p>
                <p>We may ask for pictures of the damage to ensure we take measures to prevent it happening again, so please do not throw the item away!</p> 
                <p>As soon as we know what has happened, we will send you an email with the outcome.</p>
                </div>

                <button class="accordion">I would like to raise a complaint about the quality of a product.</button>
                <div class="panel">
                <p>We take all complaints seriously and are committed to protecting our valued customers.</p>
                <p>If you have a concern regarding the quality of any of our products then please get in contact with our <a href="Contact.php" title="Contact">Customer Service</a> team.</p>
                <p>It would really speed our investigation up if you could find the information below before contacting us.
                <ol>
                    <li>Order Number</li>
                    <li>Product Name</li>
                    <li>Batch Number</li>
                    <li>Expiry Date</li>
                    <li>Images where applicable</li>
                    <li>A brief summary that details the actual complaint</li>
                </ol></p>
                <p>Please keep the product until you have spoken with our team who will advise whether or not we require it back for further analysis.</p>
                </div>

            <h3>Delivery</h3>
                <button class="accordion">What delivery options do you offer?</button>
                <div class="panel">
                <p>All our delivery options can be found on our <a href="Delivery.php" title="Delivery Information">Delivery Information</a> page.</p>
                </div>

                <button class="accordion">What happens if I am not at home to accept my delivery?</button>
                <div class="panel">
                <p>Do not worry, if your order cannot fit through the letterbox or requires a signature then you should receive a calling card.<br>
                This card is from the courier and lets you know where your parcel is and how you can collect it.</p>
                </div>

                <button class="accordion">There is an item missing from my order. What should I do?</button>
                <div class="panel">
                <p>Please contact our Customer Service team and they will be happy to help.</p>
                <p>We need to know the following information:
                <ol>
                    <li>Order Number</li>
                    <li>Product Name of the missing product</li>
                </ol></p>
                </div>

            <h3>Returns and refunds</h3>
                <button class="accordion">What is your return policy?</button>
                <div class="panel">
                <p>Please refer to our <a href="Returns.php" title="Returns and refunds">Return Policy</a> page for more information about our return policy.</p>
                <p>If this does not answer your question then our <a href="Contact.php" title="Contact">Customer Service</a> team is ready to help you.</p>
                </div>

                <button class="accordion">How do I return an item?</button>
                <div class="panel">
                    <ol>
                        <li><p>Attach the supplied return label for your return on top of the old label.<br>
                            You will find the correct return address on the return label.</p></li>
                        <li><p>Deliver your return shipment to a PostNL or DHL point</p></li>
                        <li><p>Please keep your proof of shipment until your return has been processed by us.</p></li>
                    </ol>
                <p>Please refer to our <a href="Returns.php" title="Returns and refunds">Return Policy</a> page for more information about our return policy.</p>
                </div>

                <button class="accordion">Can I return a product if I no longer want it?</button>
                <div class="panel">
                <p>We want all of our customers to enjoy their products, so if you are not happy with your order you can send it back to us within 14 days.<br><br>
                Please take a look at our <a href="Returns.php" title="Returns and refunds">Return Policy</a> for further instructions.</p>
                </div>

                <button class="accordion">What happens once my item is returned?</button>
                <div class="panel">
                <p>Once received, we will process the returned goods and send you a notification via email.</p>
                <p>This can take 5-7 working days from the date we receive the return.</p>
                <p>Your money will be refunded via the payment method you used within 3-5 working days.</p>
                </div>

                <button class="accordion">When will I receive my refund?</button>
                <div class="panel">
                <p>Returns will be processed within 5-7 business days of their arrival at our facility.</p>
                <p>You will receive a confirmation via email, after which your money will be refunded via the payment method you used within 3-5 working days.</p>
                </p>
                </div>
            </div>

        <!-- Footer -->
        <?php include '../Navbar_folder/Footer.php'; ?>
        
        <!-- Script for accordion -->
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                } 
            });
            }
        </script>

    </body>
</html>