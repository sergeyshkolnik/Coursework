<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel = 'stylesheet' href = 'coursework.css'>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<html>
<div class = "jumbotron">
<h1>User Page</h1>
</div>
<a href="bookmeeting.php">Book a Meeting</a>
</html>
<?php
include_once('connection.php');
array_map("htmlspecialchars", $_POST);
session_start();
echo($_SESSION['user']);
?>
