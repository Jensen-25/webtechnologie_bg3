<?php

    include('connections/connections.php');
    // Ontvang gegevens van het formulier
    $firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstname']));
    $lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastname']));
    $email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
    $phonenumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['phonenumber']));
    $username = mysqli_real_escape_string($connection, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
    $password_2 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password_2']));

    // Controleer of de wachtwoorden overeenkomen
    if ($password !== $password_2) {
        die("Error: Passwords do not match.");
    }

    // Controleer of elk veld is ingevuld
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) ||
        empty($username) || empty($password) || empty($password_2)) {
        die("Error: All fields are required.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL-query voor het invoegen van gegevens
    $sql = "INSERT INTO Users (FirstName, LastName, Email, Phonenumber, UserName, Password)
            VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$username', '$hashed_password')";

?>
