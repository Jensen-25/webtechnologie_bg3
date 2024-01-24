<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('/var/www/connections/connections.php');

    if (isset($_POST['submit'])) {
    $connection = openConnection();
    // Ontvang gegevens van het formulier:
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $postalcode = $_POST['postalcode'];
    $housenumber = $_POST['housenumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_2 = $_POST['password_2'];

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

    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Entries added!";
    }
    closeConnection($connection);  
} 
?>
