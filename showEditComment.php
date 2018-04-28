<!-- creates a form for the user to edit a comment -->
<!-- allows for processEditComment.php to get the values from the form -->

<?php
session_start();
require_once 'showMenu.php';
$id = $_GET['comment_id'];

require_once 'connector_blog.php';

if ($conn) {
    $sql_statement = "SELECT * FROM `comments` WHERE `comments`.`id` = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $commentText = $row['Text'];
            $recipe = $row['posts_ID'];
            $user = $row['users_ID'];
            
        }
    } else {
        echo "there was a sql problem " . mysqli_error($conn);
    }
}else {
    echo "error connecting " . mysqli_connect_error();
}
?>
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
</style>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<body>
<div class="edit">
<h2>Edit a comment</h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditComment.php">
<input type = "hidden" name = "comment_id" value = "<?php echo $id; ?>"></input>
Comment Text:<input type="text" name="textComment" value = "<?php  echo $commentText; ?>"></input><br>
Recipe ID:<input type="text" name="recipe" value = "<?php echo $recipe;?>"></input><br>
User ID:<input type= "text" name="user" value = "<?php echo $user; ?>"></input><br>
<button type="submit">Submit Changes</button>
</form>
</div>
</body>