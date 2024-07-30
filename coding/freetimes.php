<!DOCTYPE html>
<head>

        
        <link rel = "stylesheet" href = "coursework.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<div class = 'jumbotron'>
<h1> Select a time during which you are available</h1>
</div>
<form action="freetimesprocess.php" method = "POST">
<div class="form-group">

<input type="datetime-local" id="meetingtime" name="Meetingtime">
  <input type="submit">
</div>
</form>
