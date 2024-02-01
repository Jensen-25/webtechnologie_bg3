<?php

session_start();

include '/var/www/connections/connections.php';

$connection = openConnection();

// Redirect to homepage if a user/admin already logged in (according to coockies).
if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    header('location:../user_homepage.php');
    exit();
}

// form has to be submitted before executation
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Get variables from the database
    $login_query = "SELECT * FROM Users WHERE UserName = '$username'";

    // execute the query
    $result = mysqli_query($connection, $login_query);

    // Perform the correct login depending on the user data
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Verify the users password
        if($row && password_verify($password, $row['Password'])) {
            session_regenerate_id(true);
            
            // is an admin
            if($row['IsAdmin'] == '1'){
                $_SESSION['admin'] = $row['UserName'];

                // set cookie for username and password if remember me chosen
                if (isset($_POST['remember'])){
                    setcookie("user", $row['UserName'], time() + (86400 * 30));
                 }
                //Redirect to the admin homepage
                header('location:../user_homepage.php');
                 exit();
            }

            // set cookie for username and password if remember me chosen
            if($row['IsAdmin'] == '0'){
                $_SESSION['user'] = $row['UserName'];

                // set cookie for username and password 
                if (isset($_POST['remember'])){
                    setcookie("user", $row['UserName'], time() + (86400 * 30));
                    
                }
                 // Redirect to the user homepage
                 header('location:../user_homepage.php');
                 exit();
            }
            }
            // Return Succes if succesfull
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
            exit();
        }         
        else {
            // Return a JSON response indicating unsuccessful login
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
            exit();
        }
    }
// Sluit de databaseverbinding
closeConnection($connection);

?>
