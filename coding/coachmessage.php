<?php
include_once("connection.php");
session_start();



?>

<!DOCTYPE HTML>
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
<html>

<br><br><br>

</div>
<html>
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


  
  <div class="container">
    <h1>New Message to Client</h1>
    <div class="message">
    <form action="searchforpeople.php" method = "POST">
      <h3>Look for a user</h3>
      <input type="text" name = "person" placeholder="Search for people">
      <input type="submit">
      </form>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</form>
</div>
</html>