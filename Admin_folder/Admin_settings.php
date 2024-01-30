<?php 

include '/var/www/connections/connections.php';

// Initialize the session
session_start();

$connection = openConnection();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['admin']) && $_SESSION['admin'] !== true) {
    header("location: ../user_homepage.php/");
    exit;
} else{

    // extract table users from database
    $user_data = "SELECT * FROM Users";

    // execute the query
    $result = mysqli_query($connection, $user_data);

    if ($result->num_rows > 0){
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p>First Name: " . $row["FirstName"] . "<br>
            Last Name: " . $row["LastName"] . "<br>
            Email: " . $row["Email"] . "<br>
            Phone Number: " . $row["Phonenumber"] . "<br>
            Username: " . $row["UserName"] . "<br>
            Password: " . $row["Password"] . "<br>
            Is Admin: " . $row["IsAdmin"] . "</p>";
        }
    }
}

?>

