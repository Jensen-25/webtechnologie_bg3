<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Database</title>

     <!-- Link naar de CSS sheet -->
     <link rel="stylesheet" href="Homepage_stylesheet.css">

    <!-- Link voor icoontjes footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Homepage User </title>
            
    <!-- Navigatie bar -->
    <script src="../FAQ/Navbar.js" defer></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
            width: 10%; /* Set a specific width for all cells */
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

<body>
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
            echo "<table>";
            echo "<tr>
                <td>" . $row["FirstName"] . "</td>
                <td>" . $row["LastName"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Phonenumber"] . "</td>
                <td>" . $row["UserName"] . "</td>
                <td>*****</td>
                <td>" . $row["IsAdmin"] . "</td>
              </tr>";
        }
    }
}
closeConnection($connection);

?>

</body>

</html>



