<!DOCTYPE html>
<head>
<title>Coaching</title>
        <!-- <link rel = 'stylesheet' href = 'coursework.css'> -->
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel = 'stylesheet' href = 'coursework.css'>
        
</head>
<html>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="mainpage.php">Home</a></li>
      <li><a href="login.php">Log In</a></li>
      <li><a href="signup.php">Sign Up</a></li>
      
    </ul>
  </div>
</nav>
<br><br><br>
<div class="container">
    <h1>New Message to Coach</h1>
    <div class="message">
      <form action="messageprocess.php" method="POST">
        <div class="form-group">
          <label for="message"><h3>Enter your message</h3></label>
          <textarea id="message" name="message" rows="10" placeholder="Type your message here..."></textarea>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="btn" value="Send">
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!-- <h1>New Message to Coach</h1>
<div class = "message">
<form action="messageprocess.php" method = "POST">
    <h3>Enter a message</h3>
<textarea  rows="90" cols="200" type="text" name = "message"></textarea>
<!-- Creating an areafor the input message -->
<!--<input type="submit" value = 'SEND'>
</form>
</div>
</html> -->

<?php
include_once("connection.php");
session_start();
echo($_SESSION['user']);
