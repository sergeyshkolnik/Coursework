<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel = 'stylesheet' href = 'coursework.css'>
</head> 
<html>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="meetingrequests.php">View Meeting Requests</a></li>
      <li><a href="coachmessage.php">Send a Message</a></li>
      <li><a href="displaycoachmessage.php">View Message</a></li>
      <li><a href="coachmeetings.php">View my meetings</a></li>

      
    </ul>
  </div>
</nav>
<br><br><br>
</html>
<?php
include_once("connection.php");
session_start();
$stmt1 = $conn->prepare("SELECT*FROM TblChats WHERE FromCoach = 0");

$stmt1->execute();
$count=0;
//initiates a counter to count the number of messages

$stmt2 = $conn->prepare("SELECT Surname, Forename, TimeSent, Message FROM TblChats
INNER JOIN TblUsers ON TblChats.Username = TblUsers.Username WHERE FromCoach = 0");

$stmt2->execute();


while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    $count = $count + 1;
}

// Output message count
echo "<h1>Your Messages (" . $count . ")</h1>";

// Second query to fetch the messages


// Start the table with Bootstrap's table-bordered class for borders
echo "<table class='table table-bordered'>
        <thead>
            <tr>
                <th scope='col'>Time Sent</th>
                <th scope='col'>Message</th>
                <th scope='col'>Sender</th>
                
            </tr>
        </thead>
        <tbody>";

// Loop through the messages and display each one as a row in the table
while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>" . htmlspecialchars($row['TimeSent']) . "</td>
            <td>" . nl2br(htmlspecialchars($row['Message'])) . "</td>
            <td>" . nl2br(htmlspecialchars($row['Forename'])) . "</td>
          </tr>";
}

// Close the table
echo "</tbody>
      </table>";
?>
