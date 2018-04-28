<!-- Gets the editted values of a comment from the showEditComment.php to edit that comment in the database -->
<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<style>
body{
	background-image: url(20170605_124524.jpg);
	background-size: cover;
	background-position: center;
	color: white;
	font-size: 20px;
	padding-top: 15px;
	padding-left: 25px;
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

</style>
<?php 
$commentText = $_GET['textComment'];
$recipe = $_GET['recipe'];
$user = $_GET['user'];
$id = $_GET['comment_id'];
$userID = $_SESSION['userid'];
$role = $_SESSION['role'];

echo "user id " . $_SESSION['userid'];
if ($conn && isset($_SESSION['userid']) && $role = "admin") {
    $sql_statement = "UPDATE `comments` SET `comment_text` = '$commentText', `posts_id` = '$recipe', `users_id` = '$user' WHERE `id` = '$id'";
    ?>
    <body>
    <?php 
    $result = mysqli_query($conn,$sql_statement);
    if ($result) {
        echo "number of rows affected = " . mysqli_affected_rows($conn);
        echo "<br>Data updated successfully!";
        echo "<br>Click <a href='showSearch.php'>here</a> to return";
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