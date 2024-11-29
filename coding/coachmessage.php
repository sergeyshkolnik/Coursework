<?php
include_once("connection.php");
session_start();



?>

<!DOCTYPE HTML>
<head>
        
</head>
<html>
<h1>New Message</h1>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <form action="searchforpeople.php" method = "POST">
  <input type="text" name = "person" placeholder="Search for people">
  

  <input type="submit">
  </form>
</div>
<div class = "message">
<form action="messageprocess.php" method = "POST">
    <h3>Enter a message</h3>
<textarea  rows="90" cols="200" type="text" name = "message"></textarea>
<!-- Creating an areafor the input message -->
<input type="submit" value = 'SEND'>
</form>
</div>
</html>