<!-- Destroys the session variable to logout the user -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Logout</title>
</head>
<style>
body { 
    font-family:'Comfortaa', cursive;
}
</style>
<body>


<?php
// This module should logout the user.  Unset any $_SESSION variables, destroy the session.
session_start();
require_once 'showLogin.html';

$_SESSION = array();

session_destroy();
?>



</body>
</html>