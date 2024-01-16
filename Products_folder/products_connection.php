<html>
<?php
$servername = "localhost";
$username = "jensenv";
$password = "TUGwjmIHJIOUVFtiwKUHWwYxFrGJVfqs";
$database = "Product_information";

// Create connection
$connection = new mysqli($servername, $username, $password);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"
?>
</html>