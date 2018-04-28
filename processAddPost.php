
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
<body>
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
	font-family:'Comfortaa', cursive;
	}
.text{
    color:white;
    padding-top: 100px;
	text-align: center;
	font-size: 30px;
	font-family:'Comfortaa', cursive;
}
</style>
<div class = "home">
<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "INSERT INTO `posts`(`Title`, `Post`, `users_ID`) VALUES ('$title','$body','$user_id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br>Success! You have created a new blog post!<br>";
    echo "Click <a href=showAllPosts.php>here</a> to view your posts!<br>"; 
}
else {
    echo "<br>There was a problem " . mysqli_error($conn);
}
?>
</div>
</div>
</body>