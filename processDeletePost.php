<!-- Gets the value of the post ID from the showPostsAdmin.php to delete that post from the database -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Deleted Blog Post</title>
</head>
<style>
body{
background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_6332.jpg);
    height: 100vh;
	background-size: cover;
	background-position: center;
	color: white;
	font-family:'Comfortaa', cursive;
}
</style>
<body>
<div class="home">
<h2>Deleted Blog Posts</h2>
<p>Click <a href=showPostsAdmin.php>here</a> to go back to admin page </p>
<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

$itemToDelete = $_GET['postid'];

$sql_statement = "DELETE FROM `posts` WHERE `posts`.`id` = '$itemToDelete'";

if ($conn) {
    $result = mysqli_query($conn, $sql_statement);
        if ($result) {
        echo "Deleted Post # " . $itemToDelete . "<br>";
        } else {
            echo "Error with the SQL " . mysqli_error($conn);
        }
} else {
    echo "Error connecting " . mysqli_connect_error();
}
?>
</div>
            