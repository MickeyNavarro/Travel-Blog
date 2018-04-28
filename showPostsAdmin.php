<!-- Gets and outputs all the posts of every user; can only be accessed if role is admin -->
<!-- Allows admin to edit or delete any post through the use of showEditForm.php and processDeletePost.php -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">

<meta charset="UTF-8">
<title>Blog Posts (Admin Page)</title>
</head>
<style>
body{
    background-image:url(IMG_6332.jpg);
    background-size: 100%; 
 	background-repeat: no-repeat;
	background-attachment: fixed;
	color: white;
	font-size: 25px;
	font-family:'Comfortaa', cursive;
}
.usercontainer { 
	border: 1px solid black; 
  	border-radius: 5px; 
  	margin: 10px; 
  	padding: 10px; 
  	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3));
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

if ($_SESSION['role'] != 'admin') {
    echo "Please login as an showPostsAdmin";
    exit;
} 
?>
<div class="home">
<h2>Blog Posts (Admin Page)</h2>

<?php
if ($conn) {
    $sql_statement = "SELECT * FROM `users`";
    
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='usercontainer'>";
            echo "User ID: " . $row["ID"] . "<br> ";
            $user_id = $row['ID'];
            echo "Username: " . $row["Full Name"] . "<br>";
            
            $sql_statement2 = "SELECT *, posts.ID AS posts_id FROM posts JOIN users ON users.ID = posts.users_ID WHERE users.ID = '$user_id'";
            $result2 = mysqli_query($conn, $sql_statement2);
            if ($result2) {
                echo "<div class = 'postscontainer'>";
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "Post # " . $row2["posts_id"] . "<br>";
                    echo $row2["Title"] . "<br>";
                    echo $row2["Post"] . "<br>";
                    ?>
            
            <form action = "processDeletePost.php">
            <input type = "hidden" name = "postid" value = "<?php echo $row2['posts_id'];?>"></input>
            <button type = "submit">Delete</button>
            
            </form>
            
             <form action = "showEditPostForm.php">
            <input type = "hidden" name = "postid" value = "<?php echo $row2['posts_id'];?>"></input>
            <button type = "submit">Edit</button>
            
            </form>
            <?php 
            echo "<br><hr><br>";
            }
        echo "</div>";
        } 
    echo "</div>";
    }
  }
    else {
        echo "There was a problem " . mysqli_error($conn);
    }
        }
else {
    echo "ERROR" . mysqli_connect_error();
   
}
mysqli_close($conn);
?>
</div>

</body>
</html>