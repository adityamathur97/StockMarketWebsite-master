<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/forgotPassword.css">
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
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Register</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <div class="jumbotron">
      		<form action="scripts/changePassword.php" method="post">
				    <div class="form-group">
              <label for="Password">New Password : </label>
    				  <input type="password" class="form-control" id="email" name="Password" aria-describedby="emailHelp" placeholder="New Password">
  				  </div>
  				  <div class="form-group">
              <label for="CPassword">Confirm Password : </label>
    				  <input type="password" class="form-control" id="email" name="CPassword" aria-describedby="emailHelp" placeholder="Confirm Password">
  				  </div>
				    <div class="form-group fullLen">
    				  <input type="submit" class="form-control" id="submit" value="Change Password">
  				  </div> 
			    </form>
      </div>
    </div>
  </body>
</html>