<!DOCTYPE html>
<head>
<title>Coaching</title>
        <!-- <link rel = 'stylesheet' href = 'coursework.css'> -->
        
        <link rel = 'stylesheet' href = 'coursework.css'>
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
               
</head>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="meetingrequests.php">View Meeting Requests</a></li>
      <li><a href="coachmessage.php">Send a Message</a></li>
      <li><a href="displaycoachmessage.php">View Message</a></li>
      <li><a href="coachmeetings.php">View my meetings</a></li>

      
    </ul>
  </div>
</nav>
<div class = "welcome">
    
        <h3>Message Sent </h3>
        <a href = "coachpage.php" class = "btn btn-dark">Back to home page</a>
    
</div>


<?php
include_once("connection.php");
session_start();
date_default_timezone_set("Europe/London");
//setting the timezone to UK time
$cur_date = date('Y-m-d h:i:s');
//getting current date in correct form for the database
array_map("htmlspecialchars", $_POST);



$stmt = $conn->prepare("INSERT INTO TblChats(MessageID, FromCoach, TimeSent, Username, Message) VALUES(null, 1, :time, :username, :message)");
$stmt->bindParam(':time', $cur_date);
$stmt->bindParam(':username', $_POST['user']);
$stmt->bindParam(':message', $_POST['message']);
$stmt->execute();
//adding everything to the database
?>