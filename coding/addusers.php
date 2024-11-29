<?php
array_map("htmlspecialchars", $_POST);

include_once("connection.php");//connects page to the database
//check if inputted username exists in the database.
//if yes print 'username is in use'
//if not add the user to the database
$stmt = $conn->prepare("SELECT Username FROM TblUsers WHERE Username = :usr;");
$stmt->bindParam(":usr", $_POST['username']);
$stmt->execute();


if ($stmt->rowCount() > 0){

    echo("Username is in use. Choose another username.");
}
else{

$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO TblUsers (UserID, Username, Surname, Forename, Password, Email, Phone, 
USER_DESCRIPTION) VALUES (null,:username, :surname,:forename,:password,:email,:phone,:description)");
//inserts values obtained into tblusers in the database
$stmt->bindParam(':username', $_POST["username"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':password', $hashed_password);
$stmt->bindParam(':email', $_POST["email"]);
$stmt->bindParam(':phone', $_POST["phone"]);
$stmt->bindParam(':description', $_POST["description"]);
echo("created account");
}



$stmt->execute();
$conn=null;
