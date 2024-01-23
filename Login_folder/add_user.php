<?php
// voor verbinden 
    include('/var/www/connections/connections.php');

    if (isset($_POST['submit']))
    {
        $firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstname']));
        $lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastname']));
        $email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
        $phonenumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['phonenumber']));
        $username = mysqli_real_escape_string($connection, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
        $password_2 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password_2']));
        $postalcode = mysqli_real_escape_string($connection, htmlspecialchars($_POST['postalcode']));
        $housenumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['housenumber']));
    }
    // both passwords have to corresponds
    if ($_POST['passsword'] != $_POST['password_2']) {
        echo 'Passwords are not the same';
    }
    // every field should be filled in 
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || 
        empty($username) || empty($password) || empty($password_2) || empty($postalcode) || empty($housenumber)) {
        die("Error: All fields are required.");
    }




try {

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Users (id, FirstName, LastName, Email, Phonenumber, UserName, Password) Values 
    ('0', $firstname', '$lastname', '$email ' , '$phonenumber', '$username', '$hashed_password') ";
    mysqli_query($connection, $sql);
} 
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}








?>