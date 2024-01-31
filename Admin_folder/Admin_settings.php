<?php
// PHP script to extract user data from the database
include '/var/www/connections/connections.php';
session_start();
$connection = openConnection();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['admin']) && $_SESSION['admin'] !== true) {
    header("location: ../user_homepage.php/");
    exit;
} 

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        <!-- Navigatie bar -->
        <?php include '../Navbar_folder/Navbar_link.php'; ?>
</head>

<body>
<div class="admin-panel">
    <h1>Welcome to the Fit 'n Flavors Admin Panel</h1>
    
    <div class="admin-links">
        <a href="../Admin_folder/Add_admin.php">Manage Admins</a>
        <a href="../Admin_folder/Add_products.php">Manage Products</a>
        <!-- Add more links as needed -->
    </div>
</div>

<?php include '../Navbar_folder/Footer.php'; ?>
</body>
