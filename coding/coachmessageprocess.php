<?php
include_once("connection.php");
session_start();
date_default_timezone_set("Europe/London");
//setting the timezone to UK time
$cur_date = date('Y-m-d h:i:s');
//getting current date in correct form for the database
array_map("htmlspecialchars", $_POST);

//print_r($_POST);

echo($cur_date);

$stmt = $conn->prepare("INSERT INTO TblChats(MessageID, FromCoach, TimeSent, Username, Message) VALUES(null, 1, :time, :username, :message)");
$stmt->bindParam(':time', $cur_date);
$stmt->bindParam(':username', $_POST['user']);
$stmt->bindParam(':message', $_POST['message']);
$stmt->execute();
//adding everything to the database
?>