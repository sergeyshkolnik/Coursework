<!DOCTYPE html>
<?php
include_once("connection.php");
session_start();
$user = $_POST['Username'];
$_SESSION['user'] = $user;
//starts a session variable of the username that has been posted from log in page
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("SELECT*FROM TblUsers WHERE Forename = :name ;");
$stmt->bindParam(':name', $_POST['Username']);
$stmt->execute(); //searches database or matching values of name
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $hashed = $row['Password'];
    $attempt = $_POST['Password'];
//compares values to the values in database
    if(password_verify($attempt, $hashed))
    {
        header('Location: userpage.php');
    }
}