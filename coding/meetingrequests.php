<!DOCTYPE html>
<html>
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
<body>
    <form action="meetingrequestsprocess.php" method = "POST">
    <?php
    include_once('connection.php');
    $stmt = $conn->prepare("SELECT Surname, Forename, StartTime, Meeting_desc
    FROM TblUsers
    INNER JOIN TblMeetings ON TblUsers.UserID = TblMeetings.UserID
    WHERE Agreed_by_coach = 0 AND StartTime >= CURRENT_DATE();");
    //uses an inner join function to join tblmeetings and tblusers in order to fetch the name
    //of the meeting recipient in one query
    $stmt->execute();  
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row):
    
    
    ?>
    
    <div class = 'jumbotron'>
    <h1> Pending Meeting Requests</h1>
    </div>
    
    <div class="row">
    <div class = 'col-sm-2'>
        <p> <?=$row['Surname']; ?> </p>
    </div>

    <div class = 'col-sm-2'>
    <p> <?=$row['Forename'];?> </p>
    </div>
    
    <div class = 'col-sm-2'>
        <p> <?=$row['StartTime'];?> </p>
    </div>
    <div class = 'col-sm-2'>
        <p> <?=$row['Meeting_desc'];?> </p>
    </div>
    <div class = 'col-sm-1'>
        <input type="submit" value = "Accept">
    </div>
    <div class = 'col-sm-1'>
        <input type="submit" value = "Deny">
    </div>
    </div>
    <?php endforeach; ?>
    </form>
    </body>
    </html>