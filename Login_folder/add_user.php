<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the file with database connection functions
include '/var/www/connections/connections.php';

if (isset($_POST['submit'])) {
    $connection = openConnection();

    // Sanitize and retrieve data from the form
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($connection, $_POST['phonenumber']);
    $postalcode = mysqli_real_escape_string($connection, $_POST['postalcode']);
    $housenumber = mysqli_real_escape_string($connection, $_POST['housenumber']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

    // Check if passwords match
    if ($password !== $password_2) {
        die("Error: Passwords do not match.");
    }

    // Check if required fields are not empty
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) ||
        empty($username) || empty($password) || empty($password_2)) {
        die("Error: All fields are required.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into the Users table
    $sql = "INSERT INTO Users (FirstName, LastName, Email, Phonenumber, PostalCode, HouseNumber, UserName, Password)
            VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$postalcode', '$housenumber', '$username', '$hashed_password')";

    $sql -> execute()

    $rs = mysqli_query($connection, $sql);

    if ($rs) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    closeConnection($connection);
}
?>