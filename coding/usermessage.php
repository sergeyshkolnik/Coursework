<!DOCTYPE html>
<head>

</head>
<html>
<h1>New Messages</h1>
<div class = "message">
<form action="messageprocess.php" method = "POST">
    <h3>Enter a message</h3>
<textarea  rows="90" cols="200" type="text" name = "message"></textarea>
<!-- Creating an areafor the input message -->
<input type="submit" value = 'SEND'>
</form>
</div>
</html>

<?php
include_once("connection.php");
session_start();
echo($_SESSION['user']);
