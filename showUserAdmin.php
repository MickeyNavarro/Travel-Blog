<!-- Gets and outputs all the users and their information; can only be accessed if role is admin -->
<!-- Allows admin to edit or delete any user -->


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="blogStyle.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">

<meta charset="UTF-8">
<title>Blog Users (Admin Page)</title>
</head>
<style>
body{
    background-image:url(20170605_105312.jpg);
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

</style>
<body>
<?php
session_start();
require_once 'connector_blog.php';
require_once 'showMenu.php';

if($_SESSION['role'] != "admin")
{
    echo "PLease login as an admin!";
}
?>
<div class="home">
<h2>Blog Users (Admin Page)</h2>

<?php
if ($conn)
{
    $sql = "SELECT * FROM `users`";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "<div class = 'usercontainer'>";
            echo "User ID: " . $row ['ID'] . "<br>";
            echo "User Full Name: " .$row ['Full Name'] . "<br>";
            echo "User Phone Number: " .$row ['Phone Number'] . "<br>";
            echo "Username: " .$row ['Username'] . "<br>";
            echo "User Password: " .$row ['Password'] . "<br>";
            echo "User Role: " .$row ['Role'] . "<br>";
            ?>
            
            <form action = "processDeleteUser.php">
            <input type = "hidden" name = "id" value = "<?php echo $row ["ID"]; ?>"></input>
            <button type = "submit">Delete</button>       
            </form>
                   
            <form action = "showEditUserForm.php">
            <input type = "hidden" name = "id" value = "<?php echo $row ["ID"]; ?>"></input>
            <button type = "submit">Edit</button>       
            </form>
            
            <?php 
            echo "</div>";
        }
    }
    else
    {
        echo "There was an error" . mysqli_error($conn);
    }
}
else 
{
    echo "ERROR" . mysqli_connect_error();
    exit;
}

mysqli_close($conn);
?>
</div>
<?php 
echo "<br><br>";
?>
</body>
