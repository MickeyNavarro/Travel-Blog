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
	text-align: center;
	font-size: 30px;
	padding-top: 100px;
	font-family:'Comfortaa', cursive;
	margin: 0;
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
<body>
<h1>Comment Result?</h1>
<?php 
$commentText = $_GET['textComment'];
$recipe = $_GET['recipe'];
$user = $_GET['user'];
$id = $_GET['comment_id'];
$userID = $_SESSION['userid'];
$role = $_SESSION['role'];

echo "user id " . $_SESSION['userid'];
if ($conn && isset($_SESSION['userid']) && $role = "admin") {
    $sql_statement = "UPDATE `comments` SET `Text` = '$commentText', `posts_id` = '$recipe', `users_id` = '$user' WHERE `id` = '$id'";
    ?>
    <body>
    <?php 
    $result = mysqli_query($conn,$sql_statement);
    if ($result) {
        echo "Number of rows affected = " . mysqli_affected_rows($conn);
        echo "<br>Data updated successfully!";
        echo "<br>Click <a href='showCommentsAdmin.php'>here</a> to return";
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