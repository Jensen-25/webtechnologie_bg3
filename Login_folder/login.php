<?php

session_start();

include '/var/www/connections/connections.php';
$connection = openConnection();
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
            
            if($row['IsAdmin'] == '1'){
                $_SESSION['admin'] = $row['UserName'];
                // !!!voeg redirection locatie toe
                header('location:admin_homepage.php');
                exit();
            }

            if($row['IsAdmin'] == '0'){
                $_SESSION['user'] = $row['UserName'];
                 // !!!voeg redirection locatie toe
                 header('location:user_homepage.php');  
                 exit();
            }
        }         
        else {
            echo "Invalid username or password";
        }
    }
}
// Sluit de databaseverbinding
closeConnection($connection);

?>