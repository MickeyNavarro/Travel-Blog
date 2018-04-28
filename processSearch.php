 <!-- Gets the values from the showSearch.php to check for similar values in the database -->
 <!-- Outputs the search results, along with the ability to comment and rate posts -->
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Posts Found</title>
</head>
<style>
body{
    background-image:url(IMG_1197.jpg);
    background-size: 100%; 
 	background-repeat: no-repeat;
	background-attachment: fixed;
	color: white;
	font-size: 25px;
	font-family:'Comfortaa', cursive;
}
.post-container { 
	border: 1px solid black; 
  	border-radius: 5px; 
  	margin: 10px; 
  	padding: 10px; 
  	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3));
  	font-family:'Comfortaa', cursive;
}
a:link { 
    color: white; 
}
a:visited{ 
    color: #DAB3FF; 
}
a:hover { 
    color: silver; 
}
a:active { 
    color: black; 
}
</style>
<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<div class="home">
<h2>Posts Found:</h2>
<?php
$blogName = $_GET['blogName'];
$blogPost = $_GET['blogComment'];

$postCount = 0;

if ($conn) {
    $sql_statement = "SELECT posts.*, users.ID AS user_id, users.Username FROM `posts` JOIN `users` ON users.ID = posts.users_ID WHERE `Title` LIKE '%$blogName%' AND `Post` LIKE '%$blogPost%'";    
   
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class = 'post-container'>";
            echo "<h2>" . '<a href="showIndividualPost.php?id='.$row["ID"].'">' . $row ["Title"] .'</a>' . "</h2><br>";
            echo $row ["Post"] . "<br>";
            echo "<h3>Comments: </h3>";
            
            $post_id = $row ["ID"];
            $sql_comments = "SELECT * FROM `comments` JOIN `users` ON users.ID = comments.users_ID WHERE `posts_ID` = '$post_id'";
            $result_comments = mysqli_query($conn, $sql_comments);
            
            $ratingCount = 0;
            $sum = 0;
            
            if ($result_comments) {
                while ($row_comments = mysqli_fetch_assoc($result_comments)) {
                    echo "<br>" . $row_comments["Text"];
                    echo "<br>Rating: " . $row_comments["Rating"];
                    echo "<br>-" . $row_comments["Username"] . "<br>";
                    $sum = $sum  + $row_comments["Rating"];
                    $ratingCount++;
                }
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
            
            echo "<br><h3>". "Average Rating: ". round($avg,2) . "</h3>";
            ?>
            <br><button type = "submit">Submit</button>
            </form>
            </div>
<?php 
            //echo "===============================================================================================================<br>";
            $postCount++; 
        }
?> 
<div class = "postCount">
<?php
        echo "There were " . $postCount . " post(s) found.";
?>
</div>
<?php
    }
    else {
        echo "There was a problem " . mysqli_error($conn);
    }
}
else {
    echo "ERROR" . mysqli_connect_error();
    exit;
}
mysqli_close($conn);
echo "<br><br><br>";
?>