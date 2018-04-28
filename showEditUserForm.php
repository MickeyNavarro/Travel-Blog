<!-- creates a form for the user to edit a new user -->
<!-- as long as the user has the role of an admin -->
<!-- allows for processEditUser.php to get the values from the form -->

<?php
session_start();
require_once 'connector_blog.php';
require_once 'showMenu.php';
 
$id = $_GET['id'];

if ($conn)
{
    $sql = "SELECT * FROM `users` WHERE `ID` = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $name = $row['Full Name'];
            $phone = $row['Phone Number'];
            $user = $row ['Username'];
            $pass = $row['Password'];
            $role = $row['Role'];
        }
    }
    else 
    {
        echo "There was an error" . mysqli_error($conn);
    }
}
else 
{
    echo "ERROR: " . mysqli_connect_error();
}
?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">

<style>
body{
 background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(20170605_105312.jpg);
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
<body>
<h2>Edit a Blog User</h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditUser.php">
<input type = "hidden" name = "id" value ="<?php echo $id; ?>"></input>
Full Name:<input type="text" name="name" value= "<?php echo $name; ?>"><br>
Phone Number:<input type="text" name="phone" value= "<?php echo $phone; ?>"><br>
Username:<input type="text" name="user" value= "<?php echo $user; ?>"><br>
Password:<input type="text" name="pass" value= "<?php echo $pass; ?>"><br>
Role:<input type="text" name="role" value= "<?php echo $role; ?>"><br>
    <button type="submit">Submit changes</button>
</form>
</body>