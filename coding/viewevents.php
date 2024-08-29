<!DOCTYPE html>
<head>

</head>
<body>
    







<?php
include_once("connection.php");
session_start();

$stmt = $conn->prepare("SELECT StartTime FROM TblMeetings
INNER JOIN TblUsers ON TblMeetings.UserID = TblUsers.UserID
WHERE Forename = :name AND Agreed_by_coach = 1");
$stmt->bindParam(':name', $_SESSION['user']);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$dates = $row['StartTime'];
echo($dates);
$date=$_POST['date'];
$pos = strpos($dates, $date);
echo($pos);
    

}
?>

<h1> Your Meetings</h1>

<h3>Meetings on the <?php //echo($date);?> </h3>
<p> <?php //echo($time);?> </p>


</body>