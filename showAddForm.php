<!-- creates a form for the user to create a new post -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Add a blog post</title>
</head>
<div class="post">
<style>
.add{
background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_2336.jpg);
	height: 85vh;
	background-size: cover;
	background-position: center;
	color: white;
	text-align: center;
	font-size: 30px;
	padding-top: 100px;
	font-family:'Comfortaa', cursive;
	}
</style>
</div>
<body>
<?php 
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<div class="add">
<h2>Add a blog post</h2>
<p>Fill out all of the fields and submit</p>
<form action="processAddPost.php">
    Post Title:<br><textarea class="box" rows="2" cols="40" name="postTitle"></textarea><br>
    Post Body:<br><textarea class="box" rows="10" cols="100" name="postBody"></textarea><br>
    <button type="Submit">Post!</button>
</form>


</body>
</div>
</html>