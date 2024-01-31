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
        <?php
            if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                ?>
                <script src="../Navbar_folder/Navbar_loggedin.js" defer></script>
        <?php } else {
                ?>
                <script src="../Navbar_folder/navbar.js" defer></script>
        <?php  }
    ?>
    </head>

<body>
    <!-- Invoer van de inloggegevens -->
    <hr>

    <form class="login-box" id="loginForm" action="login.php" method="post" >
        <h1><b>LOGIN</b></h1>
        <!-- Filling in Username and Password -->
        <label class="login-text" for="username"><b>Username</b></label> <br>
        <input type="text" name ="username" id="username" autofocus placeholder="Enter username" required 
         value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>"/> <br>

        <label class="login-text" for="password"><b>Password</b></label> <br>
        <input type="password" name="password" id="password" autofocus placeholder="Enter password"required
        value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>"/> <br>

        <input type="checkbox" name="remember"<?php if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ echo "checked";}?>> Remember me <br><br>

        <button type="submit" name="submit" class="registerbtn" onclick="submitForm()"> Login </button>
    </form>

    <script>
        function submitForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/index.html'; // Redirect to dashboard on success
                } else {
                    document.getElementById('errorMessage').innerText = 'Invalid credentials';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
