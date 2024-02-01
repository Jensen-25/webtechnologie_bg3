<?php
// PHP script to extract user data from the database
include '/var/www/connections/connections.php';
session_start();
$connection = openConnection();

    // extract table products from database
    $product_data = "SELECT * FROM Products";

    // execute the query
    $result = mysqli_query($connection, $product_data);

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
    <h2> This page can be used to manage the products' stock</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table class="table">
            <thead>
                <tr>
                    <!-- Column names of the display -->
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th>Product Image</th>
                    <th>Protein Amount</th>
                    <th>Product Stock</th>
                    <th>Adjust Stock</th>
                        <?php
                            // There has to be more than 0 rows in database 
                            if ($result->num_rows > 0){
                                // Add database table output per user to the displayed table
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["ProductID"]; ?></td>
                                        <td><?php echo $row["ProductName"]; ?></td>
                                        <td><?php echo $row["ProductPrice"]; ?></td>
                                        <td><?php echo $row["ProductDescription"]; ?></td>
                                        <td><?php echo $row["ProductImage"]; ?></td>
                                        <td><?php echo $row["ProteinAmount"]; ?></td>
                                        <td><?php echo $row["ProductStock"]; ?></td>
                                        <!-- Dropdown-menu to update stock -->
                                        <td>
                                            <select name="ChangeStock[<?php echo $row["ProductID"]; ?>]">
                                                <option value="+1">+1</option>
                                                <option value="-1">-1</option>
                                            </select>
                                        </td>
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
                    <input type="submit" name="UpdateStock" value="UpdateStock">
                    </form>
                    <?php
                        if (isset($_POST['UpdateStock'])) {
                            foreach ($_POST['ChangeStock'] as $productID => $change) {
                                $update_product_stock = "UPDATE Products SET ProductStock = ProductStock + $change WHERE ProductID = $productID";
                                $result = mysqli_query($connection, $update_product_stock);

                            if ($result) {
                                echo '<p class="success-message">Product ' . $productID . ' stock is now updated.</p>';
                            } else {
                                echo '<p class="error-message">Error updating product stock.</p>';
                            }
                        }
                    }    

                closeConnection($connection);
                ?>
                
    <!-- Footer -->
    <?php include '../Navbar_folder/Footer.php'; ?>

</body>
</html>