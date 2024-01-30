<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

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



