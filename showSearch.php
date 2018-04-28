<!-- Creates a form to search for a post -->
<!-- allows for processSearch.php to get the values from the form -->

<?php 
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<title>Search Blog</title>
<style>
.search{
	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(trevi.jpg);
	height: 85vh;
	background-size: cover;
	background-position: center;
	color: white;
	text-align: center;
	font-size: 30px;
	padding-top: 100px;
	font-family:'Comfortaa', cursive;
}
h2{ 
    color: #DAB3FF;
}
</style>
 <div class="search">
<div class="box">
<h2>Search for a Post</h2>
<p>Fill out any of these fields and search</p>
<form action="processSearch.php">
Post Title:<br><input type="text" name="blogName"></input><br>
Post Body:<br><input type="text" name="blogComment"></input><br>
<button type="submit">Search</button>
</form>
</div>
</div>