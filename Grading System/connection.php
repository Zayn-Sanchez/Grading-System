<?php
//Define the server name
$sname = "localhost";

//Define the username for the database
$unmae = "root";

//Define the password for the database
$password = "";

//Define the database name
$db_name = "mylogin";

//Attempt to establish a connection to the database
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

//If the connection was not successful, output a failure message
if (!$conn) {
    echo "Connection failed!";
}
?>
