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
    
    <?php
    include_once('connection.php');
    session_start();
    ?>
    
    <?php
    $stmt = $conn->prepare("SELECT MeetingID, Surname, Forename, StartTime, Meeting_desc
    FROM TblUsers
    INNER JOIN TblMeetings ON TblUsers.UserID = TblMeetings.UserID
    WHERE Agreed_by_coach = 0 AND StartTime >= CURRENT_DATE();");
    //uses an inner join function to join tblmeetings and tblusers in order to fetch the name
    //of the meeting recipient in one query
    $stmt->execute();  
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class = 'jumbotron'>
    <h1> Pending Meeting Requests</h1>
    </div>
    <?php
    print_r($rows);
    foreach ($rows as $row):
    //creates a loop though all the rows in the table 
    
    ?>
<form action="meetingrequestsprocess.php" method = "POST">
<div class = "row">
<div>
<input type = "hidden" name = "id" value = '<?php echo $row['MeetingID']  ?>'>
<!-- uses a hidden variable in order to post the meetingiD to the next page -->
</div>
<div>
<input type = "hidden" name = "time" value = '<?php echo $row['StartTime']  ?>'>
</div>
<div class = "col-sm-2">
<?php  echo $row['Surname']?>
</div>  1 
<div class = "col-sm-2">  
<?php  echo $row['Forename']?>
</div>
<div class = "col-sm-2">  
<?php  echo $row['StartTime']?>
</div>  
<div class = "col-sm-3">    
<?php  echo $row['Meeting_desc']?>
</div>   
    <div class = "col-sm-1">  
    <label for="choice">Accept</label>
    
    <input type="radio" name = "choice" value = '1'>
    </div>
    <div class = "col-sm-1">    
    <label for="choice">Deny</label>
    <input type="radio" name = "choice" value = '0'>
    </div>
    <div class = "col-sm-1">
    <input type="submit" value = 'Confirm'>
    
    </div>
    </div>
    </form>

</div>
    
    <?php endforeach; ?>
    </body>
    </html>