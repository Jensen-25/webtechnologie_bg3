<?php

include '/var/www/connections/connections.php';

if (isset($_POST['submit'])) {
    $connection = openConnection();

    // Sanitize and retrieve data from the form
    $firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstname']));
    $lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastname']));
    $email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
    $phonenumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['phonenumber']));
    $postalcode = mysqli_real_escape_string($connection, htmlspecialchars($_POST['postalcode']));
    $housenumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['housenumber']));
    $username = mysqli_real_escape_string($connection, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
    $password_2 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password_2']));

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

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($connection, "INSERT INTO Users (FirstName, LastName, Email, Phonenumber, UserName, Password) VALUES (?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $phonenumber,  $username, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);

    closeConnection($connection);
}
?>