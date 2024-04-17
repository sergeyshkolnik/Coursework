<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers
(UserID INT(4) Unsigned AUTO_INCREMENT PRIMARY KEY,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
Email VARCHAR(200) NOT NULL,
Phone VARCHAR(20),
USER_DESCRIPTION VARCHAR(500)")


$stmt->execute();
$stmt->closeCursor();
#This creates a table called TblUsers in order to store data about the users of the website

$stmt1 = $conn->prepare("DROP TABLE IF EXISTS TblCoach;
CREATE TABLE Tbl")