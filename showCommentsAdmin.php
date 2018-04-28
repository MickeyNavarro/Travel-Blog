<!-- Gets and outputs all the comments of every user; can only be accessed if role is admin -->
<!-- Allows admin to edit or delete any comment -->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Blog Comments (Admin Page)</title>
</head>
<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

if ($_SESSION['role'] != 'admin') {
    echo "Please login as an admin<br>";
    exit;
}
?>
<style>
body{
    background-image:url(20170605_124524.jpg);
    background-size: 100%; 
 	background-repeat: no-repeat;
	background-attachment: fixed;
	color: white;
	font-size: 25px;
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
.usercontainer { 
	border: 1px solid black; 
  	border-radius: 5px; 
  	margin: 10px; 
  	padding: 10px; 
  	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3));
  	font-family:'Comfortaa', cursive;
}

</style>
<body>
<div class="home">
<h2>Blog Comments (Admin Page)</h2>
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
                       
            $sql_statement2 = "SELECT *, comments.ID AS comment_id FROM comments JOIN users ON users.ID = comments.users_ID WHERE users.ID = '$user_id'";
            $result2 = mysqli_query($conn, $sql_statement2);
            if ($result2) {
                echo "<div class= 'commentscontainer'>";
                while($row2 = mysqli_fetch_assoc($result2)){
                    echo "Comment ID: " . $row2['comment_id'] . "<br>";
                    echo "Comment Text: " . $row2['Text'] . "<br>";
                    ?>
                    <form action = "showEditComment.php">
                    <input type="hidden" name = "comment_id" value = "<?php echo $row2['comment_id']?>"></input>
                    <button type = "submit">Edit</button>
                    </form>
                    <form action = "processDeleteComment.php">
                    <input type="hidden" name = "comment_id" value = "<?php echo $row2['comment_id']?>"></input>
                    <button type = "submit">Delete</button>
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
echo "<br><br>"; 
?>
</div>
</body>