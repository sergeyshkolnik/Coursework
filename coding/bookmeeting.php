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
        array_map("htmlspecialchars", $_POST);
        
        
        date_default_timezone_set('Asia/Almaty');
        //set the timezone to the local time
         
        //sets variable date to represent the current date and time
        $stmt = $conn->prepare("SELECT * FROM TblFreeTimes WHERE FreeTime >= CURRENT_DATE();");
        //searches the table 'freetimes' for available times in the future
        //$stmt->bindParam(':date', $date);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //fetches from the database as an associative array
        ?>
<div class = "jumbotron">
    <h1> Book A Meeting</h1>
</div>
<div class = "container">
    <form action = "bookmeetingsprocess.php" method = "POST"> 
    <label for="date">Choose a date and time from available times:</label>   
    <select name="date" id = "date">  

        <?php
        

        foreach ($rows as $row):
        
        ?>
        

        <option value="<?= $row['FreeTime'];?>"><?= $row['FreeTime'];?></option>
        <!-- creates a dropdown list with each of the options being an available time to book meeting-->
        <?php endforeach; ?>
        </select> 
        <br>
        Enter a description for your meeting :<input type="text" name = "desc">
        <input type="submit" class = "btn btn-dark" value = "Request">
        </form>