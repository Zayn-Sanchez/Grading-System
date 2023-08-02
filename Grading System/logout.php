<?php 
//Start a new or resume existing session
session_start();

//Unset all session variables
session_unset();

//Destroy the session
session_destroy();

//Redirect to the index page
header("Location: index.php");
?>
