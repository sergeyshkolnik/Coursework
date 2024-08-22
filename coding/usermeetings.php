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
<?php session_start();?>
<html>
    <body>
        
    
    <div class = "jumbotron">
        Your Meetings 
    </div>

    <div id="calendar">
        <div id="calendar-header">
            <span id="month-prev" class="change-month"><</span>
            <h1 id="month"></h1>
            <span id="month-next" class="change-month">></span>
        </div>
        <div id="calendar-body"></div>
    </div>
    <script src="script.js">


    
</script>


<?php

include_once('connection.php');
$stmt = $conn->prepare("SELECT StartTime
FROM TblUsers
INNER JOIN TblMeetings ON TblUsers.UserID = TblMeetings.UserID
WHERE Agreed_by_coach = 1 AND :name = Forename
 ;  ");
$stmt->bindParam(':name',$_SESSION['user']);
//SQL statement first joins the meetings and user tables and then selects the meeting times for the particular
//user that is logged in to the system
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row):
//starts a loop to convert the array of values to individual time values
$myvalue = $row['StartTime'];

$datetime = new DateTime($myvalue);

$date = $datetime->format('Y-m-d');
$time = $datetime->format('H:i:s');
$day = date('d', strtotime($date));
$month = date('m', strtotime($date));
$year = date('y', strtotime($date));
//splitting the date into separate day month and year
echo($day);
echo($month);
echo($year);

//this sequence of code separates the datetime variable into separate date and time variables

?>

















</body>
</html>
<?php endforeach;?>