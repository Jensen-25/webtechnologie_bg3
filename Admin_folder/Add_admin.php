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
                background-color: #fff; 
                color: #573d28; 
            }
            .table th,
            .table td {
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid #e0d3c3; 
            }
            .table tbody tr {
                transition: background-color 0.3s;
            }
            .table tbody tr:nth-of-type(even) {
                background-color: #f9f9f9; 
            }
            .table tbody tr:hover {
                background-color: #e3dbc9; 
            }
            .table tbody tr:last-of-type {
                border-bottom: 2px solid #e0d3c3; 
            }
            .table tbody tr.active-row {
                font-weight: bold;
                color: #573d28; 
            }
            .table a {
                text-decoration: none;
                color: #573d28; 
            }
            .table a:hover {
                text-decoration: underline;
            }
        </style>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table class="table">
            <thead>
                <tr>
                    <!-- Column names of the display -->
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Admin Status</th>
                    <th>Select User</th>
                        <?php
                            // There has to be more than 0 rows in database 
                            if ($result->num_rows > 0){
                                // Add database table output per user to the displayed table
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["FirstName"]; ?></td>
                                        <td><?php echo $row["LastName"]; ?></td>
                                        <td><?php echo $row["UserName"]; ?></td>
                                        <td><?php echo $row["IsAdmin"]; ?></td>
                                        <!-- Radiobutton to select the user who is to be admin -->
                                        <td><input type="radio" name="selected_user" value="<?php echo $row["UserName"]; ?>"></td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    // Message when zero rows of data are found in the database
                                    echo "<tr><td colspan='4'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    <!-- Submission at the end of the page -->
                    <input type="submit" name="MakeAdmin" value="MakeAdmin">
                    </form>
                    <?php
                        if (isset($_POST['MakeAdmin'])) {
                            $selected_user = isset($_POST['selected_user']) ? $_POST['selected_user'] : '';
                            if (!empty($selected_user)) {
                                $update_user_status = "UPDATE Users 
                                                    SET IsAdmin = CASE 
                                                                    WHEN IsAdmin = 0 THEN 1
                                                                    WHEN IsAdmin = 1 THEN 0
                                                                    ELSE IsAdmin
                                                                END
                                                    WHERE UserName = '$selected_user'";
                                $result = mysqli_query($connection, $update_user_status);

                                if ($result) {
                                    echo '<p class="success-message">User ' . $selected_user . ' is now an admin.</p>';
                                } else {
                                    echo '<p class="error-message">Error updating user status.</p>';
                                }
                            }
                        }
                    }
        closeConnection($connection);
    ?>

        <!-- Footer -->
        <?php include '../Navbar_folder/Footer.php'; ?>
</body>

</html>
