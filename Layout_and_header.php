<!DOCTYPE html>
<html>
    <head>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        <!-- Navigatie bar -->
        <?php
            if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                ?>
                <script src="../Navbar_folder/Navbar_loggedin.js" defer></script>
        <?php } else {
                ?>
                <script src="../Navbar_folder/navbar.js" defer></script>
        <?php  }
        ?>  