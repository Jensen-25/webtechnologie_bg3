<!-- Navigatie bar -->
        <?php
            if (isset($_SESSION['admin'])){
                ?>
                <script src="../Navbar_folder/Navbar_admin.js" defer></script>
        <?php } elseif(isset($_SESSION['user'])){
                ?>
                <script src="../Navbar_folder/Navbar_loggedin.js" defer></script>
        <?php } else {
                ?>
                <script src="../Navbar_folder/navbar.js" defer></script>
        <?php  }
    ?>