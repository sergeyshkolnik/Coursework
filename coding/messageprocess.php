<?php
include_once("connection.php");
session_start();
date_default_timezone_set("Europe/London");
$cur_date = date('Y-m-d h:i:s');

echo($cur_date);

$stmt = $conn->prepare("INSERT INTO TblChats(MessageID, FromCoach, TimeSent, Username, Message) VALUES(null, 0, :time, :username, :message)");
$stmt->bindParam(':time', $cur_date);
$stmt->bindParam(':username', $_SESSION['user']);
$stmt->bindParam(':message', $_POST['message']);
$stmt->execute();
?>