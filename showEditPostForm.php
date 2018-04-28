<!-- creates a form for the user to edit a post -->
<!-- allows for processEditPost.php to get the values from the form -->

 <?php 
 session_start();
 require_once 'showMenu.php';
 $postid = $_GET['postid'];

 //we know the id 
 // select the rest of values from database
 require_once 'connector_blog.php';

 if ($conn) {
     $sql_statement = "SELECT * FROM `posts` WHERE `ID` = '$postid' LIMIT 1";
     $result = mysqli_query($conn, $sql_statement);
     if ($result) {
         while ($row = mysqli_fetch_assoc($result)) {
             $blogName = $row["Title"];
             $blogPost = $row["Post"];
             
         }
     } else {
         echo "there was a sql problem " . mysqli_error($conn);
     }
 }else {
     echo "error connecting " . mysqli_connect_error();
 }
 ?>
 <link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">

 <style>
 .home{
background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_6332.jpg);
    height: 100vh;
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
<div class="home">
<h2>Edit a Post</h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditPost.php">
<input type = "hidden" name = "postid" value = "<?php echo $postid; ?>"></input>
Blog Title:<input type="text" name="blogTitle" value = "<?php  echo $blogName; ?>"></input><br>
Blog Post:<textarea rows="10" cols="100" name="blogPost"><?php echo $blogPost; ?></textarea><br>
<button type="submit">Submit Changes</button>
</form>
</div>
