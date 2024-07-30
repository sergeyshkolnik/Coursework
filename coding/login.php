<!DOCTYPE html>
<html>
    <head>
        <title> Log In</title>
        <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel = "stylesheet" href = "coursework.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <div class = " login jumbotron">
        <h1>Log In</h1>
        
        </div>
        <div class ="container">
        <form action="loginprocess.php" method = "POST">
        
        <div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" id="usr" name="Username">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" id="pwd" name="Pword">
</div>
<input type="submit" class = "btn btn-dark" value = "Login">
        </form>
        </div>
    </body>
</html>
 
 
