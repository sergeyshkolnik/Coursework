<!DOCTYPE html>
<head>

</head>
<body>
<?php
include_once("connection.php");
session_start();
$searchDate = $_POST['date'];
?>
<h1> Your Meetings</h1>

<h3>Meetings on the <?php echo(date("l, F j, Y",strtotime($searchDate)));?> </h3>
    







<?php
include_once("connection.php");

$stmt = $conn->prepare("SELECT StartTime FROM TblMeetings
INNER JOIN TblUsers ON TblMeetings.UserID = TblUsers.UserID
WHERE Forename = :name AND Agreed_by_coach = 1");
$stmt->bindParam(':name', $_SESSION['user']);
$stmt->execute();
$date = $_POST['date'];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
$dates =$row['StartTime'];

$inputString = $dates." <br>";
$lines = explode("/n", $inputString);

//loop through each line

foreach($lines as $line){

    if (strpos($line,$searchDate) !== false) {

        //Extrract the time portion

        $time = substr($line, 11);
        echo($time);
        break;

    }
}





}





    


?>





</body>