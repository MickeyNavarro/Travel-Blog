<!-- Gets all the posts from the database and outputs them -->
<!-- Ouputs them as links to the individual posts-->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Blog Posts</title>
</head>
<style>
a:link{
    color: white;
}
a:visited{
    color: #DAB3FF;
}
a:hover{
    color: silver;
}
a:active{
    color: black;
}
h2{
    font-size: 60px;
    color: #ffcb58;
    font-family:'Comfortaa', cursive;
}
body {
	background-image: url(IMG_0325.jpg);
    background-size: 100%; 
 	background-repeat: no-repeat;
	background-attachment: fixed;
	font-size: 30px;
	padding-left: 20px;
	font-family:'Comfortaa', cursive;
}
.postscontainer{ 
	border: 1px solid black; 
  	border-radius: 5px; 
  	margin: 10px; 
  	padding: 10px; 
  	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3));
  	font-family:'Comfortaa', cursive;
}
</style>
<body>
<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<div class="post">
<h2>Blog Posts</h2>
<div class="links">
<?php 
$user_id = $_SESSION['userid'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT `ID`, `Title`, `Post`, `users_ID` FROM `posts` WHERE `users_ID` = '$user_id'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class = 'postscontainer'>";
    echo '<a href="showIndividualPost.php?id='.$row["ID"].'">'.$row ["Title"].'</a>';
            echo "</div>";
        } 
        
        echo "<br><br>";
?>

</div>
</div>

</body>
</html>
