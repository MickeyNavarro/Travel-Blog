<!-- Creates a form to search for a post -->
<?php 
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<title>Search Blog</title>
<style>
.search{
	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_1197.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
	font-family:'Comfortaa', cursive;
	}
h2, p, form{
    color: white;
	font-size: 50px;
	text-align: center;
	padding:10px;
	font-family:'Comfortaa', cursive;
}
</style>
 <div class="search">
<div class="box">
<h2>Search for a post</h2>
<p>Fill out any of these fields and search</p>
<form action="processSearch.php">
Blog title:<input type="text" name="blogName"></input><br>
Blog post:<input type="text" name="blogComment"></input><br>
<button type="submit">Search</button>
</form>
</div>
</div>