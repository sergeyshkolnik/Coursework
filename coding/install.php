<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers;
CREATE TABLE TblUsers
(UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Surname VARCHAR(20) NOT NULL,
Forename VARCHAR(20) NOT NULL,
Password VARCHAR(200) NOT NULL,
Email VARCHAR(200) NOT NULL,
Phone VARCHAR(20),
USER_DESCRIPTION VARCHAR(500),
Coach TINYINT(1))");
//make coach


$stmt->execute();
$stmt->closeCursor();
#This creates a table called TblUsers in order to store data about the users of the website
$hashed_password = password_hash('p', PASSWORD_DEFAULT); #hashes the coach's default password
$stmt = $conn->prepare("INSERT INTO TblUsers (UserID, Surname, Forename, Password , Email, Phone, USER_DESCRIPTION, Coach) 
VALUES
(NULL, 'Zhunisbekova', 'Lyazzat', :password, 'lyazzat.education@gmail,com', NULL, NULL, '1') ");
$stmt->bindParam(':password', $hashed_password);


$stmt->execute();
$stmt->closeCursor();
#This creates a table called TblCoach in order to store the data about the coach

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblMeetings;
CREATE TABLE TblMeetings
(UserID INT(4) NOT NULL,
StartTime DATETIME NOT NULL,
Agreed_by_coach INT(1) NOT NULL,
Meeting_desc VARCHAR(2000) NOT NULL,
Notes_of_coach VARCHAR(10000));");
$stmt->execute();
$stmt->closeCursor();
#creates a table called tblmeetings in order to store data about the meetings

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblChats;
CREATE TABLE TblChats
(UserID INT(4) NOT NULL,
CoachID INT(4) NOT NULL,
TimeSent DATETIME NOT NULL,
MessageSender_ID INT(4) NOT NULL,
Message VARCHAR(65535) NOT NULL);");
$stmt->execute();
$stmt->closeCursor();

#creates table called tblchats in order to store info about chats

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblFreeTimes;
CREATE TABLE TblFreeTimes
(FreeTime DATETIME);");
$stmt->execute();
$stmt->closeCursor();

