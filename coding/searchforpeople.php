<!DOCTYPE HTML>
<head>
<title>Coaching</title>
        <!-- <link rel = 'stylesheet' href = 'coursework.css'> -->
        
        <link rel = 'stylesheet' href = 'coursework.css'>
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
               
</head>
<?php
include_once('connection.php');
array_map("htmlspecialchars", $_POST);
session_start();
$stmt = $conn->prepare("SELECT Surname, Forename, Username FROM TblUsers WHERE Surname = :search OR Forename = :search
OR Username = :search");
$stmt->bindParam(":search", $_POST['person']);
$stmt->execute();
//Finds Users that match with either Surname, Forename or Username

?>

<html>

<br><br><br>

</div>
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

  
  <div class="container">
    <h1>New Message to Client</h1>
    <div class="message">
        <form action="coachmessageprocess.php" method = "POST">
    <select name="user" id="users">
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
	echo('<option value='.$row["Username"].'>'.$row["Forename"].' '.$row["Surname"].'</option>');
}
//Creates a drop down list of the users that match the search.
?>
</select>

      
        <div class="form-group">
          <label for="message"><h3>Enter your message</h3></label>
          <textarea id="message" name="message" rows="10" placeholder="Type your message here..."></textarea>
        </div>
        <!-- <input type="hidden" name = "username" value =<?php echo $row['username'];?>> -->
        <div class="form-group text-center">
          <input type="submit" class="btn" value="Send">
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</form>
</div>
</html>


<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
	echo('<option value='.$row["Username"].'>'.$row["Forename"].' '.$row["Surname"].'</option>');
}
//Creates a drop down list of the users that match the search.
?>

</select>


</form>
</div>
</html>