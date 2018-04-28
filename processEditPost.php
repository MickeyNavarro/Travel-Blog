<!-- Gets the editted values of a post from the showEditPostForm.php to edit that post in the database -->

<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

$blogName = $_GET['blogTitle'];
$blogPost = $_GET['blogPost'];
$postid = $_GET['postid'];
$userID = $_SESSION['userid'];
$role = $_SESSION['role'];
?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<style>
body{
    background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_6332.jpg);
    height: 100vh;
	background-size: cover;
	background-position: center;
	color: white;
	font-size: 30px;
	font-family:'Comfortaa', cursive;
}
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
.home{
    color: white;
}
</style>
<body>
<?php

if ($conn && isset($_SESSION['userid']) && $role = "admin") {
    $sql_statement = "UPDATE `posts` SET `Title` = '$blogName', `Post` = '$blogPost' WHERE `ID` = '$postid'";
    
    $result = mysqli_query($conn,$sql_statement);
    if ($result) {
        echo "User ID:" . $_SESSION['userid'];
        echo "<br>Data updated successfully!";
        echo "<br>Click <a href='showPostsAdmin.php'>here</a> to return";
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