<?php

// Include het bestand met databaseconnectiefuncties
include '/var/www/connections/connections.php';
$connection = openConnection();
if (isset($_POST['submit'])) {
    // Sanitize en haal gegevens op uit het formulier
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($connection, $_POST['phonenumber']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

    // Controleer of de wachtwoorden overeenkomen
    if ($password !== $password_2) {
        die("Error: Passwords do not match.");
    }

    // Controleer of vereiste velden niet leeg zijn
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) ||
        empty($username) || empty($password) || empty($password_2)) {
        die("Error: All fields are required.");
    }

    // Hash het wachtwoord
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL-query om gegevens in de Users-tabel in te voegen
    $sql = "INSERT INTO Users (FirstName, LastName, Email, Phonenumber, UserName, Password, IsAdmin)
            VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$username', '$hashed_password', '0')";

    // Voer de query uit
    $resultaat = mysqli_query($connection, $sql);

    if ($resultaat) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Sluit de databaseverbinding
closeConnection($connection);
?>