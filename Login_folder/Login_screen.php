<?php

include '/var/www/connections/connections.php';

session_start();
?>

<!-- Cookie -->
<?php include '../cookie.php'; ?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Homepage User </title>


        <style>
                .content {
                margin-top: 5%;
                margin-bottom: 5%;
                display: flex;
                align-self: center;
                align-items: center;
                justify-content: center;
                }

                .login-box {
                width: 300px;
                padding: 20px;
                background: #cab89d8c;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border: 1px solid #C4AE8C;
                border-radius: 8px;
                margin-top: 6%;
                margin-bottom: 8%;
                position: relative;
                align-items: center;
                }


                input[type="text"],
                input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                flex-direction: column;
                margin-bottom: 20px;
                }

                input[type="text"]:focus,
                input[type="password"]:focus {
                border-color: #04AA6D;
                background-color: #f8f8f8;
                }

                input[type="submit"] {
                width: 100%;
                }

                .registerbtn {
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

                .registerbtn:hover {
                opacity: 1;
                }

                hr {
                border: 1px solid #ddd;
                margin-bottom: 20px;
                }

                #regForm {
                background-color: #ffffff;
                margin: 100px auto;
                font-family: Raleway;
                padding: 40px;
                width: 70%;
                min-width: 300px;
                }

                input {
                padding: 10px;
                width: 5%;
                font-size: 12px;
                font-family: Raleway;
                border: 1px solid #aaaaaa;
                }

                /* Mark input boxes that gets an error on validation: */
                input.invalid {
                background-color: #ffdddd;
                } 

                button {
                background-color: #04AA6D;
                color: #ffffff;
                border: none;
                border-radius: 25px;
                padding: 10px 20px;
                font-size: 17px;
                font-family: Raleway;
                cursor: pointer;
                } 

                button:hover {
                opacity: 0.8;
                } 

            </style>
            
        <!-- Navigatie bar -->
        <?php include '../Navbar_folder/Navbar_link.php'; ?>
    </head>

       <body>
            <!-- Content -->
            <div class="content">
                <!-- Invoer van de inloggegevens -->
                <form class="login-box" id="loginForm" action="login.php" method="post" >
                    <h1><b>LOGIN</b></h1>
                    <!-- Filling in Username and Password -->
                    <label class="login-text" for="username"><b>Username</b></label> <br>
                    <input type="text" name ="username" id="username" autofocus placeholder="Enter username" required 
                    value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>"/> <br>

                    <label class="login-text" for="password"><b>Password</b></label> <br>
                    <input type="password" name="password" id="password" autofocus placeholder="Enter password"required> <br>

                    <input type="checkbox" name="remember"<?php if (isset($_COOKIE["user"])){ echo "checked";}?>> Remember username <br><br>

                    <button type="submit" name="submit" class="registerbtn" onclick="submitForm()"> Login </button>
                </form>
            </div>

             <!-- Footer -->
             <?php include '../Navbar_folder/Footer.php'; ?>
             
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
                            alert ('Invalid credentials');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            </script>
        </body>
    </html>