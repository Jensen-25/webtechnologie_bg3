<?php
include '/var/www/connections/connections.php';
$connection = openConnection();


// Initialisatie van de foutmeldingsvariabele
$error_message = "";

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
            // Verification succeeded, proceed with user registration
            handleUserRegistration();
        } else {
            // Verification failed, display an error message or redirect to registration page
            header('location: registratiescherm.php?error=recaptcha');  
            exit();
        }
    } else {
        // reCAPTCHA-response is not set, display an error message or redirect to registration page
        die("Error: Please submit the registration form.");
    }
}

// Function to handle user registration
function handleUserRegistration() {
    global $connection;

    // Function to check if a user already exists
    function userExists($email) {
        global $connection;
        $email = mysqli_real_escape_string($connection, $email);
        $sql = "SELECT * FROM Users WHERE Email = '$email'";
        $result = mysqli_query($connection, $sql);
        return mysqli_num_rows($result) > 0;
    }

    if (isset($_POST['submit'])) {
        // Sanitize and retrieve data from the form
        $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $phonenumber = mysqli_real_escape_string($connection, $_POST['phonenumber']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = $_POST['password'];
        $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

        // Check if the user already exists
        if (userExists($email)) {
            die("Error: This user already exists in the database.");
        }

        // Check if required info has been provided
        if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) ||
        empty($username) || empty($password) || empty($password_2)) {
            die("Error: All fields are required.");
            }

        // Check if the passwords match
        if ($password !== $password_2) {
            die("Error: Passwords do not match.");
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert data into the Users table
        $sql = "INSERT INTO Users (FirstName, LastName, Email, Phonenumber, UserName, Password, IsAdmin)
                VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$username', '$hashed_password', '0')";

        // Execute the query
        $result = mysqli_query($connection, $sql);

        if ($result) {
            echo "Registration successful!";
            
            // Redirect to the user homepage
            header('location: Login_screen.php');  
            exit();
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}

// Close the database connection
closeConnection($connection);
?>
