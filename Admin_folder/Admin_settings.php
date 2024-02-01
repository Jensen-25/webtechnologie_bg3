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

        <style>
        .button {
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        margin-top: 8%;
        }

        .button1 {
        background-color: #C4AE8C; 
        color: black; 
        border: 2px solid #C4AE8C;
        }

        .button1:hover {
        background-color: #D9C7AA;
        color: white;
        }

        .admin_links {
        margin-top: 5%;
        margin-bottom: 5%;
        justify-content: center;
        display: flex;
        }
        </style>
</head>

<body>
<div class="admin-panel">
    <h1>Welcome to the Fit 'n Flavors Admin Panel</h1>
    
    <div class="admin-links">
        <a class="button button1" href="../Admin_folder/Add_admin.php">Manage Admins</a>
        <!-- Add more links as needed -->
    </div>
</div>

<?php include '../Navbar_folder/Footer.php'; ?>
</body>
