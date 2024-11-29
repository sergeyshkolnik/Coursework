<!DOCTYPE html>
<?php
include_once('connection.php');
array_map("htmlspecialchars", $_POST);
$stmt = $conn->prepare("SELECT Surname, Forename, Username FROM TblUsers WHERE Surname = :search OR Forename = :search
OR Username = :search");
$stmt->bindParam(":search", $_POST['person']);
$stmt->execute();
//Finds Users that match with either Surname, Forename or Username

?>

<head>
        
</head>
<html>
<h1>New Message</h1>
<label for="Users">Choose a Users:</label>
<div class = "message">
<form action="coachmessageprocess.php" method = "POST">

<select name="user" id="users">


<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
	echo('<option value='.$row["Username"].'>'.$row["Forename"].' '.$row["Surname"].'</option>');
}
//Creates a drop down list of the users that match the search.
?>

</select>

    <h3>Enter a message</h3>
<textarea  rows="90" cols="200" type="text" name = "message"></textarea>
<!-- Creating an areafor the input message -->
<input type="submit" value = 'SEND'>
</form>
</div>
</html>