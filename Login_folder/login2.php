<?php

include '/var/www/connections/connections.php';

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
        if(mysqli_num_rows($result) > 0) {
            echo "Login successful!";
            
        
        } 
        
        
        
        else {
            echo "Invalid username or password";
        }
    }
}




?>