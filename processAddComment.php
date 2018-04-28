<!-- Gets the values from the showAddForm.php to add those values to the database  -->
<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<style>
body{
background-image: url(IMG_1197.jpg);
	background-size: cover;
	background-position: center;
	color: white;
	text-align: center;
	font-size: 30px;
	padding-top: 100px;
	font-family:'Comfortaa', cursive;
	margin: 0;
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
<body>
<div class="home">
<h1>Comment Result?</h1>
<?php
$comments = $_GET['comments'];
$post_id = $_GET['ID'];
$user_id = $_SESSION['userid'];
$rating = $_GET['rating'];

$sql_statement = "INSERT INTO `comments`(`ID`, `Text`, `users_ID`, `posts_ID`, `Rating`) VALUES (NULL,'$comments','$user_id','$post_id', '$rating')";
if ($conn && isset($_SESSION['userid'])) {
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        echo "Comment inserted successfully!<br>";
    }
    else {
        echo "Error in the sql " . mysqli_error($conn);
    }
}
else {
    echo "Error connecting " . mysqli_connect_error();
}
?>
</div>
</body>