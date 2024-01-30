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


Copy code
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Database</title>

    <style>
        body {
            background-color: #fffff0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        /* Navigatie balk */
        .navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #C4AE8C;
            font-family: Arial, Helvetica, sans-serif;
            position: sticky;
            top: 0;
            width: 100%;
        }

        .navbar li {
            float: left;
        }

        .navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #D9C7AA;
        }

        h1 {
            text-align: center;
            margin-top: 5%;
            color: black;
            font-size: 300%;
        }

        h2 {
            text-align: center;
            margin-top: 0%;
            color: black;
            font-size: 100%;
        }

        /* User Database Styling */
        .user-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px;
        }

        .user-card {
            background-color: #D9C7AA;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            width: 300px;
        }

        p.user-info {
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 90%;
            margin-bottom: 10px;
        }

        /* Footer */
        div.footer {
            position: static;
            left: 0;
            bottom: auto;
            width: 100%;
            height: 330px;
            margin-bottom: 1px;
            margin-left: 0%;
            margin-right: 0%;
            background-color: #C4AE8C;
            color: white;
            text-align: center;
        }

        div.row {
            display: flex;
        }

        div.column {
            flex: 25%;
            text-align: center;
            margin-top: 2.5%;
            margin-bottom: 2%;
        }

        h3.footer {
            margin-top: 3%;
            margin-bottom: 5%;
            font-size: 120%;
            color: white;
        }

        p.footer {
            margin-top: 2%;
            color: white;
        }

        a.footer {
            margin-right: 2%;
            margin-left: 2%;
        }

        p.footer {
            color: white;
            font-size: 100%;
        }
    </style>
</head>

<body>

    <ul class="navbar">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
    </ul>

    <h1>User Database</h1>

    <div class="user-container">
        <!-- Sample user card, repeat this block for each user -->
        <div class="user-card">
            <p class="user-info"><strong>First Name:</strong> John</p>
            <p class="user-info"><strong>Last Name:</strong> Doe</p>
            <p class="user-info"><strong>Email:</strong> john.doe@example.com</p>
            <p class="user-info"><strong>Phone Number:</strong> +123456789</p>
            <p class="user-info"><strong>Username:</strong> johndoe</p>
            <p class="user-info"><strong>Password:</strong> *********</p>
            <p class="user-info"><strong>Is Admin:</strong> Yes</p>
        </div>

        <!-- Repeat the user card block for each user in the database -->
    </div>

    <div class="footer">
        <div class="row">
            <div class="column">
                <h3 class="footer">Footer Section 1</h3>
                <p class="footer">Some text here</p>
            </div>
            <div class="column">
                <h3 class="footer">Footer Section 2</h3>
                <p class="footer">Some text here</p>
            </div>
            <div class="column">
                <h3 class="footer">Footer Section 3</h3>
                <p class="footer">Some text here</p>
            </div>
            <div class="column">
                <h3 class="footer">Footer Section 4</h3>
                <p class="footer">Some text here</p>
            </div>
        </div>
    </div>

</body>

</html>

