<?php 
//Begin the session
session_start();

//Include connection to the database
include "connection.php";

//Function to sanitise user input to prevent XSS attacks
function sanitiseInput($input) {
    //Remove leading/trailing white spaces
    $input = trim($input);
    //Remove backslashes
    $input = stripslashes($input);
    //Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    //Return the sanitised input
    return $input;
}

//Function to verify hashed password using PHP built-in password_verify function
function verifyPassword($enteredPassword, $storedHashedPassword) {
    return password_verify($enteredPassword, $storedHashedPassword);
}

//Function to redirect the user to a different page
function redirectTo($location) {
    header("Location: $location");
    exit();
}

//Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Sanitise user inputs
    $username = sanitiseInput($_POST["student_id"]);
    $password = sanitiseInput($_POST["password"]);

    //Prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    //Retrieve stored hashed password from the database for the entered username
    $sql = "SELECT password_hash FROM login_details WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedHashedPassword);
    $stmt->fetch();
    $stmt->close();

    //Verify the entered password against the stored hashed password
    if ($storedHashedPassword && verifyPassword($password, $storedHashedPassword)) {
        //Passwords match, login successful
        redirectTo("dashboard.php"); //Redirect after successful login
    } else {
        //Passwords don't match, login failed
        header("Location: index.php?error=Incorrect User name or password");
    }
}
?>
