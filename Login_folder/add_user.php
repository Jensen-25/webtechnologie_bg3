<?php

// Include het bestand met databaseconnectiefuncties
include '/var/www/connections/connections.php';
$connection = openConnection();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if reCAPTCHA-response is set
    if (isset($_POST['g-recaptcha-response'])) {
        // Get reCAPTCHA-response from form
        $recaptchaResponse = $_POST['g-recaptcha-response'];

        // Verify reCAPTCHA-response with API
        $secretKey = '6LfkU2IpAAAAAIU6SiQEgYxV-RbeBXNvza0PLzaG';
        $verificationUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}";

        $recaptchaData = file_get_contents($verificationUrl);
        $recaptchaResult = json_decode($recaptchaData);

        // Check if verification has succeeded
        if ($recaptchaResult->success) {
            echo "Verification succeeded!";
        } else {
            echo "Verification failed. Try again.";
        }
    } else {
        echo "Please submit registration form.";
    }

// Functie om te controleren of een gebruiker al in de database bestaat op basis van het e-mailadres
function userExists($connection, $email) {
    $email = mysqli_real_escape_string($connection, $email);
    $sql = "SELECT * FROM Users WHERE Email = '$email'";
    $result = mysqli_query($connection, $sql);
    return mysqli_num_rows($result) > 0;
}

if (isset($_POST['submit'])) {
    // Sanitize en haal gegevens op uit het formulier
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($connection, $_POST['phonenumber']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];
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

    // Controleer of de gebruiker al bestaat
    if (userExists($connection, $email)) {
        die("Error: This user already exists in the database.");
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
        
        // Redirect to the user homepage
        header('location:Login_screen.php');  
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    
}

// Sluit de databaseverbinding
closeConnection($connection);
?>