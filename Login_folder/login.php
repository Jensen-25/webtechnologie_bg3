<?php
// Start or resume the session
session_start();

// Include the connections file
include '/var/www/connections/connections.php';

// Open the database connection
$conn = openConnection();

// Check for connection errors
if ($conn->connect_error) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);

    // Prepare and execute the query to check if the user exists
    $sql = "SELECT * FROM Users WHERE UserName = ?";
    $prep = $conn->prepare($sql);
    $prep->bind_param("s", $username);
    $prep->execute();
    $result = $prep->get_result();

    // Check if a matching user was found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the entered password against the stored hash
        if (password_verify($password, $user['Password'])) {

            // Set user data in the session
            $_SESSION['UserName'] = $username;
            $conn
            $userid = SELECT UserID FROM Users
            WHERE Username = $username;
            $_SESSION['UserID'] = $userid;

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        // Return failure response to the JavaScript
        echo json_encode(['success' => false]);
    }

    // Close the prepared statement
    $prep->close();
    // Close the database connection
    $conn->close();
}
?>
