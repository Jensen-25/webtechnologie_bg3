<?php

session_start();

include '/var/www/connections/connections.php';

$connection = openConnection();

// Redirect to homepage if a user/admin already logged in (according to cookies).
if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    header('location:../user_homepage.php');
    exit();
}

// Form has to be submitted before execution
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Get variables from the database
    $login_query = "SELECT * FROM Users WHERE UserName = '$username'";

    // Execute the query
    $result = mysqli_query($connection, $login_query);

    // Perform the correct login depending on the user data
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Verify the user's password
        if ($row && password_verify($password, $row['Password'])) {
            session_regenerate_id(true);

            // Set cookie for username and password if remember me chosen
            if (isset($_POST['remember'])) {
                setcookie("user", $row['UserName'], time() + (86400 * 30));
            }

            // Set the session variable based on user type (admin or user)
            if ($row['IsAdmin'] == '1') {
                $_SESSION['admin'] = $row['UserName'];
            } elseif ($row['IsAdmin'] == '0') {
                $_SESSION['user'] = $row['UserName'];
            }
        }
    }
}

// Close the database connection
closeConnection($connection);

// Redirect to the homepage
header('location:../user_homepage.php');
exit();

?>
