
<!-- Adding post is processed and added into the database. Outputs whether the new post has been added or not to the database. -->

<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

$title = $_GET['postTitle'];
$body = $_GET['postBody'];
$user_id = $_SESSION['userid'];
?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
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
body{
background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_2336.jpg);
	background-size: cover;
	background-position: center;
	color: white;
	text-align: center;
	font-size: 30px;
	padding-top: 100px;
	font-family:'Comfortaa', cursive;
	}
</style>
<body>
<div class = "home">
<h1>Post Result?</h1>

<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `posts`(`Title`, `Post`, `users_ID`) VALUES ('$title','$body','$user_id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Success! You have created a new blog post!<br>";
    echo "Click <a href=showAllPosts.php>here</a> to view your posts!<br>"; 
}
else {
    echo "<br>There was a problem " . mysqli_error($conn);
}
?>
</div>
</div>
</body>