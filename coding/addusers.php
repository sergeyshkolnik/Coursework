<?php
array_map("htmlspecialchars", $_POST);

include_once("connection.php");//connects page to the database

$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO TblUsers (UserID, Surname, Forename, Password, Email, Phone, 
USER_DESCRIPTION) VALUES (null,:surname,:forename,:password,:email,:phone,:description)");
//inserts values obtained into tblusers in the database
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':email', $_POST["email"]);
$stmt->bindParam(':phone', $_POST["phone"]);
$stmt->bindParam(':description', $_POST["description"]);



$stmt->execute();
$conn=null;
