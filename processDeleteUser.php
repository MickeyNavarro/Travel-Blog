<!-- Gets the value of the user ID from the showUserAdmin.php to delete that user from the database -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Deleted Blog User</title>
</head>
<style>
body{
    background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(20170605_105312.jpg);
    height: 100vh;
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
<?php
session_start();
require_once 'connector_blog.php';
require_once 'showMenu.php';
?>

<h2>Deleted User</h2>
<p>Click <a href=showUserAdmin.php>here</a> to go back to admin page </p>
<?php
$userToDelete = $_GET['id'];


$user_role = $_SESSION['role'];

if ($conn)
{
    $sql = "DELETE FROM `users` WHERE `users`.`ID` = '$userToDelete'";
    $result = mysqli_query($conn, $sql);
    if ($result && isset($_SESSION['userid']) && $role = "admin")
    {
        echo "User deleted: " . $userToDelete . "<br>";
    }
    else 
    {
        echo "<br>There was a problem " . mysqli_error($conn);
    }
}
else {
    echo "ERROR" . mysqli_connect_error();
    exit;
}
mysqli_close($conn);
?>

</body>
</html>