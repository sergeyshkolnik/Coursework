<!DOCTYPE html>
<head>
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
<?php
        
        include_once('connection.php');
        array_map("htmlspecialchars", $_POST);
        session_start();
        
        date_default_timezone_set('Asia/Almaty');
        //set the timezone to the local time
         
        //sets variable date to represent the current date and time
        $stmt = $conn->prepare("SELECT * FROM TblFreeTimes WHERE FreeTime >= CURRENT_DATE();");
        //searches the table 'freetimes' for available times in the future
        //$stmt->bindParam(':date', $date);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //fetches from the database as an associative array
        ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="userpage.php">Home</a></li>
      <li><a href="login.php">Log In</a></li>
      <li><a href="signup.php">Sign Up</a></li>
      
    </ul>
  </div>
</nav>
<div class = "jumbotron">
    <h1> Book A Meeting</h1>
</div>
<div class = "container">
    <form action = "bookmeetingsprocess.php" method = "POST"> 
    <label for="date">Choose a date and time from available times:</label>   
    <select name="date" id = "date">  

        <?php
        

        foreach ($rows as $row):
        
        ?>
        

        <option value="<?= $row['FreeTime'];?>"><?= $row['FreeTime'];?></option>
        <!-- creates a dropdown list with each of the options being an available time to book meeting-->
        <?php endforeach; ?>
        </select> 
        <br>
        <label for="desc">Enter a description for your meeting:</label> <input type="text" name = "desc">
        <input type="submit" class = "btn btn-dark" value = "Request">
        </form>