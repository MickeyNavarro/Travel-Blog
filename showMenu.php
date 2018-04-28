<html>
<head>
<!-- creates a navigation menu that will be displayed throughout the website -->

<title>Travel Blog</title>
<meta charset="UTF-8">
<meta name= "viewport" content="width=device-width">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">

</head>
<body>
<header>
<div>
<ul class="main-nav">
<?php
if (!isset($_SESSION['username'])):
?>
<li class="active"><a href="showLogin.html">Login</a></li>
<?php else: ?>
<li class="active"><a href="index.php">Welcome <?php echo $_SESSION['username']; ?>!</a> </li> 
<?php endif; ?>
<li class="active"><a href="index.php?pageNumber=1">Search</a> </li> <li class="blog-item"><a href="index.php?pageNumber=2">Blog Posts</a> </li>  <li class="blog-item"><a href="index.php?pageNumber=3">Add New Post</a></li> 

<?php if ( $_SESSION['role'] == 'admin'):?>
<li><a href="showUserAdmin.php">Users Admin</a></li><li><a href="showPostsAdmin.php">Posts Admin</a></li><li><a href="showCommentsAdmin.php">Comments Admin</a></li>
<?php endif; ?>
<li class="active"><a href="processLogout.php">Logout</a></li>

	





</ul>

</div>

</header>
</body>
</html>
