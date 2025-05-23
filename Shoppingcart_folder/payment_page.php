<?php
include '/var/www/connections/connections.php';

// Initialize the session
session_start();
$connection = openConnection();

// Cookie
include '../cookie.php';
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Payment page</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- Link naar de CSS sheet -->
                <link rel="stylesheet" href="../Homepage_stylesheet.css">

                <!-- Navigatie bar -->
                <?php include '../Navbar_folder/Navbar_link.php'; ?>
    
                <!-- Link voor icoontjes footer-->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <script>
                    function submitForm() {
                        // Check if all form fields are filled
                        var firstName = document.getElementById("FirstName").value;
                        var lastName = document.getElementById("LastName").value;
                        var postalCode = document.getElementById("PostalCode").value;
                        var streetName = document.getElementById("StreetName").value;
                        var houseNumber = document.getElementById("HouseNumber").value;

                        if (firstName === "" || lastName === "" || postalCode === "" || streetName === "" || houseNumber === "") {
                            alert("Please fill in all fields before proceeding.");
                        } else {

                            // Display success message
                            alert("Your payment was successful! Thank you for shopping at Fit 'n flavors.");

                            // Redirect to the homepage
                            window.location.href ="../user_homepage.php";
                        }
                     }
                </script>
            
                <style>
                    .content{
                    margin-top: 4%;
                    margin-bottom: 4%;
                    display: flex;
                    align-self: center;
                    align-items: center;
                    justify-content: center;

                    }
                    .payment-box {
                    width: 350px;
                    padding: 20px;
                    background: #cab89d8c;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border: 1px solid #C4AE8C;
                    border-radius: 8px;
                    position: relative;
                    align-items: center;
                    }

                    .payment-text { 
                    padding: 10px;
                    width: 5%;
                    margin-left: 0%;

                    }

                    input[type="text"] {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                    flex-direction: column;
                    margin-bottom: 20px;
                    font-family: Arial, Helvetica, sans-serif;
                    }

                    .content h3 {
                    margin-top: 6%;
                    margin-bottom: 2%;
                    margin-left:3%;
                    }

                    .label {
                    padding: 0%;
                    }

                    .box {
                    margin-top: 1%;
                    margin-bottom: 12%;
                    padding: 2;
                    }

                    .proceedbtn {
                    background-color: #04AA6D;
                    color: white;
                    padding: 14px 20px;
                    margin-top: 10px;
                    border: none;
                    cursor: pointer;
                    width: 100%;
                    border-radius: 4px;
                    opacity: 0.9;
                    transition: 0.3s;
                    }

                    .proceedbtn:hover {
                    opacity: 1;
                    }

                    .label {
                    margin-top: 1%;
                    }
                </style>
        </head>


        <body>

            <div class="content">
            <form class="payment-box" id="PaymentForm" action="PHP BESTAND" method="post" >
                <h1><b>Payment</b></h1>
        
                <!-- Filling in Name: Firstname and Lastname -->
                <h3> Name </h3>
                <div class="box">
                <label class="payment-text" for="FirstName">First name</label> <br>
                <input type="text" name ="FirstName" id="FirstName" autofocus placeholder="Enter first name" required/> <br>
        
                <label class="payment-text" for="LastName">Last name</label> <br>
                <input type="text" name="LastName" id="LastName" autofocus placeholder="Enter last name"required/> <br>
                </div>

                <!-- Filling in DeliveryAdress: Postalcode, Streetname, Housenumber -->
                <h3> Delivery Adress </h3>
                <div class="box">
                <label class="payment-text" for="PostalCode">Postal code</label> <br>
                <input type="text" name ="PostalCode" id="PostalCode" autofocus placeholder="Enter postal code" required/> <br>
        
                <label class="payment-text" for="StreetName">Street name</label> <br>
                <input type="text" name="StreetName" id="StreetName" autofocus placeholder="Enter street name"required/> <br>

                <label class="payment-text" for="HouseNumber">House number</label> <br>
                <input type="text" name="HouseNumber" id="HouseNumber" autofocus placeholder="Enter house number"required/> <br>
                </div>

                <!-- Filling in PaymentMethod: IDEAL, Paypal -->
                <h3> Payment Method </h3>
                <div class="box">
                <label for="PaymentMethod">Choose payment method:</label>
                <select id="PaymentMethod" name="PaymentMethod">
                    <option value="IDEAL">IDEAL</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Afterpay">Afterpay</option>
                    <option value="Creditcard">Creditcard</option>
                </select> 
                </div>

                <button id="Proceed" type="Proceed" class="proceedbtn"> Proceed </button>
                
            </form>
            </div>

            <script>
                var productsbtn = document.getElementById('Proceed');
                productsbtn.addEventListener('click', function () {
                    alert("Thanks for ordering at Fit 'n Flavors! Enjoy your proteins!")
                    window.location.href = `../user_homepage.php`;
                });
            </script>

            <?php 
            
            // Check if order ID is provided in the URL
            if (isset($_GET['id'])){
                $OrderID = (int)$_GET['id'];
                
                // Get UserName from current session and then use that to get the userID (IDK of dit nu werkt)
                if(isset($_SESSION['admin'])){
                    $UserName = $_SESSION['admin'];
                } elseif(isset($_SESSION['user'])){
                    $UserName = $_SESSION['user'];
                }

                $UserID = $UserName['UserID'];

                if (isset($_POST['Proceed'])) {
                    // Sanitize en get data from form
                    $FirstName = mysqli_real_escape_string($connection, $_POST['firstname']);
                    $LastName = mysqli_real_escape_string($connection, $_POST['lastname']);
                    $PostalCode = mysqli_real_escape_string($connection, $_POST['PostalCode']);
                    // $StreetName = mysqli_real_escape_string($connection, $_POST['']);
                    $HouseNumber = mysqli_real_escape_string($connection, $_POST['HouseNumber']);

                    // Get current time and date
                    $OrderDate = date("Y-m-d");
                    $PaidDateTime = date("Y-m-d H:i:s");

                    // Adressquery to add data in the adresses table
                    $AdressQuery = "INSERT INTO Adresses (PostalCode, HouseNumber)
                            VALUES ('$PostalCode', '$HouseNumber')";
                    
                    // Execute the Adress query
                    $ResultAdress = mysqli_query($connection, $AdressQuery);
                    
                    // Get AdressID from adress database
                    $AdressID = mysqli_insert_id($connection);

                    // OrdersQuery to add data in the orders table
                    $OrdersQuery = "INSERT INTO Orders (OrderID, UserID, AdresID, OrderDate, PaidDateTime)
                            VALUES ('$OrderID', '$UserID', '$AdresID','$OrderDate', '$PaidDateTime')";

                    
                    // Execute the orders query
                    $ResultOrders = mysqli_query($connection, $OrdersQuery);
                }
            }

            // Sluit de databaseverbinding
            closeConnection($connection);
            ?>
            <?php include '../Navbar_folder/Footer.php'; ?>



        </body>

    </html>