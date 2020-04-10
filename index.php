<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Stock Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
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
        <a class="navbar-brand" href="#"><i class="fas fa-home"></i></a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
      <h1>Easy Money!</h1>
      <div class="jumbotron">
      		<form action="http://167.172.209.156/register.php" method="post">
      			<h3>Register Now!</h3>
      			<p>Complete the form below:</p>
				    <div class="form-group">
    				  <input type="text" class="form-control" id="fName" name="fname" placeholder="First Name" minlength="1">
  				  </div>
  				  <div class="form-group">
    				  <input type="text" class="form-control" id="lName" name="lname" placeholder="Last Name" minlength="1">
  				  </div>
				    <br>
				    <div class="form-group">
    				  <input type="email" class="form-control" id="email" name="Email" aria-describedby="emailHelp" placeholder="Email">
    				  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  				  </div>
  				  <div class="form-group">
    				  <input type="number"  class="form-control" id="mobile" name="Mob" placeholder="Mobile No." minlength="10" maxlength="12">
  				  </div>
            <div class="form-group">
              <input type="text"  class="form-control" id="address" name="Addr" placeholder="Adddress" minlength="1">
            </div>
  				  <br>
				    <div class="form-group fullLen">
    				  <input type="text" class="form-control" id="uName" name="UserName" placeholder="User Name" minlength="1">
  				  </div>
				    <br>
				    <div class="form-group">
    				  <input type="password" class="form-control" id="pass" name="Password" placeholder="Password" minlength="6">
  				  </div>
  				  <div class="form-group">
    				  <input type="password" class="form-control" id="cpass" name="CnfPassword" placeholder="Confirm Password" minlength="6">
  				  </div>
				    <br>
				    <div class="form-group fullLen">
    				  <input type="submit" class="form-control" id="submit" value="Register!">
  				  </div> 
			    </form>
      </div>
    </div>
  </body>
</html>