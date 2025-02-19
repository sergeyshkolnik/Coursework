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
<body>
<div class = "jumbotron">
<h1>
    Your Meetings
</h1>
</div>
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
    




<?php
include_once("connection.php");
session_start();
$date = $_POST['date'];
$stmt1 = $conn->prepare("SELECT *
        FROM TblMeetings
        INNER JOIN TblUsers ON TblMeetings.UserID = TblUsers.UserID
        ");
       
        $stmt1->execute();
        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){

            if (strpos($row1["StartTime"],$date) !== false) {
                $surnames = $row1['Surname'];
                //echo($surnames);
                $forenames = $row1['Forename'];
                
                $description = $row1['Meeting_desc'];
                //echo($time);
                //print_r($row1);
                //print("<br>");
                $time = substr($row1["StartTime"], 11);
                //outputs the time value from the string of date.
                ?>
                <div class ="message">
                <h3>Meeting with <?php echo($surnames); echo($forenames);?> at <?php echo($time);?><br></h3>
                </div><?php

            }

    }

/* $stmt = $conn->prepare("SELECT StartTime
FROM TblMeetings
INNER JOIN TblUsers ON TblMeetings.UserID = TblUsers.UserID");

$stmt->execute();

$date = $_POST['date'];
print_r($date);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
    echo("-stuff<br>");
    $dates =$row['StartTime'];
    
    $inputString = $dates." <br>";
    $lines = explode("/n", $inputString);
    
    //loop through each line
    
    foreach($lines as $line){
    
        if (strpos($line,$date) !== false) {
    
            //Extrract the time portion
    
            $time = substr($line, 11);
            $meetdate=;
            
            //echo($time);
            break;
    
        }
    }
    $fulldate = $date." ".$row['StartTime'];
    echo($fulldate);
    if ($date==$meetdate){
        $stmt1 = $conn->prepare("SELECT Surname, Forename, Meeting_desc
        FROM TblMeetings
        INNER JOIN TblUsers ON TblMeetings.UserID = TblUsers.UserID
        WHERE StartTime = :starttime");
        $stmt1->bindParam(':starttime', $row['StartTime']);
        $stmt1->execute();
        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
            
            $surnames = $row1['Surname'];
            //echo($surnames);
            $forenames = $row1['Forename'];
            
            $description = $row1['Meeting_desc'];
            //echo($time);
            print_r($row1);

    }

    }
    echo("bob");
    //$stmt2 = $conn->prepare("SELECT ") */
    
    
    



?>



</body>