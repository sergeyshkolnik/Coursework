<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        
        <link rel = "stylesheet" href = "coursework.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

           
</head>
<?php
include_once('connection.php');
array_map('htmlspecialchars',$_POST);
print_r($_POST);



if ($_POST['choice'] == 1){
    $stmt = $conn->prepare("UPDATE TblMeetings SET Agreed_by_coach = :choice WHERE MeetingID = :id ;");
    $stmt->bindParam(':choice', $_POST['choice']);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    
    $stmt1 = $conn->prepare("DELETE FROM TblFreeTimes
    WHERE FreeTime = :freetime ;");
    $stmt1->bindParam(':freetime', $_POST['time']);
    $stmt1->execute();
    //deletes from the freetimes table only if meeting is accepted by coach

    $stmt2 = $conn->prepare("SELECT MeetingID, Surname, Forename, StartTime, Meeting_desc
    FROM TblUsers
    INNER JOIN TblMeetings ON TblUsers.UserID = TblMeetings.UserID
    WHERE MeetingID = :id ;");
    $stmt2->bindParam(':id', $_POST['id']);
    $stmt2->execute();
    //fetches details of the meeting to be displayed in a confirmation message.


    $rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row):
    //converts array to items that can be displayed
    ?>
    <html>
    <div class = 'jumbotron'>
        <h1> Pending Meeting Requests</h1>
        </div>
        <h3> Your Meeting on  <?php echo $row['StartTime']?> with <?php echo $row['Surname'];echo(" ") ;echo $row['Forename']?> is now confirmed.</h3>
    </html>
    <?php endforeach;
} 

else{
    $stmt3 = $conn->prepare("DELETE FROM TblMeetings WHERE MeetingID = :id ;");
    $stmt3->bindParam('id', $_POST['id']);
    $stmt3->execute();
    ?>
    <div class = 'jumbotron'>
        <h1> Pending Meeting Requests</h1>
        </div>
        <h3> You declined the meeting</h3>
        

    
    <?php
}
?>


</html>