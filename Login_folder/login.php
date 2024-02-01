<?php

session_start();

include '/var/www/connections/connections.php';

$connection = openConnection();

// Redirect to homepage if a user/admin already logged in (according to coockies).
if(isset($_SESSION['admin'])){
    header('location:../user_homepage.php');
    exit();
} elseif(isset($_SESSION['user'])){
    header('location:../user_homepage.php');
    exit();
}

// form has to be submitted before executation
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Get variables from the database
    $login_data = "SELECT * FROM Users WHERE 
    UserName = '$username' && Password = '$password' ";

    // execute the query
    $result = mysqli_query($connection, $login_data);

    // Check whether login went succesfully
    if ($result) {
        if($row = mysqli_fetch_assoc($result)) {
            echo "Login successful!";
            
            // is an admin
            if($row['IsAdmin'] == '1'){
                $_SESSION['admin'] = $row['UserName'];

                // set cookie for username and password if remember me chosen
                if (isset($_POST['remember'])){
                    setcookie("user", $row['UserName'], time() + (86400 * 30));
                }
                // Redirect to the admin homepage
                header('location:../user_homepage.php');
                exit();
            }

            // set cookie for username and password if remember me chosen
            if($row['IsAdmin'] == '0'){
                $_SESSION['user'] = $row['UserName'];

                // set cookie for username and password 
                if (isset($_POST['remember'])){
                    setcookie("user", $row['UserName'], time() + (86400 * 30));
                    setcookie("pass", $row['Password'], time() + (86400 * 30));
                }

                 // Redirect to the user homepage
                 
            }
            // go to the homepage if logged in 
            header('location:../user_homepage.php');  
            exit();
        }         
        else {
            echo "Invalid username or password";
        }
    }
}
// Sluit de databaseverbinding
closeConnection($connection);

?>
