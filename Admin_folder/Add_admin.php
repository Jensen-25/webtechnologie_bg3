<?php
// PHP script to extract user data from the database
include '/var/www/connections/connections.php';
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

    
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        <!-- Navigatie bar -->
        <?php include '../Navbar_folder/Navbar_link.php'; ?>
        <style>
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 1em;
        font-family: 'Arial', sans-serif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .table thead {
        background-color: #fff; /* White background */
        color: #573d28; /* Brown text color */
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e0d3c3; /* Beige border color */
    }

    .table tbody tr {
        transition: background-color 0.3s;
    }

    .table tbody tr:nth-of-type(even) {
        background-color: #f9f9f9; /* Light beige background for even rows */
    }

    .table tbody tr:hover {
        background-color: #e3dbc9; /* Light brown background for hover effect */
    }

    .table tbody tr:last-of-type {
        border-bottom: 2px solid #e0d3c3; /* Beige border color for the last row */
    }

    .table tbody tr.active-row {
        font-weight: bold;
        color: #573d28; /* Brown text color for active row */
    }

    .table a {
        text-decoration: none;
        color: #573d28; /* Brown link color */
    }

    .table a:hover {
        text-decoration: underline;
    }
</style>
</head>

<body>
    <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Admin</th>
                        <?php 
                            if ($result->num_rows > 0){
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["FirstName"]; ?></td>
                                        <td><?php echo $row["LastName"]; ?></td>
                                        <td><?php echo $row["UserName"]; ?></td>
                                        <td><?php echo $row["IsAdmin"]; ?></td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                
                    closeConnection($connection);
                    ?>

        <!-- Footer -->
        <div class="footer"> 
            <div class="row">
            <div class="column">
                <h3 class="footer">About Fit 'n Flavors</h3>
                <p class="footer"> <a href="../About_us_folder/About_us.html">About us</a></p>
                <p class="footer"> <a href="../About_us_folder/Terms_and_conditions.html">Terms & Conditions</a></p>
            </div>

            <div class="column">
                <h3 class="footer">Costumerservice</h3>
                <p class="footer"><a href="../FAQ/FAQ.html">FAQ</a></p>
                <p class="footer"><a href="../FAQ/Delivery.html">Delivery information</a></p>
                <p class="footer"><a href="../FAQ/Returns.html">Returns and refund policy</a></p>
                <p class="footer"><a href="../FAQ/Contact.html">Contact</a></p>
            </div>
            
            <div class="column">
                <h3 class="footer">Follow us!</h3>
                <p class="footer"><a class="footer" href="http://www.instagram.com/" ><i class="fa fa-instagram" style="font-size:24px"></i></a>
                    <a class="footer" href="https://www.facebook.com" ><i class="fa fa-facebook" style="font-size:24px"></i></a>
                    <a class="footer" href="https://www.linkedin.com" ><i class="fa fa-linkedin" style="font-size:24px"></i></a>
                </p>
            </div>
            </div>
        </div>
</body>

</html>
