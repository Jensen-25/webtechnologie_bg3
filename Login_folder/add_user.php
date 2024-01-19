<?php
// voor verbinden 
include('/var/www/connections/connections.php')

$firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstname']));
$lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['phonenumber']));
$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
$phonenumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['phonenumber']));
$username = mysqli_real_escape_string($connection, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));
$postalcode = mysqli_real_escape_string($connection, htmlspecialchars($_POST['postalcode']));
$housenumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['housenumber']));

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


try {
$sql = "INSERT INTO Users (FirstName, LastName, Email, Phonenumber, UserName, Password) Values 
('$firstname', '$lastname', '$email ' , '$phonenumber', '$username', '$hashed_password') ";
mysqli_query($connection, $sql);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}







?>