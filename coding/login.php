<!DOCTYPE html>
<html>
    <head>
        <title> Log In</title>
        <head>
    
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="Main Page">Home</a></li>
      
      <li><a href="signup.php">Sign Up</a></li>
      
      
    </ul>
  </div>
</nav>
    <div class = " login jumbotron">
        <h1>Log In</h1>
        
        </div>
        <div class ="container">
        <form action="loginprocess.php" method = "POST">
        
        <div class="form-group">
  <label for="usr">Username:</label>
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
 
 
