<!-- Gets the editted values of a user from the showEditUserForm.php to edit that user in the database -->

<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

$id = $_GET['id'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$user = $_GET['user'];
$pass = $_GET['pass'];
$role = $_GET['role'];

$userID = $_SESSION['userid'];
$role = $_SESSION['role'];

if ($conn && isset($_SESSION['userid']) && $_SESSION['role'] == "admin") {
    $sql = "UPDATE `users` SET `Full Name` = '$name', `Phone Number` = '$phone', `Username` = '$user', `Password` = '$pass', `Role` = '$role' WHERE `users`.`ID` = '$id'";
    
    
    ?>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
    <style>
    body{
     background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(20170605_105312.jpg);
    height: 100vh;
	background-size: cover;
	background-position: center;
	color: white;
	text-align: center;
	font-size: 30px;
	padding-top: 100px;
	font-family:'Comfortaa', cursive;
	margin: 0;
    }
    </style>
    <body>
    <h1>Editted User</h1>
    <?php 
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "number of rows affected = " . mysqli_affected_rows($conn);
        echo "<br>Data updated successfully!";
        echo "<br>Click <a href='showUserAdmin.php'>here</a> to return";
    }
    else {
        echo "Error in the sql " . mysqli_error($conn);
    }
}
else {
    echo "Error connecting " . mysqli_connect_error();
}
?>
</body>