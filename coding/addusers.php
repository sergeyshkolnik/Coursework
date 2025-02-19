<!DOCTYPE html>
<head>
<title>Coaching</title>
        <!-- <link rel = 'stylesheet' href = 'coursework.css'> -->
        
        
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
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="mainpage.php">Home</a></li>
      
      <li><a href="login.php">Log In</a></li>
      
      <li><a href="login.php">Book a Meeting</a></li>
      <li><a href="login.php">Send a Message</a></li>

      
    </ul>
  </div>
</nav>

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
