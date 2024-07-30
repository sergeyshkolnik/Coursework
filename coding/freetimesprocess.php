<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
//echo($_POST);


$stmt = $conn->prepare("SELECT * FROM tblfreetimes WHERE FreeTime = :time ;");
$stmt->bindParam(':time', $_POST["Meetingtime"]);
$stmt->execute();
//searches the database for an existing time

if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $_POST['Meetingtime'] = $row['FreeTime'];
    echo('This time slot has already been selected');
}

//checks if the entered time by caoch already exists to avoid duplicates
else{

$stmt1 = $conn->prepare("INSERT INTO tblfreetimes (FreeTime) VALUES (:freetime)");
//inserts values obtained into tblusers in the database
$stmt1->bindParam(':freetime', $_POST["Meetingtime"]);




$stmt1->execute();

}
$conn=null;