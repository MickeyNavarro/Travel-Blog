<!DOCTYPE html>
<!-- Welcome page to introduce the user to the blog -->
<!-- Includes an interactive google map -->
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:700" rel="stylesheet">
<meta charset="UTF-8">
<title>Welcome</title>
</head>
<style>
body{
    font-size: 30px;
    color: black;
    font-family:'Comfortaa', cursive;
    float: left;
	text-align: center;
	text-decoration: none;
	margin: 0; 
}

#googleMap { 
    width: 100%;
    height: 84.5%;
    position: fixed;
    display: block;
}
</style>
<body>
<?php 
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
//https://www.quackit.com/html/codes/html_marquee_code.cfm
?>
<marquee behavior="scroll" direction="left"><img src="transportation.png" width="60" height="40">Welcome to our travel blog! Follow along as people from different places share their experience traveling the world!</marquee>

<div id="googleMap"></div>
<script>
//https://www.w3schools.com/graphics/google_maps_intro.asp
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:2.3,
    panControl: true,
    zoomControl: true,
    mapTypeControl: true,
    scaleControl: true,
    streetViewControl: true,
    overviewMapControl: true,
    rotateControl: true   
  };
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSskY0XtRN-fkJM9NkbLNQn927_eirhMQ&callback=myMap"></script>

</body>
</html>