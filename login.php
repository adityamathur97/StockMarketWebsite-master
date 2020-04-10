<?php
if(isset($_GET['fail'])){echo '<script>alert("Invalid Credentials! Please retry. :) ");</script>';}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>
    <!-- Navbar using bootstrap-->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="collapse_target">
        <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
        <ul class="navbar-nav ml-auto">
        </ul>
      </div>
    </nav>
    
    <h1>Account Login</h1>
    <hr>
    <div class="container">
      <form action="scripts/login.php" method="GET">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="Email" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="pass">Password:</label>
            <input type="password" class="form-control" id="pass" name="Pass" placeholder="Password" minlength="6">
          </div>
          <div class="form-group fullLen">
            <input type="submit" class="form-control" id="submit" value="Sign In">
          </div>
          <p><a href="index.php">Create new account</a><a id="forgotPass" href="forgotPassword.php">Forgot Password?</a></p>
      </form>
    </div>
  </body>
</html>