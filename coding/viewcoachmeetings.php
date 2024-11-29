<!DOCTYPE html>

<head>

</head>
<body>
<div class = "jumbotron">
<h1>
    Your Meetings
</h1>
</div>
    




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