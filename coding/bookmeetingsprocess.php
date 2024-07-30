<?php
include_once('connection.php');
array_map("htmlspecialchars", $_POST,);
session_start();
echo($_POST['date']);
$stmt = $conn->prepare("SELECT UserID FROM TblUsers WHERE Forename = :name; ");
$stmt->bindParam(':name', $_SESSION['user']);
$stmt->execute();
//$id = $stmt->fetch(PDO::FETCH_ASSOC);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
    $stmt1 = $conn->prepare("INSERT INTO TblMeetings (UserID, StartTime, Agreed_by_coach, Meeting_desc, Notes_of_coach)
    VALUES (:user, :time, '0', :desc, null)");
    $stmt1->bindParam(':user', $row['UserID']);
    $stmt1->bindParam(':time', $_POST['date']);
    $stmt1->bindParam(':desc', $_POST['desc']);
    $stmt1->execute();
}




