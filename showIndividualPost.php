<!-- Shows a full individual post; includes the ability to rate and comment on the post through the use of processEditComments-->
<!-- Allows shows every comment/rate and the average rating of the post -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">

<meta charset="UTF-8">
<title>Blog Posts</title>
</head>
<style>
body{
	background-image: url(IMG_0325.jpg);
	background-size: cover;
	background-position: center;
	background-attachment: fixed;
    margin: 10px;
    font-family:'Comfortaa', cursive;
}
h2{
    font-size: 60px;
    color: #ffcb58;
    font-family:'Comfortaa', cursive;
}
h3{
    color:white;
    font-size: 30px;
    font-family:'Comfortaa', cursive;
}
p {
    color: white;
	font-size: 15px;
	font-family:'Comfortaa', cursive;
}
.links{
    color: white;
    font-size: 30px;
    font-family:'Comfortaa', cursive;
}
.commentscontainer{ 
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
<div class="home">
<h2>
<?php 
$user_id = $_SESSION['userid'];
$post_id = $_GET['id'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT `ID`, `Title`, `Post`, `users_ID` FROM `posts` WHERE `users_ID` = '$user_id' AND `ID` = '$post_id'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo "<h2>" . $row ["Title"] . "</h2><br>";

?>
</h2>

<div class="links">

<?php
echo $row ["Post"] . "<br>";
$sql_comments = "SELECT * FROM `comments` JOIN `users` ON users.ID = comments.users_ID WHERE `posts_ID` = '$post_id'";
$result_comments = mysqli_query($conn, $sql_comments);

$ratingCount = 0;
$sum = 0;

if ($result_comments) {
    echo "<div class= 'commentscontainer'><p>Comments: <br>";
    while ($row_comments = mysqli_fetch_assoc($result_comments)) {
        echo "<br>" . $row_comments["Text"];
        echo "<br>Rating: " . $row_comments["Rating"];
        echo "<br>-" . $row_comments["Username"] . "<br>";
        $sum = $sum  + $row_comments["Rating"];
        $ratingCount++;
    }
    echo "</div></p>";
}
?>
            <form action = "processComments.php">
            <input type = "hidden" name = "ID" value = "<?php echo $row ["ID"]?>"></input>
            Add new comment(s):<textarea name = "comments" rows = "5" cols = "50"></textarea><br>
            Rating: <select name = "rating">
            <option value = "1">1</option>
            <option value = "2">2</option>
            <option value = "3">3</option>
            <option value = "4">4</option>
            <option value = "5">5</option>
            </select>
            <?php 

            if ($ratingCount == "0") {
                $avg = "N/A";
            }
            else {
                $avg = $sum / $ratingCount;
            }
            
            echo "<br>". "Average Rating: " . round($avg,2);
            ?>
            <br><button type = "submit">Submit</button>
            </form>
</div>
</div>
</body>
</html> 
<?php 
echo "<br><br><br><br>";
?>