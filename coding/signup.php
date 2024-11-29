<!DOCTYPE html>
<html>
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
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="login.php">Log In</a></li>
      
      
    </ul>
  </div>
</nav>
        <div class = "signup jumbotron">
            <h1>Sign Up</h1>
        </div>
        <div class = "container">
        <form action="addusers.php" method = "post">
            <div class = "form-group">Username:<input type = "text" name = "username"> </div><br>
            <div class = "form-group"> First name:<input type="text" name = "forename"> </div><br>
            <div class = "form-group"> Last name: <input type="text" name = "surname"></div><br>
            <div class = "form-group"> Password: <input type="password" name = "password"></div><br>
            <div class = "form-group"> Email: <input type="text" name = "email"></div><br>
            <div class = "form-group"> Phone: <input type="text" name = "phone"></div><br>
            <div class = "form-group">  Description: <input type="text" name = "description"></div><br>
            
            <input type="submit" class = "btn btn-dark" value = "Sign Up">

            <!--Creates a form to input data from the user-->
        </form>
</div>
    </body>
</html>