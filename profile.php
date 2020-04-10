<?php
	require "scripts/global.php";
  mksession();
  echo '<div id="auth" style="display: none;" >'.$_SESSION['authkey'].'</div>';
  $bal = 100;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/profile.js"></script>
  </head>

  <body onload="loaddata()">
    <!-- Navbar using bootstrap-->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="collapse_target">
        <a class="navbar-brand" href="#"><i class="fas fa-home"></i></a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link"> </a>
          </li>
          <li class="nav-item dropdown">
          <?php
           echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <span id="usern">'.$_SESSION["Username"].'</span>
            </a>'
            ?>
            <div style="left: -95%;" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">Profile</a>              <a class="dropdown-item" href="portfolio.php">Portfolio</a>

              <a class="dropdown-item" href="stocksearch.php">Stock Search</a>
              <a class="dropdown-item" href="trade.php">Trade</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/scripts/logout.php">Sign Out!</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
      
      <div class="jumbotron">
      
      <div>
        <!-- add &nbsp in js -->
        <?php 
        echo '<div class="details" id="nameDiv"><h2><span id="fName">'.$_SESSION["Username"].'</span>&nbsp<span id="lName"></span></h2></div>
        
        <div class="details">
          <p><strong>Username: </strong><span id="usrName">'.$_SESSION["Username"].'</span></p>
          <p><strong>Email: </strong><span id="email">'.$_SESSION["EmailID"].'</span></p>
          <p><strong>Mobile: </strong><span id="mobile">'.$_SESSION["mobile"].'</span></p>
          <p><strong>Address: </strong><span id="address">'.$_SESSION["address"].'</span></p>
          <p><strong>  </strong><span id="balance"></span></p>

          <a href="/bank.php"><h6><strong>Manage Funds/Bank </strong></h6></a>

          <hr>
        </div>'

        ?>

        
        <div class="myform">
            <form>
            <label style="margin-left:35%;">First Name:<input type="text" class="form-control" id="fName2" name="fName2" minlength="1"></label>       
            <label>Last Name:<input type="text" class="form-control" id="lName2" name="lName2" minlength="1"></label><br>
            <label>Email:<input type="email" class="form-control" id="email2" name="email2"></label><br>
            <label>Mobile:<input type="text" pattern="[0-9]{10}" class="form-control" id="mobile2" name="mobile2" minlength="10" maxlength="10"></label><br>
            <label>Address:<input type="text" class="form-control" id="address2" name="address2"></label>
            <input id="save" type="submit" class="bt btn btn-success" name="" value="SAVE">
            </form>
        </div>


        </div>
      </div>     

      </div>
      <button id="edit" class="bt btn btn-success">EDIT</button><br>
    </div>
  </body>
</html>
